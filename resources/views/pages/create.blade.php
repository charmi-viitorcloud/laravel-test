@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="class-header">
                    <h3>Register</h3>
                </div>
                    <div class="card-body">
                        @if(Session()->has('success'))
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{Session()->get('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                        </div>   
                        @endif 
                        @if(Session()->has('fail'))
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">
                            <strong>{{Session()->get('fail')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                        </div>   
                        @endif  
                        <form method="POST" action="{{route('users.store')}}" name="user">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">{{ __('Firstname') }}</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your Firstname">
                        </div>
                        @if($errors->has('firstname'))
                        <span class="text-danger">{{$errors->first('firstname')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="lastname">{{ __('Lastname') }}</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Lastname">
                        </div>
                        @if($errors->has('lastname'))
                        <span class="text-danger">{{$errors->first('lastname')}}</span>
                        @endif 
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                        </div>
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                        </div>
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="confirmpassword">{{ __('Confirmpassword') }}</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Your ConfirmPassword">
                        </div>
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="dob">{{ __('Dob') }}</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        @if($errors->has('dob'))
                        <span class="text-danger">{{$errors->first('dob')}}</span>
                        @endif
                        <button type="submit" id="user" class="btn btn-primary">{{ __('Submit') }}</button>               
                    </div>      
            </div>    
        </div>
    </div>    
</div>    
@endsection