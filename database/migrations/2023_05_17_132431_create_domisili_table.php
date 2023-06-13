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
        Schema::create('domisili', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('nama');
            $table->string('jk');
            $table->string('kecamatan');
            $table->string('tgl_lahir');
            $table->string('t4_lahir');
            $table->string('nik');
            $table->string('agama');
            $table->string('kabupaten');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('desa');
            $table->boolean('approved')->default(false);

            $table->timestamps();
        });
        // set foreign key to penduduk_induk table
        Schema::table('domisili', function (Blueprint $table) {
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
        Schema::dropIfExists('domisili');
    }
};
