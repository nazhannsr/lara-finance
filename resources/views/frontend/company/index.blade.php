@extends('frontend.includes.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Outstanding Balance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($customers as $item)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            {{ $item->total_outstanding }}
                        </td>
                        <td>
                            <a href="{{ route('company.show', $item->slug()) }}">View Invoice</a>
                            {{-- <a href="{{ route('company.show', (\App\Models\Company::find($item->id))->slug()) }}">View Invoice</a> --}}
                            <a href="{{ route('company.create.invoice', $item->slug()) }}">Create Invoice</a>
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
                            <a href="{{ route('company.show', $item->slug()) }}">View Invoice</a>
                            {{-- <a href="{{ route('company.show', (\App\Models\Customer::find($item->id))->slug()) }}">View Invoice</a> --}}
                            <a href="{{ route('company.create.invoice', $item->slug()) }}">Create Invoice</a>
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
@endsection