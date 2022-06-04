<?php

use App\Http\Controllers\AirplanesController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\MealsController;
use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Meal;
use App\Models\User;
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
Route::post('meals-update/{id}/{flightId}', [MealsController::class, 'update']);
Route::post('meals-delete/{id}', [MealsController::class, 'destroy']);
Route::get('all-veg/{flight_id}', [MealsController::class, 'indexVegetarian']);
Route::get('non-veg/{flight_id}', [MealsController::class, 'indexNonVegetarian']);


//Flights
Route::get('all', [FlightsController::class, 'index']);
Route::get('flights-show/{id}', [FlightsController::class, 'show']);
Route::post('flights', [FlightsController::class, 'store']);
Route::post('flights-update/{id}', [FlightsController::class, 'update']);
Route::delete('flights-delete/{id}', [FlightsController::class, 'destroy']);

//Airplanes
Route::get('all', [AirplanesController::class, 'index']);
Route::get('airplanes-show/{id}', [AirplanesController::class, 'show']);
Route::post('airplanes', [AirplanesController::class, 'store']);
Route::post('airplanes-update/{id}', [AirplanesController::class, 'update']);
Route::delete('airplanes-delete/{id}', [AirplanesController::class, 'destroy']);

//Airports
Route::get('all', [AirportsController::class, 'index']);
Route::get('airports-show/{id}', [AirportsController::class, 'show']);
Route::post('airports', [AirportsController::class, 'store']);
Route::post('airports-update/{id}', [AirportsController::class, 'update']);
Route::delete('airports-delete/{id}', [AirportsController::class, 'destroy']);


// Below are just notes so that you don't have to  go to the documentation to avoid overwhelming you with too much info.
// They are not to-do's. Just notes.
//Route::patch('update', [MealsController::class, 'update']);
//Route::put('update', [MealsController::class, 'update']);
//Route::delete('delete', [MealsController::class, 'delete']);


// fetch user with id 5
//echo $panikos =User::find(5)->name;
//echo "<br >";

//// create a new user instance and save (persist) it in the DB
//$user = new User();
//$user->age = 30;
//$user->gender = 'female';
//$user->hair_color = 'blonde';
//$user->name = 'Theodora Karaiskaki';
//$user->save();
//
//// create a new user and return the user model instance
//$user = User::create([
//    'age' => 80,
//    'gender' => 'male',
//    'hair_color' => 'brown',
//    'name' => 'Yiannis Kermanos',
//]);
//


// fetch the user with name Paul and email rebeka89@example.com
//echo  User::where('name', '=','Paul')
//    ->where('email', '=', 'rebeka89@example.com')
//    ->get();


//// fetch the first man that is at least 60 and has black or brown hair
//User::query()
//    ->where('age', '>=', 60)
//    ->where('gender', '=', 'male')
//    ->whereIn('hair_color', [
//        'black',
//        'brown',
//    ])
//    ->first();

//// fetch all users
///  and all the meals they coocked.
/// it fetches also and the users who dont have meal (assumes a one-to-many relation exists between User and Account)
/// with uses eager loading!!!!!
//echo User::query()
//    ->with('meals')->get();
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";

//// fetch the first user
///  and all the meals he/she coocked.... if the user hasn't coocked meals, the query will fetch him anyway
//echo User::query()
//    ->with('meals')
//    ->first();
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";

//fetch the first user
// only if he coocked meal/s.... if the user hasn't coocked meals, the query will not fetch him
//echo User::query()
//    ->has('meals')
//    ->first();
//echo "<br >";
//echo "<br >";
//echo "<br >";


//fetch the user with id 3 and all the meals he/she coocked
//echo User::query()
//    ->with('meals')
//    ->find(3);
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";

//// fetch all users who have.meals
/// only the users
//echo User::query()
//    ->has('meals')->get();
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";


//fetch the user with id 3
// only if he coocked meal/s.
//echo User::query()
//    ->has('meals')
//    ->find(3);
//echo "<br >";
//echo "<br >";
//echo "<br >";

//fetch the user with id 3 and his meals
// only if he coocked meal/s.
//echo User::query()
//    ->has('meals')
//    ->with('meals')
//    ->find(3);
//echo "<br >";
//echo "<br >";
//echo "<br >";

// fetch all users who have.meals
//  and also fetch their meals
//echo User::has('meals')->with('meals')->get();
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";


//ok till here

// fetch all users who have.meals
//  and also fetch their meals only if their meals are vegetarian
//echo User::has('meals')
//    ->with([
//        'meals' => function ($q) {
//            $q->where('is_vegetarian', '=', 1);
//        }
//    ])->get();
//

// fetch all users who have.meals
//  and also fetch their meals only if their meals are vegetarian
// and the flight_id is at least 3
//echo User::query()
//    ->has('meals')
//    ->with(
//        ['meals'=>function($q){
//            $q->where('flight_id','>=',3)
//              ->where('is_vegetarian','=',1);
//        }]
//    )->get();


//// fetch all users who have.meals and meals are vegetarian  where the userid number is at least 2
///  and also fetch their meals only if they are not vegetarian
/// sos fetches the used with id==4 because he has vegetarian meals
//echo User::query()
//    ->whereHas('meals', function ($q) {
//        $q->where('is_vegetarian', '=', 1)
//            ->where('chef_user_id', '>=', 2);
//    })
//    ->with([
//        'meals' => function ($q) {
//            $q->where('is_vegetarian', '=', 0);
//        }
//    ])->get();
//
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";
//echo "<br >";

//same as above
//echo User::query()
//    ->whereHas('meals', function ($q) {
//        $q->where('is_vegetarian', '=', 1)
//            ->where('chef_user_id', '>=', 2);
//    })
//    ->with('meals', function ($q){
//        $q->where('is_vegetarian', '=', 0);
//    })->get();

//// fetch all users where the email contains '@' .
//echo User::where('email', 'like', '%@%')->get();
//echo "<br >";
//echo "<br >";
//echo "<br >";
//
////// fetch all users where the name starts with P
//echo User::where('name', 'like', 'P%')->get();
//echo "<br >";
//echo "<br >";
//echo "<br >";
////// fetch all users where the name ends with s
//echo User::where('name', 'like', '%s')->get();
;

//// update is_vegetarian field to true for all meals that have flight id at least 5. In other words, block all accounts from Cyprus

//Meal::query()
//    ->where('flight_id','>=',5)
//    ->update([
//        'is_vegetarian'=>true
//    ]);


//Get a chef with all the meals they coocked
//echo User::query()
//    ->has('meals')
//    ->with('meals')
//    ->find(3);


//Get flights thay don't have meals    ????????????????
//echo Flight::query()
//    ->has('meal')
//    ->with('meal')
//    ->get();
//Get flights that have veggie meals with their meals

//Get all flights that land in an airport

//echo Flight::query()
//    ->whereBelongsTo(Airport::class)
//    ->get();

//echo User::query()
//    ->with('meals')
//    ->first();
