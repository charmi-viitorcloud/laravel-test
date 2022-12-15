@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="class-header">
                    <h3>Blog</h3>
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
                    <form method="POST" action="{{route('blogs.store')}}" name="blog">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your title">
                        </div>
                        @if($errors->has('title'))
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Your description">
                        </div>
                        @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="created_by">{{ __('created_by') }}</label>
                            <input type="text" class="form-control" id="created_by" name="created_by" placeholder="Enter Your created_by">
                        </div>
                        @if($errors->has('created_by'))
                        <span class="text-danger">{{$errors->first('created_by')}}</span>
                        @endif
                        <label for="status">{{ __('Status') }}</label>
                        <div class="form-check">
                            <input type="checkbox" name="status" value="1">
                            <label for="status1">{{ __('Active') }}</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="status" value="0">
                            <label for="status2"> {{ __('InActive') }}</label>
                        </div>
                        @if($errors->has('status'))
                        <span class="text-danger">{{$errors->first('status')}}</span>
                        @endif
                        <button type="submit" id="user" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection