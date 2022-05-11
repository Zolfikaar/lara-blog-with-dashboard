@extends('admin.layouts.app')

@section('title', 'Edit Post')

@section('content')

<div class="container-fluid px-4 mt-4">

    <div class="card-header">
        <h4 class="mt-4">Edit Post <a href="{{ route('admin.posts') }}" class="btn btn-danger float-end">Back</a></h4>
    </div>

    <div class="card-body px-0">
        @if ($errors->any())

        @foreach ($errors->all() as $error)

        <div class="alert alert-danger">
            {{ $error }}
        </div>

        @endforeach

        @endif



        <form action="{{ route('admin.update-post', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $post->title }}">
            </div>

            <div class="form-group mb-3">
                <label for="my_summernote">Body</label>
                <textarea class="form-control" id="my_summernote" name="body" rows="3">{{ $post->body}}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id" required>
                    <option > -- Select Category -- </option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group mb-3">
                <label for="tags">Tags</label>
                <select class="form-control" id="tags" name="tags[]" multiple>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <h4 class="mt-3">SEO Tags</h4>
            <div class="form-group mb-3">
                <label for="meta-title">Meta Title</label>
                <input type="text" class="form-control" id="meta-title" name="meta_title"
                    placeholder="Enter Meta Title" value="{{ $post->meta_title }}">
            </div>

            <div class="form-group mb-3">
                <label for="meta-description">Meta Description</label>
                <textarea type="text" class="form-control" id="meta-description" name="meta_description"
                    placeholder="Enter Meta Description" rows="3">{!! $post->meta_description !!}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="meta-keywords">Meta Keywords</label>
                <textarea type="text" class="form-control" id="meta-keywords" name="meta_keywords"
                    placeholder="Enter Meta Keywords" rows="3">{!! $post->meta_keywords !!}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="status">Status</label>
                    <input type="checkbox" name="status" id="status" value="{{ $post->status == true ? 'checked' : '' }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>

        </form>
    </div>



</div>

@endsection
