<nav class="navbar">
    <div class="navbar-left">
        <h3>{{ Auth::user()->role === 'admin' ? '' : 'Dashboard User' }}</h3>
    </div>

    <div class="navbar-right">
        <span>👋 Halo, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>
</nav>
