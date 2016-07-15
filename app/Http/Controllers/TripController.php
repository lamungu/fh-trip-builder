<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Trip;

class TripController extends Controller
{
    //
    public function show($id) {
        $trip = Trip::find(1);
        return $trip->single();
    }
}
