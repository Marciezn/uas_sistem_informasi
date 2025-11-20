<x-layoutAdmin>
<main class="main-content">

    <h1>Detail Surat Keluar</h1>

    <p><strong>No. Surat:</strong> {{ $surat->no_surat }}</p>
    <p><strong>Tujuan:</strong> {{ $surat->tujuan }}</p>
    <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>

    <div class="pdf-wrapper">
        @php
            $ext = strtolower(pathinfo($surat->file_surat, PATHINFO_EXTENSION));
        @endphp

        @if ($ext === 'pdf')
            <iframe 
                src="{{ asset('storage/' . $surat->file_surat) }}"
                class="pdf-frame">
            </iframe>
        @else
            <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank" class="btn-download">
                Download File ({{ strtoupper($ext) }})
            </a>
        @endif
    </div>

    <div class="button-group">
        <form action="{{ route('admin.suratkeluar.destroy', $surat->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn-hapus">Hapus</button>
        </form>
        <a href="{{ route('admin.suratkeluar.index') }}" class="btn-kembali">Kembali</a>
    </div>

</main>
</x-layoutAdmin>
