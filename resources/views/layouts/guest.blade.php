<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School - @yield('title')</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <!-- Favicons-->
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('guest/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('guest/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('guest/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('guest/img/favicons/manifest.json') }}"> --}}
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheets-->
    <link href="{{ asset('guest/css/theme.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <main class="main" id="top">
       <!-- Navigation-->
       @include('layouts.partials.navbar_guest')
        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        <section class="footer pb-0 pb-lg-4 bg-light">
            <div class="py-4 text-center bg-secondary text-white mt-4">
                <p class="mb-0 fs--1 fw-medium">
                    © {{ date('Y') }} Sekolah Impian. Semua hak dilindungi.
                </p>
            </div>
        </section>
    </main>

    <!-- JavaScripts-->
    <script src="{{ asset('guest/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('guest/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guest/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('guest/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('guest/js/theme.js') }}"></script>
    @stack('scripts')
</body>
</html>
