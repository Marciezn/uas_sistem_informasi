<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class UserController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        // Hitung total surat
        $totalMasuk = SuratMasuk::where('user_id', $userId)->count();
        $totalKeluar = SuratKeluar::where('user_id', $userId)->count();

        // Riwayat terbaru
        $riwayatMasuk = SuratMasuk::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function($s){
                return [
                    'jenis' => 'Surat Masuk',
                    'no_surat' => $s->no_surat,
                    'tanggal' => $s->tanggal,
                    'perihal' => $s->perihal
                ];
            });

        $riwayatKeluar = SuratKeluar::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function($s){
                return [
                    'jenis' => 'Surat Keluar',
                    'no_surat' => $s->no_surat,
                    'tanggal' => $s->tanggal,
                    'perihal' => $s->perihal
                ];
            });

        // gabungkan & sorting
        $riwayat = $riwayatMasuk
            ->merge($riwayatKeluar)
            ->sortByDesc('tanggal')
            ->take(5);

        return view('User.dashboard', compact('totalMasuk', 'totalKeluar', 'riwayat'));
    }
}
