<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\RiwayatSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukUserController extends Controller
{
    public function index()
    {
        $data = SuratMasuk::where('user_id', Auth::id())->latest()->get();
        return view('User.suratmasuk.index', compact('data'));
    }

    public function create()
    {
        return view('User.suratmasuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'tanggal' => 'required|date',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $file = null;
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat')->store('suratmasuk', 'public');
        }

        $surat = SuratMasuk::create([
            'no_surat' => $request->no_surat,
            'pengirim' => $request->pengirim,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'tanggal' => $request->tanggal,
            'file_surat' => $file,
            'user_id' => Auth::id(),
        ]);

        // --- Simpan Riwayat ---
        RiwayatSurat::create([
            'user_id' => Auth::id(),
            'jenis' => 'Surat Masuk',
            'no_surat' => $surat->no_surat,
            'tanggal' => $surat->tanggal,
            'nama' => $surat->pengirim,
            'perihal' => $surat->perihal,
            'file_surat' => $surat->file_surat,
        ]);

        return redirect()->route('user.suratmasuk.index');
    }

    public function show($id)
    {
        $data = SuratMasuk::where('user_id', Auth::id())->findOrFail($id);
        return view('User.suratmasuk.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SuratMasuk::where('user_id', Auth::id())->findOrFail($id);
        return view('User.suratmasuk.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratMasuk::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'tanggal' => 'required|date',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $file = $data->file_surat;
        if ($request->hasFile('file_surat')) {
            // Hapus file lama
            if ($file) Storage::disk('public')->delete($file);

            $file = $request->file('file_surat')->store('suratmasuk', 'public');
        }

        $data->update([
            'no_surat' => $request->no_surat,
            'pengirim' => $request->pengirim,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'tanggal' => $request->tanggal,
            'file_surat' => $file,
        ]);

        return redirect()->route('user.suratmasuk.index');
    }

    public function destroy($id)
    {
        $data = SuratMasuk::where('user_id', Auth::id())->findOrFail($id);

        if ($data->file_surat) {
            Storage::disk('public')->delete($data->file_surat);
        }

        $data->delete();

        return redirect()->route('user.suratmasuk.index');
    }
}
