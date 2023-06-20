<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_Menikah extends Model
{
    use HasFactory;

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
