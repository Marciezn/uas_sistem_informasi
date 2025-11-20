<x-layoutAdmin>
<main class="main-content">

    <h1>Detail Surat Masuk</h1>

    <div class="surat-info">
        <p><strong>No. Surat:</strong> {{ $surat->no_surat }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($surat->tanggal)->format('d/m/Y') }}</p>
        <p><strong>Pengirim:</strong> {{ $surat->pengirim }}</p>
        <p><strong>Tujuan:</strong> {{ $surat->tujuan }}</p> <!-- BARU -->
        <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>
    </div>

    <!-- FILE VIEWER -->
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

    <div class="button-group-fixed">

        <form action="{{ route('admin.suratmasuk.destroy', $surat->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn-hapus" onclick="return confirm('Yakin hapus surat ini?')">
                Hapus
            </button>
        </form>

        <a href="{{ route('admin.suratmasuk.index') }}" class="btn-kembali">
            Kembali
        </a>
    </div>

</main>
</x-layoutAdmin>
