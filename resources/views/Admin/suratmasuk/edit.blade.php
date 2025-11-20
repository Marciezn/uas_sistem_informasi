<x-layoutAdmin>
  <main class="content">
    <div class="header">
      <h1>Edit Surat Masuk</h1>
      <a href="{{ route('admin.suratmasuk.index') }}" class="btn-tambah">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>

    <form action="{{ route('admin.suratmasuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="form">
      @csrf
      @method('PUT')

      <label>No. Surat</label>
      <input type="text" name="no_surat" value="{{ $surat->no_surat }}" required>

      <label>Tanggal</label>
      <input type="date" name="tanggal" value="{{ $surat->tanggal }}" required>

      <label>Pengirim</label>
      <input type="text" name="pengirim" value="{{ $surat->pengirim }}" required>

      <label>Tujuan</label> <!-- BARUUUU -->
      <input type="text" name="tujuan" value="{{ $surat->tujuan }}" required>

      <label>Perihal</label>
      <input type="text" name="perihal" value="{{ $surat->perihal }}" required>

      <label>File Surat (PDF/DOCX)</label>
      @if ($surat->file_surat)
        <p><a href="{{ asset('storage/'.$surat->file_surat) }}" target="_blank">Lihat file saat ini</a></p>
      @endif

      <input type="file" name="file_surat" accept=".pdf,.doc,.docx">

      <div class="button-group">
        <button type="submit" class="btn-simpan">
          <i class="fa-solid fa-floppy-disk"></i> Update
        </button>

        <a href="{{ route('admin.suratmasuk.index') }}" class="btn-kembali">
          <i class="fa-solid fa-rotate-left"></i> Batal
        </a>
      </div>
    </form>
  </main>
</x-layoutAdmin>
