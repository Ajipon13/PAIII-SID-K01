<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    use HasFactory;

  protected  $table = "ktp";
  protected  $fillable = [
    'no','nik', 'nama','jk','t4_lahir','tgl_lahir','kecamatan',
    'alamat', 'kewarganegaraan', 'agama', 'nama_pasangan', 'pekerjaan'
    ];

  protected $casts = ['tb_penduduk_id'];

  public function approval($status)
  {
      $this->approved = $status;
      $this->save();
  }

}
