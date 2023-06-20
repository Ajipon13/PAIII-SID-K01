<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_Usaha extends Model
{
    use HasFactory;

    protected $table = 'surat_usaha';
    protected $fillable = [
        'no',
        'nama',
        't4_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'pekerjaan',
        'alamat',
        'jenis_usaha',
        'sejak',
    ];


    protected $casts = [ 'tb_penduduk_id', ];

    public function approval($status)
    {
        $this->approved = $status;
        $this->save();
    }

    protected static function booted()
    {
        static::creating(function ($surat) {
            $lastSurat = static::latest('no')->first();

            if ($lastSurat) {
                $nomor = intval($lastSurat->no) + 1;
                $surat->no = sprintf("%03d", $no);
            } else {
                $surat->no = '001';
            }
        });
    }
}
