<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Informasi Persuratan' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS (otomatis sesuai halaman) -->
    @if (Request::is('login'))
        <link rel="stylesheet" href="{{ asset('persuratan/login.css') }}">
    @elseif (Request::is('register'))
        <link rel="stylesheet" href="{{ asset('persuratan/register.css') }}">
    @endif

    <link rel="icon" type="image/png" href="{{ asset('persuratan/logo.png') }}">
</head>

<body>
    <div class="container">
        {{ $slot }}
    </div>

    <footer>
        <p>Copyright © {{ date('Y') }}
            <span>Sistem Informasi Persuratan</span>.
            All rights reserved.
        </p>
    </footer>

    <!-- JS (otomatis sesuai halaman) -->
    @if (Request::is('login'))
        <script src="{{ asset('persuratan/login.js') }}"></script>
    @elseif (Request::is('register'))
        <script src="{{ asset('persuratan/register.js') }}"></script>
    @endif
</body>
</html>
