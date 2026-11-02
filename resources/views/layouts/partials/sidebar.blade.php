<aside class="app-sidebar bg-body-secondary shadow">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('adminlte/img/school.png') }}" alt="AdminLTE Logo" class="brand-image">
            <span class="brand-text fw-light">SekolahKu</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Profiles -->
                <li class="nav-item">
                    <a href="{{ route('profiles.index') }}" class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Profiles</p>
                    </a>
                </li>
                <!-- Announcements -->
                <li class="nav-item">
                    <a href="{{ route('announcements.index') }}" class="nav-link {{ Request::is('announcements*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-megaphone"></i>
                        <p>Announcements</p>
                    </a>
                </li>
                <!-- News -->
                <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>News</p>
                    </a>
                </li>
                <!-- Galleries -->
                <li class="nav-item">
                    <a href="{{ route('galleries.index') }}" class="nav-link {{ Request::is('galleries*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Galleries</p>
                    </a>
                </li>
                <!-- Contacts -->
                <li class="nav-item">
                    <a href="{{ route('contacts.index') }}" class="nav-link {{ Request::is('contacts*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-telephone"></i>
                        <p>Contacts</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
