<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Stylesheets -->
    <link href="{{ asset('guest/css/theme.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body class="bg-light">
    <main class="d-flex align-items-center justify-content-center vh-100">
        @yield('content')
    </main>

    <!-- JavaScripts -->
    <script src="{{ asset('guest/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('guest/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guest/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('guest/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('guest/js/theme.js') }}"></script>
    @stack('scripts')
</body>
</html>
