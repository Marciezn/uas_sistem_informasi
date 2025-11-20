<x-layoutAdmin>

<main class="main-content">

    <h1>Laporan</h1>

    <!-- Bagian Surat Masuk -->
    <button class="btn-section">Laporan surat masuk</button>

    <table class="tabel-laporan">
        <thead>
            <tr>
                <th>No. Surat</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratMasuk as $s)
            <tr>
                <td>{{ $s->no_surat }}</td>
                <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $s->pengirim }}</td>
                <td>{{ $s->perihal }}</td>
                <td><span class="badge badge-green">TERIMA</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bagian Surat Keluar -->
    <button class="btn-section" style="margin-top:40px;">Laporan surat keluar</button>

    <table class="tabel-laporan">
        <thead>
            <tr>
                <th>No. Surat</th>
                <th>Tanggal</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratKeluar as $s)
            <tr>
                <td>{{ $s->no_surat }}</td>
                <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $s->tujuan }}</td>
                <td>{{ $s->perihal }}</td>
                <td><span class="badge badge-blue">DIKIRIM</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</main>

</x-layoutAdmin>
