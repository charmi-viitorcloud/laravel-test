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
                        <form method="POST" action="{{route('blogs.update',$blog->id)}}" name="blog">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title"  value="{{$blog->title}}">
                        </div>
                        @if($errors->has('title'))
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$blog->description}}">
                        </div>
                        @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif 
                        {{-- <div class="form-group">
                            <label for="created_by">{{ __('created_by') }}</label>
                            <input type="text" class="form-control" id="created_by" name="created_by" value="{{$blog->created_at}}">
                        </div>
                        @if($errors->has('created_by'))
                        <span class="text-danger">{{$errors->first('created_by')}}</span>
                        @endif --}}
                        <label for="status">Status:</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="status1">
                            <label class="form-check-label" for="inactive">{{ __('Active') }}</label>
                        </div>
                         <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="status2" checked>
                            <label class="form-check-label" for="active">{{ __('InActive') }}</label>
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