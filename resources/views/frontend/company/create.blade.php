@extends('frontend.includes.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Create New Staff for {{ $company->name }}</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('company.store', $company->slug()) }}" method="post">
        @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="">Name</label>
                </div>

                <div class="col-md-6">
                    <input type="text" name="name" id="name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Email</label>
                </div>

                <div class="col-md-6">
                    <input type="email" name="email" id="email" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Temporary Password</label>
                </div>

                <div class="col-md-6">
                    <input type="password" name="password" id="password" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Reconfirm Password</label>
                </div>

                <div class="col-md-6">
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
            </div>

            <button type="submit">Create Staff</button>
        </form>
    </div>
</div>
@endsection