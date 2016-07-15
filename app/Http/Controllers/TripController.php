<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Trip;

class TripController extends Controller
{
    //
    public function show($id) {
        $trip = Trip::find($id);
        return $trip->single();
    }

    // Store a flight for a trip
    public function update($id, UpdateRequest $request) {
        $trip = Trip::find($id);
        $trip->name = $request->name;
        $trip->save();
        return response()->json(['status' => 'OK', 'data' => $trip]);
    }


}
