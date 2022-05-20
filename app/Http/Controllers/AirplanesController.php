<?php

namespace App\Http\Controllers;
use App\Models\Airplane;
use Illuminate\Http\Request;
class AirplanesController extends Controller
{
    public function store(Request $request)
    {
        Airplane::create([
            'model' => $request->validated('model'),
            'maker' => $request->validated('maker'),

        ]);
        return response('Airplane created', 201);
    }

    public function update(Request $request, int $id)
    {// Updates maker
        Airplane::where('id', '=', $id)
            ->update([
                'maker' => $request->input('maker'),
            ]);
        return response('Airplane updated', 204);
    }

    public function index()
    {
        $airplanes = Airplane::all();

        return response('Showing all the Airplanes', 200);
    }

    public function show($id)
    {
        $airplane = Airplane::find($id);

        return response('Showing Specific Airplane', 200);
    }

    public function destroy(int $id)
    {
        $airplane = Airplane::find($id);
        $airplane->delete();

        return response('Airplane deleted', 204);
    }

}
