<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukSementara extends Model
{
    // use HasFactory;

    protected $table = 'penduduk_sementaras';
    protected $fillable = [
        'nik_tamu',
        'nama_tamu',
        'jk_tamu',
        'asal',
        'tanggal_datang',
        'tanggal_balik',
        'tujuan',
        'ket'
    ];
}
