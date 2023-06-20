<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_Mati extends Model
{
    use HasFactory;
    protected $table = 'smeninggal';  
    protected $fillable = [
        'nomor',
        'nama_meninggal',
        'nik_meninggal',
        'jk_meninggal',
        't4_lahir_meninggal',
        'tgl_lahir_meninggal',
        'wargaN_meninggal',
        'agama_meniggal',
        's_pernikaan_meninggal',
        'pekerjaanM',
        'alamatM',
        'tgl_meningaal',
        'waktuM',
        't4_meinggal',
        'sebab',
        'nama_pembuat',
        'nik_pembuat',
        't4_lahir_pembuat',
        'tgl_lahir_pembuat',
        'pekerjaan_pemnuat',
        'alamat_pembuat'
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
            $lastSurat = static::latest('nomor')->first();

            if ($lastSurat) {
                $nomor = intval($lastSurat->nomor) + 1;
                $surat->nomor = sprintf("%03d", $nomor);
            } else {
                $surat->nomor = '001';
            }
        });
    }
}
