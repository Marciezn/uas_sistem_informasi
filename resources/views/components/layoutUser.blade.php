<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User - Sistem Informasi Persuratan</title>

    <!-- Font & Icon -->
    <link rel="stylesheet" href="{{ asset('persuratan/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS User -->
    <link rel="stylesheet" href="{{ asset('persuratan/dashboard-user.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/surat-masuk-user.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/surat-masuk2-user.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/surat-masuk3-user.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/surat-keluar-user.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/riwayat-surat-user.css') }}">

</head>

<body>

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Navbar -->
    <x-navbar />

    <!-- CONTENT USER -->
    <main class="main-content">
        {{ $slot }}
    </main>

    


    <!-- Footer -->
    <footer class="footer">
        <strong>&copy; {{ date('Y') }} Sistem Informasi Persuratan.</strong> All rights reserved.
    </footer>

    <!-- JS -->
    <script src="{{ asset('persuratan/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('persuratan/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('script')

</body>
</html>
