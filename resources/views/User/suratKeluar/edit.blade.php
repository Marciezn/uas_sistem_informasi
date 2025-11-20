<x-layoutUser>

<div class="content-user">

    <h1 class="page-title">Edit Surat Keluar</h1>

    <form action="{{ route('user.suratkeluar.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>No. Surat</label>
        <input type="text" name="no_surat" class="form-input" value="{{ $data->no_surat }}" required>

        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-input" value="{{ $data->tanggal }}" required>

        <label>Tujuan</label>
        <input type="text" name="tujuan" class="form-input" value="{{ $data->tujuan }}" required>

        <label>Perihal</label>
        <input type="text" name="perihal" class="form-input" value="{{ $data->perihal }}" required>

        <label>File Surat</label>
        @if ($data->file_surat)
            <p>
                <a href="{{ asset('storage/'.$data->file_surat) }}" target="_blank" class="aksi-btn blue">
                    Lihat File Lama
                </a>
            </p>
        @endif
        <input type="file" name="file_surat" class="form-input">

        <button type="submit" class="btn-save">UPDATE</button>
        <a href="{{ route('user.suratkeluar.index') }}" class="btn-back">KEMBALI</a>
    </form>

</div>

</x-layoutUser>
