<x-layoutAdmin>
<main class="main-content">

    <h1>Kirim Surat Keluar</h1>

    <form action="{{ route('admin.suratkeluar.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf

        <label>No. Surat</label>
        <input type="text" name="no_surat" required>

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Tujuan (User Penerima)</label>
        <select name="user_id" required>
            <option value="">-- Pilih User --</option>
            @foreach ($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>

        <label>Tujuan Surat</label>
        <input type="text" name="tujuan" required>

        <label>Perihal</label>
        <input type="text" name="perihal" required>

        <label>File Surat (PDF/DOC/DOCX)</label>
        <input type="file" name="file_surat">

        <div class="button-group">
            <button type="submit" class="btn-simpan">Kirim</button>
            <a href="{{ route('admin.suratkeluar.index') }}" class="btn-kembali">Kembali</a>
        </div>
    </form>

</main>
</x-layoutAdmin>
