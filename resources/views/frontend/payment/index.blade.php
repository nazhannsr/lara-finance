@extends('frontend.includes.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Payment View</h1>
    </div>
    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Payment Number</th>
                    <th>Invoice Number</th>
                    <th>Payment Made (MYR)</th>
                    <th>Payment Status</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->payment_number }}</td>
                        <td>{{ $item->invoice_number }}</td>
                        <td style="text-align:center">{{ $item->payment }}</td>
                        <td style="text-align:center">{{ ($item->payment_status)? 'Success' : 'Fail' }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection