<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::where('user_id', auth()->user()->id)
                             ->get();
        $payments = Payment::whereIn('payments.customer_id', $customers->pluck('id'))
                           ->leftJoin('transactions', 'transactions.id', '=', 'payments.transaction_id')
                           ->select('payments.*', 'transactions.invoice_number')
                           ->orderBy('payments.created_at', 'desc')
                           ->get();

        return view('frontend.payment.index', compact('payments'));
    }
}
