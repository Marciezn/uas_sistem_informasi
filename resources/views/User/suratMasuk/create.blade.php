<x-layoutUser>

<div class="content-user">

    <h1 class="page-title">Input Surat Masuk</h1>

    <form action="{{ route('user.suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>File surat</label>
        <input type="file" name="file_surat" class="form-input">

        <label>No. surat</label>
        <input type="text" name="no_surat" class="form-input">

        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-input">

        <label>Pengirim</label>
        <input type="text" name="pengirim" class="form-input">

        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-input">

        <label>Perihal</label>
        <input type="text" name="perihal" class="form-input">

        <div class="form-actions">
            <button type="submit" class="btn-save">SIMPAN</button>
            <a href="{{ route('user.suratmasuk.index') }}" class="btn-back">KEMBALI</a>
        </div>

    </form>

</div>

</x-layoutUser>
