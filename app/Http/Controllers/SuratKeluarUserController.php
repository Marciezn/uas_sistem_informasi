<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarUserController extends Controller
{
    public function index()
    {
        $data = SuratKeluar::where('user_id', Auth::id())->latest()->get();
        return view('User.suratkeluar.index', compact('data'));
    }

    public function create()
    {
        return view('User.suratkeluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'tanggal' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
            'file_surat' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $file = null;
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat')->store('surat_keluar', 'public');
        }

        SuratKeluar::create([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $file,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user.suratkeluar.index');
    }

    public function show($id)
    {
        $data = SuratKeluar::where('user_id', Auth::id())->findOrFail($id);
        return view('User.suratkeluar.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SuratKeluar::where('user_id', Auth::id())->findOrFail($id);
        return view('User.suratkeluar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SuratKeluar::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'no_surat' => 'required',
            'tanggal' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
            'file_surat' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $file = $data->file_surat;

        if ($request->hasFile('file_surat')) {
            if ($file) Storage::disk('public')->delete($file);
            $file = $request->file('file_surat')->store('surat_keluar', 'public');
        }

        $data->update([
            'no_surat' => $request->no_surat,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $file,
        ]);

        return redirect()->route('user.suratkeluar.index');
    }

    public function destroy($id)
    {
        $data = SuratKeluar::where('user_id', Auth::id())->findOrFail($id);

        if ($data->file_surat) {
            Storage::disk('public')->delete($data->file_surat);
        }

        $data->delete();

        return redirect()->route('user.suratkeluar.index');
    }
}
