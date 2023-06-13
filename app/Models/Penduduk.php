<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    // use HasFactory;
    protected $table = 'tb_penduduk';
    protected $fillable = [
        'nik_penduduk',
        'nama_penduduk',
        'jk_penduduk',
        'agama_penduduk',
        'status_nikah',
        'pekerjaan_penduduk',
        'dusun_penduduk',
        'tr_penduduk',
        'rw_penduduk',
        'tempat_lahir_penduduk',
        'tanggal_lahir_penduduk',
    ];

    protected $primarykey='id';
}
