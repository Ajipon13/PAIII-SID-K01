<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;
    protected $table = 'kematian';
    protected $fillable = [
        'nama_',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'tempat_wafaat',
        'tgl_wafaat',
        'ket'
    ];
}
