<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukSementarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk_sementaras', function (Blueprint $table) {
            $table->id();
            $table->string('nik_tamu');
            $table->string('nama_tamu');
            $table->string('jk_tamu');
            $table->string('asal');
            $table->string('tanggal_datang');
            $table->string('tanggal_balik');
            $table->text('tujuan');
            $table->text('ket');
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
        Schema::dropIfExists('penduduk_sementaras');
    }
}
