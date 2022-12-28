@extends('layouts.default')


@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <thead>
                            <th><a href="{{ route('blogs.create') }}" class="btn btn-primary">{{ __('Add Blog') }}</a></th>

                            <tr>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Created_by') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td>{{ $blog->created_by }}</td>
                                    <td>{{ $blog->status }}</td>
                                    <td>
                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                            class="btn btn-primary">{{ __('Edit') }}</a>&nbsp;
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                oclick="return confirm('Sure to Delete')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links("pagination::bootstrap-4") }}

                </div>
            </div>
        </div>
    </div>
@endsection
