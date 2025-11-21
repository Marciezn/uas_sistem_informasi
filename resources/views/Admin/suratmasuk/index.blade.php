<x-layoutAdmin>
  <main class="main-content">
    <h1>Surat Keluar</h1>

    

    <table class="tabel-surat">
      <thead>
        <tr>
          <th>File Surat</th>
          <th>No. Surat</th>
          <th>Tanggal</th>
          <th>Pengirim</th>
          <th>Tujuan</th>     <!-- BARU -->
          <th>Perihal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($suratMasuk as $s)
          <tr>
            <td>
              @if($s->file_surat)
                <a href="{{ route('admin.suratmasuk.show', $s->id) }}" class="btn-lihat">Lihat</a>
              @else
                -
              @endif
            </td>

            <td>{{ $s->no_surat }}</td>
            <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d/m/Y') }}</td>
            <td>{{ $s->pengirim }}</td>
            <td>{{ $s->tujuan }}</td>   <!-- BARU -->
            <td>{{ $s->perihal }}</td>

            <td>
              <a href="{{ route('admin.suratmasuk.edit', $s->id) }}" class="btn-edit">Edit</a>

              <form action="{{ route('admin.suratmasuk.destroy', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-hapus" onclick="return confirm('Hapus surat ini?')">Hapus</button>
              </form>
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </main>
</x-layoutAdmin>
