<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Informasi Persuratan' }}</title>

    <!-- Style & Plugin -->
    <link rel="stylesheet" href="{{ asset('persuratan/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/suratmasuk.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/viewsurat.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/inputpengguna.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/pengguna.css') }}">
    <link rel="stylesheet" href="{{ asset('persuratan/footer.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
 html, body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: auto;
    min-height: 100%;
    overflow-x: hidden;
    overflow-y: auto;   /* hanya body yang boleh scroll */
    background: #f6f8fc;
}

/* Container fleksibel, TIDAK SCROLL */
.container {
    display: flex;
    width: 100%;
    min-height: 100vh;
    overflow: visible !important;
}

/* Wrapper tidak scroll */
.main-wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    overflow: visible !important;
}


/* MAIN CONTENT — TIDAK SCROLL */
main.main-content {
    flex: 1;
    padding: 70px 40px 40px 40px;
    padding-top: 20px;
    overflow: visible !important;
}
    </style>
</head>
<body>
    <div class="container">
        <!-- 🔹 SIDEBAR (selalu di kiri) -->
        <x-sidebar />

        <!-- 🔹 WRAPPER UTAMA (navbar + konten + footer) -->
        <div class="main-wrapper">
            <!-- 🔹 NAVBAR -->
            <x-navbar />

            <!-- 🔹 MAIN CONTENT -->
            <main class="main-content">
                {{ $slot }}
            </main>

            <!-- 🔹 FOOTER -->
        

        </div>
    </div>

    <footer class="footer-admin">
    <p>Copyright © {{ date('Y') }} 
       <b>Sistem Informasi Persuratan</b>. All rights reserved.</p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src
    @stack('script')
</body>
</html>
