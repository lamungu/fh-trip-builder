<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    public $timestamps = false;
    protected $appends = ['origin','destination'];
    protected $hidden = ['trip_id','from','from_id','to_id','to'];

    public function from() {
        return $this->belongsTo('App\Models\Airport','from_id','id');
    }
    public function to() {
        return $this->belongsTo('App\Models\Airport','to_id','id');
    }
    public function getOriginAttribute() {
        return "{$this->from->city} ({$this->from->icao})";
    }
    public function getDestinationAttribute() {
        return "{$this->to->city} ({$this->to->icao})";
    }
    public function single() {
        return response()->json(['origin' => $this->origin, 'destination'=>$this->destination]);
    }
}
