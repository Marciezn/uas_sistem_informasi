<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatSurat extends Model
{
    protected $table = 'riwayat_surat';

    protected $fillable = [
        'user_id',
        'jenis',
        'no_surat',
        'tanggal',
        'nama',
        'perihal',
        'file_surat'
    ];
}
