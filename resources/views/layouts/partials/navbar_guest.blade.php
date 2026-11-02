<nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('guest/img/school.png') }}" height="70" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
                <li class="nav-item px-3 px-xl-4">
                    <a class="nav-link fw-medium {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item px-3 px-xl-4">
                    <a class="nav-link fw-medium {{ request()->routeIs('guest.index') ? 'active' : '' }}" href="{{ route('guest.index') }}">Announcements</a>
                </li>
                <li class="nav-item px-3 px-xl-4">
                    <a class="nav-link fw-medium {{ request()->routeIs('guest.news.index') ? 'active' : '' }}" href="{{ route('guest.news.index') }}">News</a>
                </li>
                <li class="nav-item px-3 px-xl-4">
                    <a class="nav-link fw-medium {{ request()->routeIs('guest.galleries.index') ? 'active' : '' }}" href="{{ route('guest.galleries.index') }}">Gallery</a>
                </li>
                @auth
                    <li class="nav-item px-3 px-xl-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark order-1 order-lg-0 fw-medium">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item px-3 px-xl-4">
                        <!-- Button to trigger modal -->
                        <button type="button" class="btn btn-outline-dark order-1 order-lg-0 fw-medium" data-bs-toggle="modal" data-bs-target="#adminModal">
                            Login
                        </button>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminModalLabel">Konfirmasi Akses Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengakses sebagai admin? Harap pastikan bahwa Anda memiliki kredensial yang sesuai.</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-primary">Lanjutkan</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
            </div>
        </div>
    </div>
</div>
