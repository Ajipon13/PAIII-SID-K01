<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDesa extends Model
{
    // use HasFactory;
    protected $table = 'profile_desa';
    protected $fillable = [
        'profile_desa',
        'profile_img'
    ];
}
