<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_laporan');
            $table->unsignedBigInteger('id_bioskop');
            $table->integer('jml_penjualan');
            $table->integer('kursi_terjual');
            $table->double('pendapatan_rp');

            $table->foreign('id_bioskop')->references('id')->on('gedung_bioskop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
