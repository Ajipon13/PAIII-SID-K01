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
        Schema::create('layanan_surat', function (Blueprint $table) {
            $table->id();
            $table->text('context',2000);
            $table->string('no_ktp');
            $table->string('nama');
            $table->string('jk');
            $table->string('pendidikan');
            $table->string('perkawinan');
            $table->string('pekerjaan');
            $table->string('rtrw');
            $table->string('kategori');
            $table->date('tanggal');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('layanan_surat');
    }
};
