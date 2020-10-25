@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Transaction View</h1>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-lg table-bordered table-hover table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Transaction</th>
                                <th scope="col">Purchased Price</th>
                                <th scope="col">Outstanding Balance (MYR)</th>
                                <th scope="col">Total Payment (MYR)</th>
                                <th scope="col">Payment Due</th>
                                <th scope="col">Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->invoice_number }}</td>
                                    <td>{{ $item->transaction_name }}</td>
                                    <td style="text-align:center">{{ $item->total_price }}</td>
                                    <td style="text-align:center">{{ $item->outstanding_balance }}</td>
                                    <td style="text-align:center">{{ $item->total_payment }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->payment_due)->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <form action="{{ route('customer.transaction.show', $item->slug()) }}" method="get">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input type="number" name="amount" id="amount" class="form-control" placeholder="10.00" min="0" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-md btn-info">Pay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
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