<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\CompanyUser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $company = CompanyUser::where('user_id', auth()->user()->id)->first();

        $customers = Customer::leftJoin('transactions', 'transactions.customer_id', '=', 'customers.id')
                             ->leftJoin('users', 'users.id', '=', 'customers.user_id')
                             ->selectRaw('customers.id, users.name, sum(transactions.outstanding_balance) as total_outstanding')
                             ->where('customers.company_id', $company->company_id)
                             ->havingRaw('sum(transactions.outstanding_balance) > ?', [0])
                             ->groupBy('customers.id')
                             ->orderBy('total_outstanding', 'desc')
                             ->get();
        
        $all_customers = Customer::whereNotIn('customers.id', $customers->pluck('id'))
                                 ->where('customers.company_id', $company->id)
                                 ->leftJoin('users', 'users.id', '=', 'customers.user_id')
                                 ->select('customers.id', 'users.name')
                                 ->orderBy('users.name')
                                 ->get();

        return view('frontend.company.index', compact('customers', 'all_customers'));
    }

    public function create(){
        $company = CompanyUser::where('user_id', auth()->user()->id)->first();

        $company = Company::find($company->company_id);

        return view('frontend.company.create', compact('company'));
    }

    public function createInvoice($id)
    {
        $customer = Customer::findBySlug($id);

        return view('frontend.company.create-invoice', compact('customer'));
    }

    public function store(Request $request){

        $request->validate([
            'name'      =>  'required|min:3|max:50',
            'email'     =>  'required|email',
            'password'  =>  'required|confirmed|min:8',
        ]);

        $company = CompanyUser::where('user_id', auth()->user()->id)->first();

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ])->assignRole('company');

        CompanyUser::create([
            'user_id' => $user->id,
            'company_id'    =>  $company->id,
        ]);

        return redirect()->route('company.index')->with('flash_success', 'Successfully created new staff');
    }

    public function storeInvoice(Request $request, $id)
    {
        $request->validate([
            'transaction'   =>  'required',
            'price'         =>  'required',
            'payment_due'   =>  'required',
        ]);

        $customer = Customer::findBySlug($id);

        $company = CompanyUser::where('user_id', auth()->user()->id)->first();

        $latest_transaction = Transaction::orderBy('invoice_number', 'desc')
                                         ->first();

        $invoice_number = str_pad(($latest_transaction->invoice_number+1), 8, '0', STR_PAD_LEFT);

        Transaction::create([
            'invoice_number'        => $invoice_number,
            'transaction_name'      => $request->transaction,
            'total_price'           => (double)$request->price,
            'outstanding_balance'   => (double)$request->price,
            'total_payment'         => 0,
            'payment_due'           => $request->payment_due,
            'customer_id'           => $customer->id,
            'company_user_id'       => $company->id,
            'company_id'            => $company->company_id,
        ]);

        return redirect()->route('company.index')->with('flash_success', 'Successfully created invoice');
    }

    public function show($id)
    {
        $customer = Customer::findBySlug($id);

        $company = CompanyUser::where('user_id', auth()->user()->id)->first();

        $transactions = Transaction::where('company_id', $company->company_id)
                                   ->where('customer_id', $customer->id)
                                   ->get();

        $payments = Payment::where('customer_id', $customer->id)
                           ->where('payment_status', 1)
                           ->get();
        
        return view('frontend.company.show', compact('customer', 'transactions', 'payments'));
    }
}
