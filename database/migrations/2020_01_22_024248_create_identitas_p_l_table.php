<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasPLTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_p_l', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_perangkat_lunak');
            $table->string('no_versi');
            $table->integer('id_jenis_layanan');
            $table->integer('id_jumlah_pemakai');
            $table->integer('id_platform');
            $table->integer('id_os');
            $table->string('jenis_database');
            $table->text('info_tambahan');
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
        Schema::dropIfExists('identitas_p_l');
    }
}
