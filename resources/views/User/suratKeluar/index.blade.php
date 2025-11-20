<x-layoutUser>

<div class="dashboard-container">

    <h1 class="page-title">Surat Keluar</h1>

    <div class="top-actions">
        <a href="{{ route('user.suratkeluar.create') }}" class="aksi-btn blue">
            + Tambah
        </a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>No Surat</th>
                <th>Tanggal</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->no_surat }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->tujuan }}</td>
                <td>{{ $row->perihal }}</td>

                <td>
                    @if($row->file_surat)
                        <a href="{{ asset('storage/'.$row->file_surat) }}" target="_blank" class="aksi-btn blue">Lihat</a>
                    @else
                        -
                    @endif
                </td>

                <td class="actions">
                    <a href="{{ route('user.suratkeluar.show', $row->id) }}" class="aksi-btn green">Detail</a>
                    <a href="{{ route('user.suratkeluar.edit', $row->id) }}" class="aksi-btn blue">Edit</a>

                    <form action="{{ route('user.suratkeluar.destroy', $row->id) }}"
                          method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="aksi-btn red" onclick="return confirm('Hapus surat ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

</x-layoutUser>
