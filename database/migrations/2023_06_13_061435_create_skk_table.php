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
        Schema::create('skk', function (Blueprint $table) {
            $table->id();
            $table->string('no',3)->unique();
            $table->string('nama');
            $table->string('jk');
            $table->string('t4_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('s_pernikaan');
            $table->string('pekerjaan');
            $table->string('warga_negara');
            $table->string('alamat');
            $table->string('nama_pasang');
            $table->string('wargapasangan');
            $table->boolean('approved')->default(false);  
            $table->timestamps();
        });

         // set foreign key to penduduk_induk table
         Schema::table('skk', function (Blueprint $table) {
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
        Schema::dropIfExists('skk');
    }
};
