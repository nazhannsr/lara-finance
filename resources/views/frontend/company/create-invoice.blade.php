@extends('frontend.includes.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Create New Invoice for {{ $customer->user->name }}</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('company.store.invoice', $customer->slug()) }}" method="post">
        @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="">Transaction</label>
                </div>

                <div class="col-md-6">
                    <input type="text" name="transaction" id="transaction" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Price</label>
                </div>

                <div class="col-md-6">
                    <input type="number" name="price" id="price" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Payment Due</label>
                </div>

                <div class="col-md-6">
                    <input type="datetime-local" name="payment_due" id="payment_due" required>
                </div>
            </div>

            <button type="submit">Create Invoice</button>
        </form>
    </div>
</div>
@endsection