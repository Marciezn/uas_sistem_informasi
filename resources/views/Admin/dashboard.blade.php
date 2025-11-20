<x-layoutAdmin>
    <div class="main-content">
        <h1>Dashboard</h1>

        <div class="cards">
            <div class="card green">
                <h2>{{ $suratMasuk }}</h2>
                <p>Surat Masuk</p>
            </div>
            <div class="card blue">
                <h2>{{ $suratKeluar }}</h2>
                <p>Surat Keluar</p>
            </div>
            <div class="card yellow">
                <h2>{{ $pengguna }}</h2>
                <p>Pengguna</p>
            </div>
        </div>

        <div class="chart-section">
            <h3 class="chart-title">Grafik Aktivitas Surat</h3>
            <canvas id="chartSurat"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('chartSurat');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Januari','Februari','Maret','April','Mei','Juni',
                    'Juli','Agustus','September','Oktober','November','Desember'
                ],
                datasets: [{
                    label: 'Jumlah Surat',
                    data: @json($chartData), // ← AMBIL DATA DARI CONTROLLER
                    backgroundColor: 'rgba(88, 123, 255, 0.5)',
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-layoutAdmin>
