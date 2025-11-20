<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use App\Models\RiwayatSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return view('admin.suratkeluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        // Ambil semua user sebagai penerima
        $users = User::where('role', 'user')->get();
        return view('admin.suratkeluar.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'tanggal' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Upload file
        $filePath = null;
        if ($request->hasFile('file_surat')) {
            $filePath = $request->file('file_surat')->store('surat_keluar', 'public');
        }

        // SIMPAN SURAT KELUAR ADMIN
        $suratKeluar = SuratKeluar::create([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $filePath,
            'user_id' => $request->user_id,
        ]);

        // BUAT SURAT MASUK UNTUK USER TUJUAN
        SuratMasuk::create([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'pengirim' => 'Admin',
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $filePath,
            'user_id' => $request->user_id,
        ]);

        // CATAT RIWAYAT (FIX)
        RiwayatSurat::create([
            'user_id' => $request->user_id,
            'jenis' => 'Surat Keluar',
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'nama' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $filePath,  // FIX
        ]);

        return redirect()->route('admin.suratkeluar.index')
            ->with('success', 'Surat keluar berhasil dikirim ke user!');
    }

    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $users = User::where('role', 'user')->get();
        return view('admin.suratkeluar.edit', compact('surat', 'users'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::findOrFail($id);

        $request->validate([
            'no_surat' => 'required',
            'tanggal' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $surat->file_surat;

        if ($request->hasFile('file_surat')) {
            if ($filePath) Storage::disk('public')->delete($filePath);
            $filePath = $request->file('file_surat')->store('surat_keluar', 'public');
        }

        $surat->update([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'user_id' => $request->user_id,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $filePath,
        ]);

        return redirect()->route('admin.suratkeluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        if ($surat->file_surat) Storage::disk('public')->delete($surat->file_surat);

        $surat->delete();

        return redirect()->route('admin.suratkeluar.index')
            ->with('success', 'Surat keluar berhasil dihapus!');
    }

    public function show($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('admin.suratkeluar.show', compact('surat'));
    }
}
