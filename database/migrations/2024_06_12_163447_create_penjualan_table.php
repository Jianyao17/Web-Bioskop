<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('penayangan_id');
            $table->unsignedBigInteger('bioskop_id');
            $table->json('list_kursi');
            $table->double('total_harga');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('penayangan_id')->references('id')->on('penayangan');
            $table->foreign('bioskop_id')->references('id')->on('gedung_bioskop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
