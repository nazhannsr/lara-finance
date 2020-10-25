@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md12">
            <div class="card">
                <div class="card-header">
                    <h1>Transaction History for {{ $customer->user->name }}</h1>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-lg table-bordered table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Transaction Name</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Outstanding Balance</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col">Payment Due</th>
                                <th scope="col">Invoice Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->invoice_number}}</td>
                                    <td>{{$item->transaction_name}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->outstanding_balance}}</td>
                                    <td>{{$item->total_payment}}</td>
                                    <td>{{$item->payment_due}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h1>Payment History for {{ $customer->user->name }}</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped table-responsive-lg">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Payment Number</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->payment_number}}</td>
                                    <td>{{ucwords($item->payment_type)}}</td>
                                    <td>{{$item->payment}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection