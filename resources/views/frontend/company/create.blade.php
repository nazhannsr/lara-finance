@extends('frontend.includes.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create New Staff for {{ $company->name }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.store', $company->slug()) }}" method="post">
                    @csrf
            
                        <div class="row form-group">
                            <label for="" class="col-md-4">Name</label>
            
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <label for="" class="col-md-4">Email</label>
            
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <label for="" class="col-md-4">Temporary Password</label>
            
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>
            
                        <div class="row form-group">
                            <label for="" class="col-md-4">Reconfirm Password</label>
            
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-md btn-primary">Create Staff</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection