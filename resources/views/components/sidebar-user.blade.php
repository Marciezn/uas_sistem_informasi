<aside class="sidebar">
    <div class="logo">
        <a href="{{ route('user.dashboard') }}" class="logo-link">
            <img src="{{ asset('persuratan/logo sip.png') }}" alt="Logo SIP" class="logo-image">
        </a>
        <div class="logo-text">Sistem Informasi Persuratan</div>
    </div>

    <nav class="sidebar-menu">

        <a href="{{ route('user.dashboard') }}"
           class="menu-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="{{ route('user.suratmasuk.index') }}"
           class="menu-item {{ request()->routeIs('user.suratmasuk.*') ? 'active' : '' }}">
            <i class="fas fa-envelope-open-text"></i> Surat Masuk
        </a>

        <a href="{{ route('user.suratkeluar.index') }}"
           class="menu-item {{ request()->routeIs('user.suratkeluar.*') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i> Surat Keluar
        </a>

        <a href="{{ route('user.riwayat') }}"
           class="menu-item {{ request()->routeIs('user.riwayat') ? 'active' : '' }}">
            <i class="fas fa-folder"></i> Riwayat
        </a>

    </nav>
</aside>
