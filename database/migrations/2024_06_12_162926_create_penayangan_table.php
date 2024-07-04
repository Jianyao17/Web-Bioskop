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
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('bioskop_id');
            $table->unsignedBigInteger('teater_id');
            $table->double('harga_tiket');
            $table->string('status');
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('bioskop_id')->references('id')->on('gedung_bioskop');
            $table->foreign('teater_id')->references('id')->on('teater_bioskop');
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
