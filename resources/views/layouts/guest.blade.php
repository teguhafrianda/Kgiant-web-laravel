<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>
     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.ico') }}">

    <!-- Bootstrap 5 & Styles -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/app.min.css') }}">

    <!-- Material Design Icons -->
    <link href="{{ asset('template/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Tambahan CSS (Jika Ada) -->
    @stack('styles')
</head>
<body>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>

    <!-- Tambahan JS (Jika Ada) -->
    @stack('scripts')
</body>
</html>
