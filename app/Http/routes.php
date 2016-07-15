<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'api/v1', 'middleware' => 'api'], function() {

   // Get all the airports
   Route::get('airports',     'AirportController@index');


   // Show trip with all its flights
   Route::get('trips/{id}',   'TripController@show');
   // Change trip name
   Route::put('trips/{id}',   'TripController@update');


   // Add a flight to the trip
   Route::post('trips/{id}/flights',  'FlightController@store');
   // Delete the flight
   Route::delete('trips/{id}/flights','FlightController@destroy');

});
