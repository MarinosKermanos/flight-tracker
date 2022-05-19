<?php

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

Route::post('meals', [MealsController::class, 'store']);
Route::get('all', [MealsController::class, 'index']);
// Below are just notes so that you don't have to  go to the documentation to avoid overwhelming you with too much info.
// They are not to-do's. Just notes.
//Route::patch('update', [MealsController::class, 'update']);
//Route::put('update', [MealsController::class, 'update']);
//Route::delete('delete', [MealsController::class, 'delete']);
Route::post('meals-update/{id}', [MealsController::class, 'update']);
Route::post('meals-delete/{id}', [MealsController::class, 'destroy']);




