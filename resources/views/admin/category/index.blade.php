@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container-fluid px-4 mt-4">

    <div class="card-header">
        <h4 class="mt-4">Categories
            <a href="{{ route('admin.add-category') }}" class="btn btn-primary btn-sm float-end">Add New</a>
        </h4>
    </div>

    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>




    <div class="table-responsive">
    <div class="row px-4">
        @if ($categories->count() > 0)

        <table id="table-container" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @php
                $item_count = 1;
                @endphp
                @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{ $item_count++ }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ Str::limit($category->description, 100, ' ...')  }}</td>
                    <td>
                        <img src="{{ asset('uploads/categories/images/'  . $category->name . '/' . $category->image) }}"
                            alt="{{ $category->name . ' Category image'}}" width="50" height="50"
                            alt="Category Image" />
                    </td>
                    <td>{{ $category->status == 1 ? 'Hidden' : 'Shown' }}</td>

                    <td>
                        <a href="{{ route('admin.edit-category', $category->id) }}"
                            class="btn btn-primary d-inline">Edit</a>
                        <form action="{{ route('admin.delete-category', $category->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else

        <figure class="figure">
            No Categories Found
            <h4></h4>
        </figure>


        @endif
    </div>
    </div>
</div>

@endsection
