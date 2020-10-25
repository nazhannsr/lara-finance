@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Create New Invoice for {{ $customer->user->name }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.store.invoice', $customer->slug()) }}" method="post">
                    @csrf
            
                        <div class="form-group row">
                            <label for="transaction" class="col-md-4">Transaction Name</label>
                            <div class="col-md-6">
                                <input type="text" name="transaction" id="transaction" class="form-control" required>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="price" class="col-md-4">Price (MYR)</label>
                            <div class="col-md-6">
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="payment_due" class="col-md-4">Payment Due</label>
                            <div class="col-md-6">
                                <input type="datetime-local" name="payment_due" id="payment_due" class="form-control" required>
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-md btn-primary">Create Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection