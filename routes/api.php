<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\sport;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

|
*/


Route::resource('/sports','SportsController');
Route::resource('/locations','LocationsController');
Route::resource('/LocationTypes','LocationTypesController');
Route::post('/sports/assign','Location_sports_Controller@assign');
Route::get('/sports/{sport}/location','Location_sports_Controller@getsport');
Route::get('/location_sport','Location_sports_Controller@index');
Route::get('/location_sport/{location_sport}','Location_sports_Controller@show');
Route::patch('/location_sport/{location_sport}','Location_sports_Controller@update');
Route::delete('/location_sport/{location_sport}','Location_sports_Controller@destroy');
Route::get('/location_sport/{location}/location','Location_sports_Controller@GetByLocation');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
