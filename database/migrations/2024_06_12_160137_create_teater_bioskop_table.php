<?php

use App\Models\Bioskop;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeaterBioskopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teater_bioskop', function (Blueprint $table) {
            $table->id();
            $table->string('nama_teater');
            $table->unsignedBigInteger('id_bioskop');
            $table->json('list_kursi');
            $table->integer('kapasitas');
            $table->string('status');
            $table->timestamps();

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
        Schema::dropIfExists('teater_bioskop');
    }
}
