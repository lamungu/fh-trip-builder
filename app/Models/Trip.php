<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function flights() {
        return $this->hasMany('App\Models\Flight','trip_id','id');
    }

    public function single() {
        return response()->json(["name" => $this->name,
            "flights" => $this->flights]);
    }
}
