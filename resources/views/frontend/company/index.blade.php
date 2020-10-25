@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Customer List</h1>
                </div>
                <div class="card-body">
                    <table class="table table-boredered table-responsive-lg table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Outstanding Balance</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($customers as $item)
                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        {{ $item->total_outstanding }}
                                    </td>
                                    <td>
                                        <a href="{{ route('company.show', $item->slug()) }}" class="btn btn-sm btn-primary">View Invoice</a>
                                        {{-- <a href="{{ route('company.show', (\App\Models\Company::find($item->id))->slug()) }}">View Invoice</a> --}}
                                        <a href="{{ route('company.create.invoice', $item->slug()) }}" class="btn btn-sm btn-info">Create Invoice</a>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                            @foreach ($all_customers as $item)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>0</td>
                                    <td>
                                        <a href="{{ route('company.show', $item->slug()) }}"  class="btn btn-sm btn-primary">View Invoice</a>
                                        {{-- <a href="{{ route('company.show', (\App\Models\Customer::find($item->id))->slug()) }}">View Invoice</a> --}}
                                        <a href="{{ route('company.create.invoice', $item->slug()) }}"  class="btn btn-sm btn-info">Create Invoice</a>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection