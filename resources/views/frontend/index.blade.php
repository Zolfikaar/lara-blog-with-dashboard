@extends('frontend.layouts.app')

@section('content')

<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            Ads Here
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Brand Name Here</h4>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nam rem consequatur dolores magni dolorum, pariatur quidem voluptate nobis tempora ratione nemo maxime? Ab, animi vel ducimus saepe suscipit facilis.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>All Categories</h4>
                <div class="underline"></div>

            </div>

            @foreach ($categories as $category)
            <div class="col-md-3">

                <div class="card card-body mb-3">
                    <a href="{{ url('category/' . $category->slug) }}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{ $category->name }}</h4>
                    </a>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>


<div class="py-5 bg-white">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline"></div>

            </div>

            <div class="col-md-8">
                @foreach ($latestPosts as $post)

                <div id="post-in-home-page" class="card card-body shadow mb-3">
                    <a href="{{ url('category/' . $post->category->slug . '/' . $post->slug) }}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{ $post->title }}</h4>
                    </a>
                    <p class="card-text mt-3">
                        <small class="text-muted">
                            Posted By: {{ $post->user->name }}
                            <span class=" float-end">On: {{ $post->created_at->format('d-m-Y') }}</span>
                        </small>
                    </p>
                </div>

                @endforeach
            </div>

            <div class="col-md-4 bg-gray border">
                <div class="border text-center p-3">
                    Ads Here
                </div>
            </div>



        </div>
    </div>
</div>

@endsection
