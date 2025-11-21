<aside class="main-sidebar">
    <!-- 🔹 HEADER SIDEBAR: LOGO ATAS -->
    <div class="sidebar-header">
    <img src="{{ asset('persuratan/img/logo-sip.png') }}" alt="Logo SIP" class="logo-sip">
    <h2>SIP</h2>
    <p>Sistem Informasi Persuratan</p>
    <span class="role">(Admin)</span>
</div>


    <!-- 🔹 MENU NAVIGASI -->
    
    <div class="sidebar">
        <ul class="nav">
           <img src="{{ asset('persuratan/img/logo-sip.png') }}" 
            alt="Logo" 
            style="width:80px; margin:5px auto; display:block; background:#1f3769;">
            <p style="text-align:center; color:white; font-weight:600; margin-bottom:20px;">Sistem Informasi Persuratan
            </p>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.datapengguna.index') }}" class="nav-link {{ request()->routeIs('admin.datapengguna.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> <span>Data Pengguna</span>
            </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.suratkeluar.index') }}" 
                   class="nav-link {{ request()->routeIs('admin.suratkeluar') ? 'active' : '' }}">
                    <i class="fa-solid fa-inbox"></i>
                    <p>Surat Masuk</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.suratmasuk.index') }}" 
                 class="nav-link {{ request()->routeIs('admin.suratmasuk.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-paper-plane"></i>
                    <p>Surat Keluar</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.laporan') }}" 
                   class="nav-link {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <p>Laporan</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
