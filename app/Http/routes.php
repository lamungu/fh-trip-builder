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

   Route::get('airports',     'AirportController@index');
   Route::get('trips/{id}',   'TripController@show');

   Route::post('trips/{id}',  'FlightController@store');
   Route::delete('trips/{id}','FlightController@destroy');

   Route::put('trips/{id}',   'TripController@update');

});
