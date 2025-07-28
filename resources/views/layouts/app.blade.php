<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.ico') }}">

    <!-- Bootstrap 5 & Styles -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/app.min.css') }}">
    <!-- Material Design Icons -->
    <link href="{{ asset('template/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>

    <div id="layout-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <!-- JAVASCRIPT -->
        <script src="{{ asset('template/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('template/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('template/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('template/assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{ asset('template/assets/libs/pace-js/pace.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('template/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('template/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('template/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- dashboard init -->
        <script src="{{ asset('template/assets/js/pages/dashboard.init.js') }}"></script>

        <script src="{{ asset('template/assets/js/app.js') }}"></script>
        <!-- Feather Icons Script -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script>
        feather.replace();
        </script>

</body>
</html>