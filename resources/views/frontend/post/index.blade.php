@extends('frontend.layouts.app')

@section('title', "$category->meta_title")
@section('meta_description', "$category->meta_description")
@section('meta_keywords', "$category->meta_keywords")

@section('content')


<div class="container">
    <div class="row">

        {{-- Main content area --}}
        <div class="col-md-9">
            <h4 class="category-heading">{{ $category->name }} Posts</h4>

            @forelse ($posts as $post)

            <a href="{{ url('category/' . $category->slug . '/' . $post->slug) }}" class="text-decoration-none">
                <div class="card card-shadow mt-4" >
                    <div class="card-body">
                        <h3 class="post-heading">{{ $post->title }}</h3>
                        <p class="card-text text-secondary">{!!  Str::limit($post->body, 150, ' ...')  !!}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                Posted By: {{ $post->user->name }}
                                <span class=" float-end">On: {{ $post->created_at->format('d-m-Y') }}</span>
                            </small>
                        </p>

                    </div>
                </div>
            </a>

            <div class="pagination mt-3">
                {{ $posts->links() }}
            </div>

            @empty

            <div class="card card-shadow mt-4" >

                <div class="card-body">
                    <h3 class="post-heading">No Post Available!</h3>
                </div>

            </div>

            @endforelse
        </div>

        {{-- Ads/Right sidebar --}}
        <div class="col-md-3 border">
            <h4 class="border-bottom p-2">Ads Here</h4>
        </div>

    </div>
</div>

@endsection
