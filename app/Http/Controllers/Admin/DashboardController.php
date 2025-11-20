<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total untuk card
        $suratMasuk = SuratMasuk::count();
        $suratKeluar = SuratKeluar::count();
        $pengguna = User::count();

        // Data chart per bulan
        $chartData = [];

        for ($i = 1; $i <= 12; $i++) {
            $countMasuk  = SuratMasuk::whereMonth('tanggal', $i)->count();
            $countKeluar = SuratKeluar::whereMonth('tanggal', $i)->count();

            // jumlah surat = surat masuk + keluar
            $chartData[] = $countMasuk + $countKeluar;
        }

        return view('admin.dashboard', compact(
            'suratMasuk',
            'suratKeluar',
            'pengguna',
            'chartData'
        ));
    }
}
