<div class="global-navbar">
    <div class="container">
        <div class="row">

            <div class="col-md-4 d-none d-sm-none d-md-inline">
                <img src="{{ asset('assets/img/logo.png') }}" class="w-100" alt="logo">
            </div>
            <div class="col-md-8 p-2 text-center border">
                Ads Here
            </div>

        </div>
    </div>
</div>
    <div class="sticky-top">

        <nav class="navbar navbar-expand-lg navbar-dark bg-green ">
            <div class="container">

                <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">
                    <img src="{{ asset('assets/img/logo.png') }}" style="width: 140px" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>



                    @php

                        // get all categories that [navbar_status and status] = 0 ,which mean [not hidden on (backend navbar and frontend navbar)]

                        $categories = \App\Models\Category::where('navbar_status', '0')->where('status','0')->get();
                        @endphp
                        @foreach ($categories as $category)

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('category/'.$category->slug) }}">{{ $category->name }}</a>
                        </li>

                        @endforeach

                </ul>
                <ul class="navbar-nav  float-end">
                    <li class="nav-item ">
                        @if(!Auth::check())
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                        @else
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-danger btn-sm">Logout</button>

                        </form>
                        @endif
                    </li>
                </ul>

                </div>
            </div>
        </nav>

    </div>
