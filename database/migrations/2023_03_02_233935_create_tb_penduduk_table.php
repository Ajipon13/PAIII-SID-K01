<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik_penduduk');
            $table->string('nama_penduduk');
            $table->string('jk_penduduk');
            $table->string('agama_penduduk');
            $table->string('status_nikah');
            $table->string('pekerjaan_penduduk');
            $table->string('dusun_penduduk');
            $table->string('tr_penduduk');
            $table->string('rw_penduduk');
            $table->string('tempat_lahir_penduduk');
            $table->string('tanggal_lahir_penduduk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_penduduk');
    }
}
