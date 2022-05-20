<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function store(Request $request)
    {
        Airport::create([
            'city' => $request->validated('city'),
            'code' => $request->validated('code'),

        ]);
        return response('Airport created', 201);
    }

    public function update(Request $request, int $id)
    {//uopdates  code
        Airport::where('id', '=', $id)
            ->update([
                'code' => $request->input('code'),
            ]);
        return response('Airport updated', 204);
    }

    public function index()
    {
        $airports = Airport::all();

        return response('Showing all the airports', 200);
    }

    public function show($id)
    {
        $airport = Airport::find($id);

        return response('Showing Specific Airport', 200);
    }

    public function destroy(int $id)
    {
        $airport = Airport::find($id);
        $airport->delete();

        return response('Airport deleted', 204);
    }

}
