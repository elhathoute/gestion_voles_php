<?php

namespace App\Models;

use App\Models\Flight;


use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $guarded = [];
    protected $table = 'status'; // Specify the correct table name

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
