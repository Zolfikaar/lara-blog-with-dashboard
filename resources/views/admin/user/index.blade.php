@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')

<div class="container-fluid px-4 mt-4">

    <div class="card-header">
        <h4 class="mt-4">Users
            {{-- <a href="{{ route('admin.add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a> --}}
        </h4>
    </div>

    <div class="card-body px-0">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
        @endif

    </div>

    <div class="table-responsive">
    <div class="row px-4">
        @if ($users->count() > 0)

        <table id="myDataTable" class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @php
                $user_count = 1;
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user_count++ }}</td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_as == 1 ? 'Admin' : 'User' }}</td>

                    <td>
                        <a href="{{ route('admin.edit-user', $user->id) }}" class="btn btn-primary d-inline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else

        <figure class="figure">
            No Users Found
            <h4></h4>
        </figure>


        @endif
    </div>
    </div>
</div>

@endsection
