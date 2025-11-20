<x-layoutUser>

<div class="content-user">

    <h1 class="page-title">Edit Surat Masuk</h1>

    <form action="{{ route('user.suratmasuk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>File surat (upload jika ingin ganti)</label>
        @if ($data->file_surat)
            <p>
                <a href="{{ asset('storage/'.$data->file_surat) }}" target="_blank" class="aksi-btn blue">
                    Lihat File Saat Ini
                </a>
            </p>
        @endif
        <input type="file" name="file_surat" class="form-input">

        <label>No. Surat</label>
        <input type="text" name="no_surat" class="form-input" value="{{ $data->no_surat }}">

        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-input" value="{{ $data->tanggal }}">

        <label>Pengirim</label>
        <input type="text" name="pengirim" class="form-input" value="{{ $data->pengirim }}">

        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-input" value="{{ $data->tujuan }}">

        <label>Perihal</label>
        <input type="text" name="perihal" class="form-input" value="{{ $data->perihal }}">

        <button type="submit" class="btn-save">SIMPAN</button>
        <a href="{{ route('user.suratmasuk.index') }}" class="btn-back">KEMBALI</a>
    </form>

</div>

</x-layoutUser>
