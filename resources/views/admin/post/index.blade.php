@extends('admin.layouts.app')

@section('title', 'Posts')

@section('content')

<div class="container-fluid px-4 mt-4">

    <div class="card-header">
        <h4 class="mt-4">Posts
            <a href="{{ route('admin.add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
        </h4>
    </div>

    <div class="card-body px-0">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    </div>





    <div class="table-responsive">
    <div class="row px-4">
        @if ($posts->count() > 0)


        <table id="myDataTable" class="table table-container table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Meta Keywords</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @php
                $item_count = 1;
                @endphp
                @foreach ($posts as $post)
                <tr>
                    <td scope="row">{{ $item_count++ }}</td>
                    <td>{{ $post->title }}</td>

                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->meta_title }}</td>
                    <td>{{ $post->meta_keywords }}</td>


                    <td>{{ $post->status == 1 ? 'Hidden' : 'Visible' }}</td>

                    <td>
                        <a href="{{ route('admin.edit-post', $post->id) }}"
                            class="btn btn-primary d-inline">Edit</a>
                        <form action="{{ route('admin.delete-post', $post->id) }}" method="POST"
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
            No Posts Found
            <h4></h4>
        </figure>


        @endif
    </div>
</div>
</div>

@endsection
