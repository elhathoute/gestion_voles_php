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
        Schema::create('ipa_flights', function (Blueprint $table) {
            $table->id();
            $table->string('hex')->default(0);
            $table->string('reg_number');
            $table->string('flag');
            $table->string('lat');
            $table->string('lng');
            $table->string('alt');
            $table->string('dir');
            $table->string('speed');
            $table->string('v_speed');
            $table->string('squawk');
            $table->string('flight_number');
            $table->string('flight_icao');
            $table->string('flight_iata')->default(0);
            $table->string('dep_icao');
            $table->string('dep_iata');
            $table->string('arr_icao')->default(0);
            $table->string('arr_iata')->default(0);
            $table->string('airline_icao');
            $table->string('airline_iata')->default(0);
            $table->string('aircraft_icao');
            $table->string('updated');
            $table->string('status');
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
        Schema::dropIfExists('ipa_flights');
    }
};
