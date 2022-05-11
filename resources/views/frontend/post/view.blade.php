@extends('frontend.layouts.app')

@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keywords', "$post->meta_keywords")

@section('content')


<div class="container">

    <div class="row">

        {{-- Main content area --}}
        <div class="col-md-9 ">
            @if(session('message'))
            <h6 class="alert alert-warning">{{ session('message') }}</h6>
            @elseif(session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <h4 class="category-heading">{{ $category->name }}</h4>

            <div class="card card-shadow mt-4 " >
                <div class="card-body post-body">
                    <h3 class="post-heading">{{ $post->title }}</h3>
                    <p class="card-text text-secondary post-code-bg">{!!  $post->body  !!}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            Posted By: {{ $post->user->name }}
                            <span class=" float-end">On: {{ $post->created_at->format('d-m-Y') }}</span>
                        </small>
                    </p>

                </div>
            </div>

            {{-- Comments Aria --}}
            <div class="comments-area mt-4">





                @if (! $post->comments->count() > 0)

                <div class="card card-shadow mt-4 " >
                    <div class="card-body">
                        <h4 class="text-center">No Comments yet</h4>
                    </div>
                </div>


                <div class="card card-body my-4">
                    <h6 class="card-title">Leave Comment</h6>
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden"
                        name="post_slug"
                        value="{{ $post->slug }}">
                        <textarea class="form-control" name="comment_body" rows="3" required></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>

                @else

                <h4 class="category-heading mt-4">Comments</h4>

                @foreach ($post->comments as $comment)

                <div class="card card-body shadow-sm  mt-2" >
                    <div class="detail-aria">
                        <h6 class="user-name mb-1">
                            {{ $comment->user->name }}
                            <small class="ms-3 text-primary">{{ $comment->created_at->format('d-m-Y') }}</small>
                        </h6>
                        <p class="user-comment mb-1">
                            {!! $comment->comment_body !!}
                        </p>

                        @if (Auth::check() && Auth::user()->id == $comment->user_id)
                        <div class="comment-footer">


                            <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-primary btn-sm me-2 d-inline">Edit</a>
                            <form class="d-inline" action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm me-2">Delete</button>
                            </form>

                        </div>

                        @endif

                        {{-- <div class="comment-footer">
                            <a href="" class="btn btn-primary btn-sm me-2">Like</a>
                            <a href="" class="btn btn-danger btn-sm me-2">Replay</a>
                            <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
                        </div> --}}

                    </div>
                </div>
                @endforeach
                <div class="card card-body my-4">
                    <h6 class="card-title">Leave Comment</h6>
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden"
                        name="post_slug"
                        value="{{ $post->slug }}">
                        <textarea class="form-control" name="comment_body" rows="3" required></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
                @endif
            </div>

        </div>

        {{-- Ads/Right sidebar --}}
        <div class="col-md-3">
            {{-- <h4 class="border-bottom p-2">Ads Here</h4> --}}
            <div class="border p-2 my-2">
                <h4 class="border-bottom p-2">Ads Here</h4>
            </div>
            <div class="border p-2 my-2">
                <h4 class="border-bottom p-2">Ads Here</h4>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Latest Posts</h4>
                </div>
                <div class="card-body">
                    @foreach ($latest_posts as $latest_post)
                        <a href="{{ url('category/'.$latest_post->category->slug.'/'.$latest_post->slug) }}" class="text-decoration-none">
                            <h6> > {{ $latest_post->title }}</h6>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
