<x-layoutAuth title="Login - Sistem Informasi Persuratan">
    <div class="login-box">
        <div class="logo">
            <img src="{{ asset('persuratan/logo sip.png') }}" alt="SIP Logo">
            <h2>Sistem Informasi Persuratan</h2>
        </div>

        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn">Sign in</button>

            <div class="links">
                <a href="#">Lupa Password?</a><br>
                <a href="{{ route('register') }}">Daftar Akun Baru</a>
            </div>
        </form>
    </div>
</x-layoutAuth>
