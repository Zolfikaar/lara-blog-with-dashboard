<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fontawesome -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap_v5.css') }}" rel="stylesheet">
    {{-- DataTable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> --}}
    {{-- Summernote Editor --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- Custome Style --}}
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    {{-- simple-datatable --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

</head>

<body class="sb-nav-fixed">

    @include('admin.layouts.inc.navbar')

    <div id="layoutSidenav">

        @include('admin.layouts.inc.sidebar')

        <div id="layoutSidenav_content">

            <main>
                @yield('content')
            </main>

            @include('admin.layouts.inc.footer')

        </div>

    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- Custome Style --}}
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    {{-- Font Awesome --}}
    {{-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> --}}
    {{-- Summernote Editor --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    {{-- DataTable --}}
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}

    {{-- For not supporting Bootstrap5 --}}
    <script>
        $(document).ready(function() {
            $("#my_summernote").summernote({
                height: 200
            });
            $('.dropdown-toggle').dropdown();
            $('#myDataTable').DataTable();
        });
    </script>

</body>

</html>
