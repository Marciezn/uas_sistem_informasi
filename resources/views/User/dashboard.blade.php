<x-layoutUser>

<div class="dashboard-container">

    <h1 class="title-page">Dashboard User</h1>

    <!-- STAT BOX WRAPPER -->
    <div class="stats-wrapper">

        <!-- SURAT MASUK -->
        <div class="stat-box box-green">
            <div class="stat-value">{{ $totalMasuk }}</div>
            <div class="stat-label">Surat Masuk</div>
        </div>

        <!-- SURAT KELUAR -->
        <div class="stat-box box-blue">
            <div class="stat-value">{{ $totalKeluar }}</div>
            <div class="stat-label">Surat Keluar</div>
        </div>

    </div>

    <!-- RIWAYAT -->
    <h2 class="sub-title">Riwayat Terbaru</h2>

    <table class="dashboard-table">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $r)
            <tr>
                <td>{{ $r['jenis'] }}</td>
                <td>{{ $r['no_surat'] }}</td>
                <td>{{ $r['tanggal'] }}</td>
                <td>{{ $r['perihal'] }}</td>
            </tr>
            @endforeach

            @if ($riwayat->isEmpty())
            <tr>
                <td colspan="4" style="text-align:center; color:#888;">
                    Belum ada riwayat surat.
                </td>
            </tr>
            @endif
        </tbody>
    </table>

</div>

</x-layoutUser>
