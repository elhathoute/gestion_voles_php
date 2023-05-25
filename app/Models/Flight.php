<?php

namespace App\Models;
use App\Models\Statu;


use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $guarded = [];

    protected $with = ['airline:id,name', 'plane:id,code', 'origin:id,name', 'destination:id,name', 'status:id,name'];


    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function plane()
    {
        return $this->belongsTo(Plane::class, 'plane_id')->withDefault([
            'code' => 'N/A',
            "name" => "N/A"
        ]);
    }

    public function origin()
    {
        return $this->belongsTo(Airport::class, "origin_id");
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, "destination_id");
    }

    // status
    public function status()
    {
        return $this->belongsTo(Statu::class,"status_id");
    }

}
