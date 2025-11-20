<x-layoutUser>

<div class="content-user">

    <h1 class="page-title">Input Surat Keluar</h1>

    <form action="{{ route('user.suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>No. Surat</label>
        <input type="text" name="no_surat" class="form-input" required>

        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-input" required>

        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-input" required>

        <label>Perihal</label>
        <input type="text" name="perihal" class="form-input" required>

        <label>File Surat</label>
        <input type="file" name="file_surat" class="form-input">

        <button type="submit" class="btn-save">SIMPAN</button>
        <a href="{{ route('user.suratkeluar.index') }}" class="btn-back">KEMBALI</a>
    </form>

</div>

</x-layoutUser>
