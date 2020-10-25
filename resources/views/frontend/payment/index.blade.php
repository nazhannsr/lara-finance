@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Payment View</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover table-responsive-lg">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Payment Number</th>
                                        <th scope="col">Invoice Number</th>
                                        <th scope="col">Payment Made (MYR)</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $item)
                                    <tr class="{{ ($item->payment_status)? 'table-success' : 'table-danger'}}">
                                            <th scope="row">{{ $loop->iteration }}</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection