@extends('admin.layouts.app')

@section('title', 'Create Category')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">

        <div class="card-header">
            <h4 class="mt-4">Edit {{ $category->name }} Category <a href="{{ route('admin.categories') }}" class="btn btn-danger float-end">Back</a></h4>
        </div>

        <div class="card-body">

            @if ($errors->any())

            @foreach ($errors as $error)

            <div class="alert alert-danger">
                {{ $error }}
            </div>

            @endforeach

            @endif

            <form action="{{ route('admin.update-category', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name"
                        value="{{ $category->name }}">
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="3">{{ $category->description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Upload Category Image">
                </div>

                <h6>SEO Tags</h6>
                <div class="form-group mb-3">
                    <label for="meta-title">Meta Title</label>
                    <input type="text" class="form-control" id="meta-title" name="meta_title"
                        placeholder="Enter Meta Title" value="{{ $category->meta_title }}">
                </div>

                <div class="form-group mb-3">
                    <label for="meta-description">Meta Description</label>
                    <textarea type="text" class="form-control" id="meta-description" name="meta_description"
                        placeholder="Enter Meta Description" rows="3">{{ $category->meta_description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="meta-keywords">Meta Keywords</label>
                    <textarea type="text" class="form-control" id="meta-keywords" name="meta_keywords"
                        placeholder="Enter Meta Keywords" rows="3">{{ $category->meta_keywords }}</textarea>
                </div>

                <h6>Status Mods</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="navbar-status">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" id="navbar-status" {{ $category->navbar_status == 1
                        ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" id="status" {{ $category->status == 1 ? 'checked' : '' }}>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>

    </div>

</div>

@endsection
