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
        Schema::create('surat_menikah', function (Blueprint $table) {
            $table->id();
            $table->string('no',3)->unique();
            $table->string('nama');
            $table->string('kewarganegaraan');
            $table->string('jk');
            $table->date('tgl_lahir');
            $table->string('t4_lahir');
            $table->string('nama_pasangan');
            $table->string('agama');
            $table->string('status');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });

         // set foreign key to penduduk_induk table
         Schema::table('surat_menikah', function (Blueprint $table) {
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
        Schema::dropIfExists('surat_menikah');
    }
};
