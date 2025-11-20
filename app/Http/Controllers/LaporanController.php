<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class LaporanController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        $suratKeluar = SuratKeluar::all();

        return view('admin.laporan', compact('suratMasuk', 'suratKeluar'));
    }
}
