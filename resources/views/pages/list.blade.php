@extends('layouts.default')

@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <th><a href="{{route('users.create')}}" class="btn btn-primary">Add User</a></th>
                        <tr>
                            <th>Id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Dob</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->dob}}</td>
                            <td>
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                                <form action="{{route('users.destroy',$user->id)}}" method="post" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" oclick="return confirm('Sure to Delete')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
</div>
@endsection