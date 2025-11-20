<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function dataPengguna()
{
    return view('admin.datapengguna', [
        'title' => 'Data Pengguna'
    ]);
}


    public function suratmasuk()
    {
        return view('admin.suratmasuk');
    }
    public function suratkeluar()
    {
        return view('admin.suratkeluar');
    }
    public function laporan()
    {
        return view('admin.laporan');
    }
}
