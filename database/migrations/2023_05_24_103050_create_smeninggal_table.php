<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smeninggal', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nama_meninggal');
            $table->string('nik_meninggal');
            $table->string('jk_meninggal');
            $table->string('t4_lahir_meninggal');
            $table->date('tgl_lahir_meninggal');
            $table->string('wargaN_meninggal');
            $table->string('agama_meniggal');
            $table->string('s_pernikaan_meninggal');
            $table->string('pekerjaanM');
            $table->text('alamatM');
            $table->date('tgl_meningaal');
            $table->string('waktuM');
            $table->string('t4_meinggal');
            $table->text('sebab');
            $table->string('nama_pembuat');
            $table->string('nik_pembuat');
            $table->string('t4_lahir_pembuat');
            $table->date('tgl_lahir_pembuat');
            $table->string('pekerjaan_pemnuat');
            $table->text('alamat_pembuat');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });

        Schema::table('smeninggal', function (Blueprint $table) {
            $table->foreignId('tb_penduduk_id')->constrained('tb_penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smeninggal');
    }
};
