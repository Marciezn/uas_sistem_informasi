<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Auth;

class RiwayatUserController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::where('user_id', Auth::id())->get();
        $suratKeluar = SuratKeluar::where('user_id', Auth::id())->get();

        $data = $suratMasuk->map(function($item){
            return [
                'jenis'   => 'Surat Masuk',
                'no_surat'=> $item->no_surat,
                'tanggal' => $item->tanggal,
                'nama'    => $item->pengirim,
                'perihal' => $item->perihal,
                'file'    => $item->file_surat,
            ];
        })
        ->merge(
            $suratKeluar->map(function($item){
                return [
                    'jenis'   => 'Surat Keluar',
                    'no_surat'=> $item->no_surat,
                    'tanggal' => $item->tanggal,
                    'nama'    => $item->tujuan,
                    'perihal' => $item->perihal,
                    'file'    => $item->file_surat,
                ];
            })
        );

        return view('User.riwayat', compact('data'));
    }
}
