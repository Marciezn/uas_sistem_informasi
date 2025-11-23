<x-layoutUser>
<div class="dashboard-container">
<div class="page-header">
    <h1 class="page-title">Surat Masuk</h1>

   
</div>

<table class="data-table">
    <thead>
        <tr>
            <th>No Surat</th>
            <th>Pengirim</th>
            <th>Perihal</th>
            <th>Tanggal</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->no_surat }}</td>
            <td>{{ $row->pengirim }}</td>
            <td>{{ $row->perihal }}</td>
            <td>{{ $row->tanggal }}</td>

            <td>
                @if($row->file_surat)
                    <a href="{{ asset('storage/'.$row->file_surat) }}" class="aksi-btn blue">Lihat</a>
                @else
                    -
                @endif
            </td>

            <td>
                <a href="{{ route('user.suratmasuk.show', $row->id) }}" class="aksi-btn green">Detail</a>
                <a href="{{ route('user.suratmasuk.edit', $row->id) }}" class="aksi-btn blue">Edit</a>

                <form action="{{ route('user.suratmasuk.destroy', $row->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="aksi-btn red">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-layoutUser>
