<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKKM extends Model
{
    use HasFactory;

    protected $table = '';
    protected $fillable = [
        ''
    ];

    protected $casts = [''];

    public function approval($status)
    {
        $this->approved = $status;
        $this->save();
    }
}
