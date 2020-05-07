<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengusulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengusul', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nip');
            $table->string('nama');
            $table->string('nama_perangkat_daerah');
            $table->text('alamat_perangkat_daerah');
            $table->integer('kodepos');
            $table->string('no_telepon');
            $table->string('no_hp');
            $table->string('email');
            $table->string('fungsi');
            $table->string('ruang_lingkup');
            $table->integer('id_jenis_layanan');
            $table->string('perangkat_lunak_terkait');
            $table->string('pengguna_layanan');
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
        Schema::dropIfExists('pengusul');
    }
}
