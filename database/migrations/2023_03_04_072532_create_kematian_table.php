<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nik',50);
            $table->string('nama_',50);
            $table->string('jenis_kelamin',20);
            $table->string('tempat_lahir',20);
            $table->string('tgl_lahir',20);
            $table->string('tempat_wafaat',20);
            $table->string('tgl_wafaat',20);
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
        Schema::dropIfExists('kematian');
    }
}
