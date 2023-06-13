<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    // use HasFactory;

    protected $table = 'usahas';
    protected $fillable = [
        'jenis_usaha',
        'jumlah',
        'Lokasi',
    ];
}
