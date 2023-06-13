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
        Schema::create('surat_baik', function (Blueprint $table) {
            $table->id();
            $table->string('no',20);
            $table->string('nama',255);
            $table->date('tgl_lahir');
            $table->string('bangsa',255);
            $table->string('alamat',255);
            $table->string('status_perkawinan',255);
            $table->string('pekerjaan',255);
            $table->string('agama',255);
            $table->string('jk',255);
            $table->string('t4_lahir',255);
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });

        // set foreign key to penduduk_induk table
        Schema::table('surat_baik', function (Blueprint $table) {
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
        Schema::dropIfExists('surat_baik');
    }
};
