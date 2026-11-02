<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Admin Dashboard')</title>
    
        <!-- Fonts and Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3/index.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars/styles/overlayscrollbars.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    </head>
<style>
    .custom-row {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem; /* Jarak antar elemen */
}

.custom-col {
    flex: 0 0 calc(20% - 1rem); /* Mengatur lebar menjadi 20% (1/5) dengan jarak */
    max-width: calc(20% - 1rem); /* Pastikan maksimal tetap 20% */
}

@media (max-width: 1200px) {
    .custom-col {
        flex: 0 0 calc(25% - 1rem); /* 4 elemen per baris pada layar lebih kecil */
        max-width: calc(25% - 1rem);
    }
}

@media (max-width: 768px) {
    .custom-col {
        flex: 0 0 calc(50% - 1rem); /* 2 elemen per baris pada layar sedang */
        max-width: calc(50% - 1rem);
    }
}

@media (max-width: 576px) {
    .custom-col {
        flex: 0 0 100%; /* 1 elemen per baris pada layar kecil */
        max-width: 100%;
    }
}   
</style>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!-- Wrapper -->
    <div class="app-wrapper">
        <!-- Navbar -->
        @include('layouts.partials.navbar')

        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper -->
        <main class="app-main">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Your trusted admin dashboard</div>
            <strong>&copy; {{ date('Y') }} Sekolah Impian.</strong> All rights reserved. Built with passion and care.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars/browser/overlayscrollbars.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
</body>
</html>
