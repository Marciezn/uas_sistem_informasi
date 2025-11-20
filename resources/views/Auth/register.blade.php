<x-layoutAuth title="Register - Sistem Informasi Persuratan">

    <link rel="stylesheet" href="{{ asset('persuratan/register.css') }}">

    <div class="container">

        {{-- LOGO --}}
      
        <h2>Sistem Informasi Persuratan</h2>

        {{-- REGISTER BOX --}}
        <div class="register-box">
            <form method="POST" action="{{ route('register.process') }}">
                @csrf

                {{-- NAMA --}}
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>

                {{-- EMAIL --}}
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>

                {{-- PASSWORD --}}
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>

                {{-- CHECKBOX --}}
                <div class="checkbox">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">Saya menyetujui seluruh syarat & Kebijakan Privasi</label>
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn">Register</button>

                <div class="links" style="margin-top:10px; text-align:center;">
                    <a href="{{ route('login') }}" style="color:black; font-weight:600;">
                        Sudah punya akun? Login
                    </a>
                </div>

            </form>
        </div>

        {{-- FOOTER --}}
        <footer>
            <p>Copyright © 2025 
                <span>Sistem Informasi Persuratan.</span> 
                All rights reserved
            </p>
        </footer>

    </div>

</x-layoutAuth>
