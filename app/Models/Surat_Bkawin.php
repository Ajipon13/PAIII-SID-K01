<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_Bkawin extends Model
{
    use HasFactory;
    
    protected $table = 'surat_bkawin';  
    protected $fillable = [
        'no', 'nama', 'nik', 'jk', 't4_lahir', 'tgl_lahir', 'warga_negara',
        'agama', 'pekerjaan', 's_pernikaan', 'alamat'
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
