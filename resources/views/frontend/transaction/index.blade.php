@extends('frontend.includes.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice Number</th>
                    <th>Transaction</th>
                    <th>Purchased Price</th>
                    <th>Outstanding Balance (MYR)</th>
                    <th>Total Payment (MYR)</th>
                    <th>Payment Due</th>
                    <th>Pay</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->invoice_number }}</td>
                        <td>{{ $item->transaction_name }}</td>
                        <td style="text-align:center">{{ $item->total_price }}</td>
                        <td style="text-align:center">{{ $item->outstanding_balance }}</td>
                        <td style="text-align:center">{{ $item->total_payment }}</td>
                        <td>{{ $item->payment_due }}</td>
                        <td>
                            <form action="{{ route('customer.transaction.show', $item->slug()) }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" id="amount" required>
                                    <button type="submit">Pay</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection