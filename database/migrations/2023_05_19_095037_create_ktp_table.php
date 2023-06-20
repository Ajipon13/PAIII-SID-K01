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
        Schema::create('ktp', function (Blueprint $table) {
            $table->id();
            $table->string('no',3)->unique();
            $table->string('nik');
            $table->string('nama');
            $table->string('jk');
            $table->string('t4_lahir');
            $table->string('tgl_lahir');
            $table->string('kecamatan');
            $table->string('alamat');   
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->string('nama_pasangan');
            $table->string('pekerjaan');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });

           // set foreign key to penduduk_induk table
           Schema::table('ktp', function (Blueprint $table) {
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
        Schema::dropIfExists('ktp');
    }
};
