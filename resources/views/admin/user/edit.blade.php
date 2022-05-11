@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid px-4 mt-4">

    <div class="card-header">
        <h4 class="mt-4">Edit User
            <a href="{{ route('admin.users') }}" class="btn btn-danger btn-sm float-end">Back</a>
        </h4>
    </div>

    <div class="card-body px-0">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="form-group mb-3">
            <label>User Name: </label>
            <p>{{ $user->name }}</p>
        </div>

        <div class="form-group mb-3">
            <label>User Email: </label>
            <p>{{ $user->email }}</p>
        </div>

        <div class="form-group mb-3">
            <label>Created At </label>
            <p>{{ $user->created_at->format('d/m/y') }}</p>
        </div>



        <form action="{{ route('admin.update-user', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Role As</label>
                <select name="role_as">
                    <option value="0" {{ $user->role_as == 0 ? 'selected' : '' }} >User</option>
                    <option value="1" {{ $user->role_as == 1 ? 'selected' : '' }} >Admin</option>
                    <option value="2" {{ $user->role_as == 2 ? 'selected' : '' }} >Bloger</option>
                    <option value="11" {{ $user->role_as == 11 ? 'selected' : '' }}>Owner</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>

        </form>
    </div>

</div>

@endsection
