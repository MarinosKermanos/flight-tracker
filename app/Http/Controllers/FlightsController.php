<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function store(Request $request)
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

    public function update(Request $request, int $id)
    {// updates arrival
        Flight::where('id', '=', $id)
            ->update([
                'arrival' => $request->input('arrival'),

            ]);
        return response('Flight updated', 204);
    }

    public function index()
    {
        $flights = Flight::all();

        return response('Showing all the flights', 200);
    }

    public function show($id)
    {
        $flight = Flight::find($id);

        return response('Showing Specific Flight', 200);
    }

    public function destroy(int $id)
    {
        $flight = Flight::find($id);
        $flight->delete();

        return response('Flight deleted', 204);
    }
}
