<x-layoutAdmin>
<main class="main-content">

    <h1>Edit Surat Keluar</h1>

    <form action="{{ route('admin.suratkeluar.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')

        <label>No. Surat</label>
        <input type="text" name="no_surat" value="{{ $surat->no_surat }}" required>

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $surat->tanggal }}" required>

        <label>Tujuan</label>
        <input type="text" name="tujuan" value="{{ $surat->tujuan }}" required>

        <label>Perihal</label>
        <input type="text" name="perihal" value="{{ $surat->perihal }}" required>

        <label>File Surat</label>
        <input type="file" name="file_surat">

        <div class="button-group">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.suratkeluar.index') }}" class="btn-kembali">Kembali</a>
        </div>
    </form>

</main>
</x-layoutAdmin>
