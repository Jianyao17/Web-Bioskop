<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenayanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penayangan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_tayang');
            $table->unsignedBigInteger('id_film');
            $table->unsignedBigInteger('id_bioskop');
            $table->unsignedBigInteger('id_teater');
            $table->double('harga_tiket');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_film')->references('id')->on('films');
            $table->foreign('id_bioskop')->references('id')->on('gedung_bioskop');
            $table->foreign('id_teater')->references('id')->on('teater_bioskop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penayangan');
    }
}
