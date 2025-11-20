<x-layoutUser>

<div class="content-user">

    <h1 class="page-title">Detail Surat Masuk</h1>

    <div class="detail-box">

        <p><strong>File:</strong><br>
            @if ($data->file_surat)
                @php
                    $ext = strtolower(pathinfo($data->file_surat, PATHINFO_EXTENSION));
                @endphp

                @if ($ext === 'pdf')
                    <iframe 
                        src="{{ asset('storage/' . $data->file_surat) }}" 
                        style="width:100%; height:450px; border:1px solid #ddd;">
                    </iframe>
                @else
                    <a href="{{ asset('storage/' . $data->file_surat) }}" class="aksi-btn blue" target="_blank">
                        Download File ({{ strtoupper($ext) }})
                    </a>
                @endif

            @else
                Tidak ada file.
            @endif
        </p>

        <p><strong>No. Surat:</strong> {{ $data->no_surat }}</p>
        <p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
        <p><strong>Pengirim:</strong> {{ $data->pengirim }}</p>
        <p><strong>Tujuan:</strong> {{ $data->tujuan }}</p>
        <p><strong>Perihal:</strong> {{ $data->perihal }}</p>
    </div>

    <div style="margin-top:20px;">
        <a href="{{ route('user.suratmasuk.index') }}" class="btn-back">KEMBALI</a>
    </div>

</div>

</x-layoutUser>
