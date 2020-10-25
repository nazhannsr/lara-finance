@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col md 12">
            <div class="card">
                <div class="card-header">
                    <h1>Make Payment</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.transaction.store', $transaction->slug()) }}" method="post">
                    @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Invoice Number</label>
                            </div>
            
                            <div class="col-md-6">
                                <input type="text" name="invoice_number" id="invoice_number" disabled value="{{$transaction->invoice_number}}">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Transaction</label>
                            </div>
            
                            <div class="col-md-6">
                                <input type="text" name="transaction" id="transaction" disabled value="{{$transaction->transaction_name}}">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Outstanding Balance</label>
                            </div>
            
                            <div class="col-md-6">
                                <input type="text" name="outstanding_balance" id="outstanding_balance" disabled value="{{$transaction->outstanding_balance}}">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Payment Amount</label>
                            </div>
            
                            <div class="col-md-6">
                                <input type="text" name="amount" id="amount" {{ (is_null($payment_amount) || $payment_amount <= 0)? 'required' :  "disabled"}} value="{{$payment_amount}}">
                                <input type="hidden" name="payment_amount" id="payment_amount" value="{{$payment_amount}}">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Payment Type</label>
                            </div>
            
                            <div class="col-md-6">
                                <select name="payment_type" id="payment_type" required>
                                    <option value="">Please select a payment type</option>
                                    <option value="atm">ATM Deposit</option>
                                    <option value="card">Credit/Debit card</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-md btn-info">Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection