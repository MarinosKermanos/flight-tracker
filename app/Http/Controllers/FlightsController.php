<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function store(Request $request)
    {
        Flight::create([
            'chef_user_id' => $request->validated('chef_user_id'),
            'name' => $request->validated('name'),
            'is_vegetarian' => $this->parseToBool($request->validated('is_vegetarian')),


            'airplane_id' => $request->validated('airplane_id'),
            'From' => $request->validated('From'),
            'To' => $request->validated('To'),
            'departure' => $request->validated('departure'),
            'arrival' => $request->validated('arrival'),
            'expected_duration' => $request->validated('expected_duration'),
            'actual_duration' => $request->validated('actual_duration'),
        ]);

        return response('Meal created', 201);
    }

    public function update(Request $request, int $id)
    {// create a form request UpdateMeal
        //ta data tha einai required sometimes mesa sto rule method
        //an to meal_id pou stelnw iparxi pragmati sto db mas, after validation method documetation

        Flight::where('id', '=', $id)
            ->update([
                'airplane_id' => $request->input('airplane_id'),
//                'From' => $request->input('From'),
//                'To' => $request->input('To'),
//                'departure' => $request->input('departure'),
//                'arrival' => $request->input('arrival'),
//                'expected_duration' => $request->input('expected_duration'),
//                'actual_duration' => $request->input('actual_duration'),
            ]);
        return response('Meal updated', 204);
    }

    public function index()
    {
        $meals = Flight::all();

        return response('Showing all the meals', 200);
    }

    public function show($id)
    {
        $meal = Flight::find($id);

        return response('Showing Specific Meal', 200);
    }

    public function destroy(int $id)
    {
        $meal = Flight::find($id);
        $meal->delete();

        return response('Meal deleted', 204);
    }




}
