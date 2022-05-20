<?php

use App\Http\Controllers\AirplanesController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\MealsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//get,post, patch

Route::get('/', function () {
    return view('welcome');
});
//Meals
Route::get('all', [MealsController::class, 'index']);
Route::get('meals-show/{id}', [MealsController::class, 'show']);
Route::post('meals', [MealsController::class, 'store']);
Route::post('meals-update/{id}', [MealsController::class, 'update']);
Route::post('meals-delete/{id}', [MealsController::class, 'destroy']);
Route::get('all/{is_vegetarian}', [MealsController::class, 'indexVegetarian']);
Route::get('all/{is_vegetarian}', [MealsController::class, 'indexNonVegetarian']);




//Flights
Route::get('all', [FlightsController::class, 'index']);
Route::get('flights-show/{id}', [FlightsController::class, 'show']);
Route::post('flights', [FlightsController::class, 'store']);
Route::post('flights-update/{id}', [FlightsController::class, 'update']);
Route::post('flights-delete/{id}', [FlightsController::class, 'destroy']);

//Airplanes
Route::get('all', [AirplanesController::class, 'index']);
Route::get('airplanes-show/{id}', [AirplanesController::class, 'show']);
Route::post('airplanes', [AirplanesController::class, 'store']);
Route::post('airplanes-update/{id}', [AirplanesController::class, 'update']);
Route::post('airplanes-delete/{id}', [AirplanesController::class, 'destroy']);

//Airports
Route::get('all', [AirportsController::class, 'index']);
Route::get('airports-show/{id}', [AirportsController::class, 'show']);
Route::post('airports', [AirportsController::class, 'store']);
Route::post('airports-update/{id}', [AirportsController::class, 'update']);
Route::post('airports-delete/{id}', [AirportsController::class, 'destroy']);


// Below are just notes so that you don't have to  go to the documentation to avoid overwhelming you with too much info.
// They are not to-do's. Just notes.
//Route::patch('update', [MealsController::class, 'update']);
//Route::put('update', [MealsController::class, 'update']);
//Route::delete('delete', [MealsController::class, 'delete']);





