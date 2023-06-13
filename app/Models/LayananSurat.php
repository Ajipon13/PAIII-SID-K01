<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSurat extends Model
{
    use HasFactory;

    protected $table = 'layanan_surat';
    protected $fillable = [
        'context',
        'no_ktp',
        'nama',
        'jk',
        'pendidikan',
        'perkawinan',
        'pekerjaan',
        'rtrw',
        'tanggal',
        'kategori',
        'approvad'
    ];

    public function approval($status)
    {
        $this->approved = $status;
        $this->save();
    }
}
