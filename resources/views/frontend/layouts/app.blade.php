@include('frontend.layouts.inc.header')

<div id="app">
    @include('frontend.layouts.inc.navbar')

    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('frontend.layouts.inc.footer')
