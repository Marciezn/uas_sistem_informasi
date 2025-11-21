<x-layoutAdmin>
  <main class="main-content">
    <h1>Surat Keluar</h1>

    <a href="{{ route('admin.suratkeluar.create') }}" class="btn-tambah">
      <i class="fa-solid fa-paper-plane"></i> Kirim Surat
    </a>

    <table class="tabel-surat">
      <thead>
        <tr>
          <th>File</th>
          <th>No. Surat</th>
          <th>Tanggal</th>
          <th>Tujuan</th>
          <th>Perihal</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($suratKeluar as $s)
          <tr>
            <td>
              @if ($s->file_surat)
                <a href="{{ route('admin.suratkeluar.show', $s->id) }}" class="btn-lihat">Lihat</a>
              @else
                -
              @endif
            </td>

            <td>{{ $s->no_surat }}</td>
            <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d/m/Y') }}</td>
            <td>{{ $s->tujuan }}</td>
            <td>{{ $s->perihal }}</td>

            <td>
              <a href="{{ route('admin.suratkeluar.edit', $s->id) }}" class="btn-edit">Edit</a>

              <form action="{{ route('admin.suratkeluar.destroy', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-hapus" onclick="return confirm('Hapus surat ini?')">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </main>
</x-layoutAdmin>
