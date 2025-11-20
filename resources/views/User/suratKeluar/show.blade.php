<x-layoutUser>

<div class="content-user">

    <h1 class="page-title">Detail Surat Keluar</h1>

    <div class="detail-box">
        <p><strong>No. Surat:</strong> {{ $data->no_surat }}</p>
        <p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
        <p><strong>Tujuan:</strong> {{ $data->tujuan }}</p>
        <p><strong>Perihal:</strong> {{ $data->perihal }}</p>
    </div>

    <div style="margin-top: 20px;">
        @php
            $ext = strtolower(pathinfo($data->file_surat, PATHINFO_EXTENSION));
        @endphp

        @if ($data->file_surat)
            @if ($ext == 'pdf')
                <iframe src="{{ asset('storage/'.$data->file_surat) }}" style="width:100%; height:500px;"></iframe>
            @else
                <a href="{{ asset('storage/'.$data->file_surat) }}" target="_blank" class="aksi-btn blue">
                    Download File ({{ strtoupper($ext) }})
                </a>
            @endif
        @else
            <p>- Tidak ada file terlampir -</p>
        @endif
    </div>

    <a href="{{ route('user.suratkeluar.index') }}" class="btn-back" style="margin-top:20px;">KEMBALI</a>

</div>

</x-layoutUser>
