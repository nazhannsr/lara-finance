@extends('frontend.includes.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Join a Company Today!</h1>
    </div>
    <div class="card-body">
        @foreach ($companies as $company)
            <div class="row">
                <div class="col-md-12">
                    <label for="{{$company->name }}">Company {{$company->name}}</label>
                    @if (isCustomerCompany(auth()->user()->id, $company->id))
                        Already Joined
                    @else
                    <form action="{{ route('customer.company', $company->slug()) }}" method="post">
                        @csrf
                        <button type="submit">Join</button>
                    </form>
                    @endif
                    
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection