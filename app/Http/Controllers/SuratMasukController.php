<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return view('admin.suratmasuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        // Ambil semua user penerima
        $users = User::where('role', 'user')->get();
        return view('admin.suratmasuk.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'user_id' => 'required|exists:users,id',  // penerima wajib user valid
        ]);

        // Upload file
        $filePath = null;
        if ($request->hasFile('file_surat')) {
            $filePath = $request->file('file_surat')->store('surat_masuk', 'public');
        }

        // SIMPAN SURAT UNTUK ADMIN
        SuratMasuk::create([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'pengirim' => $request->pengirim,
            'tujuan' => 'ADMIN',
            'perihal' => $request->perihal,
            'file_surat' => $filePath,
            'user_id' => null,
        ]);

        // SIMPAN SURAT UNTUK USER PENERIMA
        SuratMasuk::create([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'pengirim' => $request->pengirim,
            'tujuan' => $request->user_id,        // user penerima
            'perihal' => $request->perihal,
            'file_surat' => $filePath,            // file sama
            'user_id' => $request->user_id,       // milik user penerima
        ]);

        return redirect()->route('admin.suratmasuk.index')
            ->with('success', 'Surat masuk berhasil dikirim ke user!');
    }

    public function edit($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('admin.suratmasuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratMasuk::findOrFail($id);

        $request->validate([
            'no_surat' => 'required',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $surat->file_surat;

        if ($request->hasFile('file_surat')) {
            if ($filePath) Storage::disk('public')->delete($filePath);
            $filePath = $request->file('file_surat')->store('surat_masuk', 'public');
        }

        $surat->update([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'file_surat' => $filePath,
        ]);

        return redirect()->route('admin.suratmasuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        if ($surat->file_surat) {
            Storage::disk('public')->delete($surat->file_surat);
        }

        $surat->delete();

        return redirect()->route('admin.suratmasuk.index')
            ->with('success', 'Surat berhasil dihapus!');
    }

    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('admin.suratmasuk.show', compact('surat'));
    }
}
