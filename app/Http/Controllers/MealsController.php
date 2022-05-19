<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeal;
use App\Models\Meal;

class MealsController extends Controller
{
    public function store(StoreMeal $request)
    {
        Meal::create([
            'chef_user_id' => $request->validated('chef_user_id'),
            'name' => $request->validated('name'),
            'is_vegetarian' => $request->validated('is_vegetarian'),
        ]);

        return response('Meal created', 201);
    }
}
