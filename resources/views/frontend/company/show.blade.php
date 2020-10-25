@extends('frontend.includes.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Transaction History for {{ $customer->user->name }}</h1>
    </div>
    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice Number</th>
                    <th>Transaction Name</th>
                    <th>Total Price</th>
                    <th>Outstanding Balance</th>
                    <th>Total Payment</th>
                    <th>Payment Due</th>
                    <th>Invoice Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
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
    <h1>Payment History for {{ $customer->user->name }}</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Payment Number</th>
                <th>Payment Type</th>
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->payment_number}}</td>
                    <td>payment type</td>
                    <td>{{$item->payment}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection