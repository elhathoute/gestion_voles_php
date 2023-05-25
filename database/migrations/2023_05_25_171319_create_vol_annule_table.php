<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vol_annule', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('flight_id');
            $table->string('raison_annulation');
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vol_annule');
    }
};
