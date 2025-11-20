<x-layoutUser>

<div class="dashboard-container">

    <h1 class="page-title">Riwayat Surat</h1>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Perihal</th>
                <th>File</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row['jenis'] }}</td>
                <td>{{ $row['no_surat'] }}</td>
                <td>{{ $row['tanggal'] }}</td>
                <td>{{ $row['nama'] }}</td>
                <td>{{ $row['perihal'] }}</td>
                <td>
                    @if($row['file'])
                        <a href="{{ asset('storage/'.$row['file']) }}" 
                           class="aksi-btn blue" target="_blank">Lihat</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

</x-layoutUser>
