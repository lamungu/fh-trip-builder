<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Trip;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TripController extends Controller
{
    //
    public function show($id) {
        try {
            $trip = Trip::findOrFail($id);
            return $trip->single();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Store a flight for a trip
    public function update($id, UpdateRequest $request) {
        try {
            $trip = Trip::findOrFail($id);
            $trip->name = $request->name;
            $trip->save();
            return response()->json(['status' => 'OK', 'data' => $trip]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


}
