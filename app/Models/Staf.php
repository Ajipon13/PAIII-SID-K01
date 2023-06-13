<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;
    protected $table = 'staf';
    protected $fillable = [
            'nik_staf', 'nama_staf', 'jenisk_staf',
            'agama_staf', 'pekerjaan_staf',  'pendidikan_staf'
    ];

}
