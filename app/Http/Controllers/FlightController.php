<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\DeleteRequest;
use App\Models\Flight;

class FlightController extends Controller
{
    //
    public function store($id, StoreRequest $request) {
        $flight = new Flight;

        $flight->trip_id = $id;
        $flight->from_id = $request->origin;
        $flight->to_id = $request->destination;
        $flight->save();

        return response()->json(['status' => 'OK','data' => $flight]);
    }
    public function destroy($id, DeleteRequest $request) {

        Flight::destroy($request->flight_id);

        return response()->json(['status' => 'OK']);
    }
}
