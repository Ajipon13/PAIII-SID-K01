<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    use HasFactory;
    protected $table = 'domisili';
    protected $fillable = [
        'no','nama','nik','jk','t4_lahir',
        'tgl_lahir','kewarganegaraan','pekerjaan',
        'desa','kecamatan','kabupaten','agama'
    ];

    protected $casts = [ 'tb_penduduk_id', ];

    public function approval($status)
    {
        $this->approved = $status;
        $this->save();
    }
   
}
