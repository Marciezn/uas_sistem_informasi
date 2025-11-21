<x-layoutAdmin>
  <main class="content">
    <div class="header">
      <h1>Tambah Surat Masuk</h1>
      <a href="{{ route('admin.suratmasuk.index') }}" class="btn-tambah">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>

    <form action="{{ route('admin.suratmasuk.store') }}" method="POST" enctype="multipart/form-data" class="form">
      @csrf

      <label>No. Surat</label>
      <input type="text" name="no_surat" required>

      <label>Tanggal</label>
      <input type="date" name="tanggal" required>

      <label>Pengirim</label>
      <input type="text" name="pengirim" required>

      <label>Tujuan (User Penerima Surat)</label>
      <select name="user_id" required>
          <option value="">-- Pilih User --</option>
          @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
      </select>


      <label>Perihal</label>
      <input type="text" name="perihal" required>

      <label>File Surat (PDF/DOCX)</label>
      <input type="file" name="file_surat" accept=".pdf,.doc,.docx">

      <div class="button-group">
        <button type="submit" class="btn-simpan">
          <i class="fa-solid fa-floppy-disk"></i> Simpan
        </button>

        <a href="{{ route('admin.suratmasuk.index') }}" class="btn-kembali">
          <i class="fa-solid fa-rotate-left"></i> Batal
        </a>
      </div>

    </form>
  </main>
</x-layoutAdmin>
