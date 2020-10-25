@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Join a Company Today!</h1>
                </div>
                <div class="card-body">
                    @foreach ($companies as $company)
                        <form action="{{ route('customer.company', $company->slug()) }}" method="post">
                            <div class="form-group row">
                                <div class="col-md-12 offset-md-4">
                                        <label for="{{$company->name }}">Company {{$company->name}}</label>
                                        @if (isCustomerCompany(auth()->user()->id, $company->id))
                                            <button class="btn" disabled>Already Joined</button>
                                        @else
                                            @csrf
                                            <button type="submit" class="btn btn-md">Join</button>
                                        @endif
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection