<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeal;
use App\Http\Requests\UpdateMeal;
use App\Models\Meal;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class MealsController extends Controller
{
    public function store(StoreMeal $request): Response
    {
        Meal::create([
            'chef_user_id' => $request->validated('chef_user_id'),
            'name' => $request->validated('name'),
            'is_vegetarian' => $this->parseToBool($request->validated('is_vegetarian')),
            'flight_id' => $request->validated('flight_id'),
        ]);
        return response('Meal created', 201);
    }

    public function update(UpdateMeal $request, int $id, int $flightId): Response
    {
        try {
            Meal::where('id', '=', $id)
                ->where('flight_id', $flightId)
                ->update($request->input());
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        };


        return response('Meal updated', 204);
    }

    public function index(): Response
    {
        $meals = Meal::all();

        return response('Showing all the meals', 200);
    }

    public function indexVegetarian(int $flight_id): Response
    {
        $meals = $this->getMealsByTypeAndFlightId(true, $flight_id);
        var_dump($meals);

        if (!$meals) {
            return response("There is not such a flight Id", 404);

        }
        return response("Showing all Vegetarian  meals", 200);
    }

    public function indexNonVegetarian(int $flight_id): Response
    {
        $meals = $this->getMealsByTypeAndFlightId(false, $flight_id);

        return response('Showing all non Vegetarian meals', 200);

    }

    private function getMealsByTypeAndFlightId(bool $isVegetarian, int $flightId)
    {
        return Meal::where('flight_id', $flightId)
            ->where('is_vegetarian', $isVegetarian)
            ->get()
            ->toArray();
    }


    public function show($id): Response
    {
        $meal = Meal::find($id);

        return response('Showing Specific Meal', 200);
    }

    public
    function destroy(int $id): Response
    {
        $meal = Meal::find($id);
        $meal->delete();

        return response('Meal deleted', 204);
    }

    private function parseToBool(mixed $input): bool
    {
        return filter_var($input, FILTER_VALIDATE_BOOL);
    }
}
