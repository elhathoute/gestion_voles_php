<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpaFlight extends Model
{
    use HasFactory;
    protected $fillable = [
        'hex',
        'reg_number',
        'flag',
        'lat',
        'lng',
        'alt',
        'dir',
        'speed',
        'v_speed',
        'squawk',
        'flight_number',
        'flight_icao',
        'flight_iata',
        'dep_icao',
        'dep_iata',
        'arr_icao',
        'arr_iata',
        'airline_icao',
        'airline_iata',
        'aircraft_icao',
        'updated',
        'status',
    ];

}
