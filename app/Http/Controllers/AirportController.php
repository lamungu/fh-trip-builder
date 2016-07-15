<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use App\Http\Requests;

class AirportController extends Controller
{
    // The response is very heavy!
    // I've taken the airport data from OpenFlights database, and trimmed it down
    // To what is important. This gets all of whats in the database that way
    public function index() {
        return response()->json(Airport::all());
    }
}
