<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeal;
use App\Models\Meal;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class MealsController extends Controller
{
    public function store(StoreMeal $request)
    {
        Meal::create([
            'chef_user_id' => $request->validated('chef_user_id'),
            'name' => $request->validated('name'),
            'is_vegetarian' => $this->parseToBool($request->validated('is_vegetarian')),
            'flight_id' => $request->validated('flight_id'),
        ]);
        return response('Meal created', 201);
    }

    public function update(Request $request, int $id)
    {// create a form request UpdateMeal
        //ta data tha einai required sometimes mesa sto rule method
        //an to meal_id pou stelnw iparxi pragmati sto db mas, after validation method documetation
        Meal::where('id', '=', $id)
            ->update([
//            'chef_user_id' => $request->validated('chef_user_id'),
//            'name' => $request->validated('name'),
                'is_vegetarian' => $request->input('is_vegetarian'),
            ]);
        return response('Meal updated', 204);
    }

    public function index()
    {
        $meals = Meal::all();

        return response('Showing all the meals', 200);
    }

    public function indexVegetarian(bool $vegetarian)
    {
        $meals = Meal::where('is_vegetarian', '=', $vegetarian);

        $food='Vegetarian';
        if($vegetarian==false){
            $food='Non Vegetarian';
        }

        return response("Showing all the $food meals", 200);

    }

//    public function indexNonVegetarian(bool $vegetarian)
//    {
//        $meals = Meal::where('is_vegetarian', '=', $vegetarian);
//
//        return response('Showing all the Non Vegetarian meals', 200);
//
//    }




    public function show($id)
    {
        $meal = Meal::find($id);

        return response('Showing Specific Meal', 200);
    }

    public function destroy(int $id)
    {
        $meal = Meal::find($id);
        $meal->delete();

        return response('Meal deleted', 204);
    }

    private function parseToBool(mixed $input)
    {
        return filter_var($input, FILTER_VALIDATE_BOOL);
    }
}
