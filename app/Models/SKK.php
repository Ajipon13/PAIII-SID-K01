<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKK extends Model
{
    use HasFactory;
    protected $table = 'skk';
    protected $fillable = [
        'no',
        'nama',
        'jk',
        't4_lahir',
        'tgl_lahir',
        'agama',
        's_pernikaan',
        'pekerjaan',
        'warga_negara',
        'alamat',
        'nama_pasang',
        'wargapasangan',
    ];
    protected $casts = [ 'tb_penduduk_id', ];

    public function approval($status)
    {
        $this->approved = $status;
        $this->save();
    }

}
