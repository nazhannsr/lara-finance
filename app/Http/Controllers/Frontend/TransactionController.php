<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Company;
use App\Models\Payment;
use App\Models\CompanyUser;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->hasRole('company'))
            $view = $this->companyIndex();
        else
            $view = $this->customerIndex();

        return view($view);
    }

    public function companyIndex()
    {
        return view('frontend.company.index');
    }

    public function customerIndex()
    {
        $customers = Customer::where('user_id', auth()->user()->id)->get();

        $transactions = Transaction::whereIn('customer_id', $customers->pluck('id'))
                                   ->where('outstanding_balance', '!=', 0)
                                   ->orderBy('payment_due')
                                   ->orderBy('outstanding_balance', 'desc')
                                   ->get();

        $payments = Payment::where('customer_id', auth()->user()->id)->get();

        return view('frontend.transaction.index', compact('customers', 'transactions', 'payments'));
    }

    public function store(Request $request, $id)
    {
        if(isset($request->amount)){
            $request->validate([
                'payment_type'      =>  'required|string',
            ]);

            $request->merge([
                'payment_amount' => $request->amount
            ]);
        }
        else{
            $request->validate([
                'payment_type'      =>  'required|string',
                'payment_amount'    =>  'required',
            ]);
        }

        $transaction = Transaction::findBySlug($id);

        $customer = Customer::where('id', $transaction->customer_id)->first();

        $payment_type = $this->paymentType($request->payment_type);

        $new_payment_number = $this->paymentNumber($payment_type);

        $random_success = rand(0,1);

        Payment::create([
            'transaction_id'    => $transaction->id,
            'customer_id'       => $customer->id,
            'payment_number'    => $new_payment_number,
            'payment'           => $request->payment_amount,
            'payment_type'      => $request->payment_type,
            'payment_status'    => $random_success
        ]);

        if($random_success){
            $transaction->outstanding_balance   = ($transaction->outstanding_balance - $request->payment_amount < 0)? 0 : $transaction->outstanding_balance - $request->payment_amount;
            $transaction->total_payment         = ($transaction->total_payment + $request->payment_amount > $transaction->total_price)? $transaction->total_price : $transaction->total_payment + $request->payment_amount;
            $transaction->payment_date          = Carbon::now();
            $transaction->save();

            return redirect()->route('customer.transaction.index')->with('flash_success', 'Payment Successful');
        }
        else{
            return redirect()->route('customer.transaction.index')->withErrors(['Failed payment']);
        }
    }

    public function show(Request $request, $id)
    {
        $transaction = Transaction::findBySlug($id);

        $payment_amount = $request->amount;

        return view('frontend.customer.show', compact('transaction', 'payment_amount'));
    }

    private function paymentType($type)
    {
        switch($type){
            case 'atm' : return 'ATM';
            case 'card' : return 'CRD';
            case 'cash' : return 'CSH';
        }
    }

    private function paymentNumber($type){
        $payment = Payment::where('payment_number', 'like', $type.'%')
                           ->get()
                           ->sortByDesc('payment_number')
                           ->pluck('payment_number')
                           ->first();

        if(is_null($payment)){
            return $type.'00001';
        }

        $new_payment_number = $type.str_pad((str_replace($type, '', $payment)+1), 5, '0', STR_PAD_LEFT);

        return $new_payment_number;
    }
}
