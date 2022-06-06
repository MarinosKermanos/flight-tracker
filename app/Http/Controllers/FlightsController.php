<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlight;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FlightsController extends Controller
{
    public function store(StoreFlight $request)
    {
        Flight::create([
            'airplane_id' => $request->validated('airplane_id'),
            'From' => $request->validated('From'),
            'To' => $request->validated('To'),
            'departure' => $request->validated('departure'),
            'arrival' => $request->validated('arrival'),
            'expected_duration' => $request->validated('expected_duration'),
            'actual_duration' => $request->validated('actual_duration'),
        ]);

        return response('Flight created', 201);
    }

    public function update(Request $request, int $id): Response
    {
        Flight::where('id', '=', $id)
            ->update([
                'arrival' => $request->input('arrival'),
            ]);
        return response('Flight updated', 204);
    }

    public function index(): Response
    {
        $flights = Flight::all();

        return response('Showing all the flights', 200);
    }

    public function show($id): Response
    {
        $flight = Flight::find($id);

        return response('Showing Specific Flight', 200);
    }

    public function destroy(int $id): Response
    {
        $flight = Flight::find($id);
        $flight->delete();

        return response('Flight deleted', 204);
    }

    public function flightWithNoMeal(): Response
    {
        Flight::query()
            ->doesntHave('meal')
            ->get()
            ->toArray();

        return response('Showing all the flights without meals', 200);
    }

    public function getAllFlightsHavingMealAndGetThereMealToo(){

        $flights= Flight::query()
            ->has('meal')
            ->with('meal')
            ->get()
            ->toArray();

        var_dump($flights);

        return response("Showing all flights offering a meal, and their meal's name ", 200);





    }
}
