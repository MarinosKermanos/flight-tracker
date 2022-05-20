<?php

namespace Tests\Feature;

use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MealsTest extends TestCase
{
    public function test_it_does_not_create_a_meal_if_name_is_less_than_5_chars()
    {
        $user = User::factory()->create();

        $args = [
            'chef_user_id' => $user->id,
            'name' => 'kolo',
            'is_vegetarian' => true,
        ];

        $response = $this->post('meals', $args);

        $response->assertStatus(302);

        $response->assertSessionHasErrors('name');

        $this->assertDatabaseMissing('meals', $args);
    }

//    public function test_it_creates_a_meal()
//    {
//        $user = User::factory()->create();
//
//        $airplane = Airplane::create([
//            'model' => 'a320',
//            'maker' => 'airbus',
//        ]);
//
//        $airport = Airport::create([
//            'city' => 'sotira',
//            'code' => 'sotira',
//
//        ]);
//
//        $flight = Flight::create([
//
//            'airplane_id' => $airplane->id,
//            'From' => 1,
//            'To' => 2,
//            'departure' => now(),
//            'arrival' => now(),
//            'expected_duration' => 10,
//            'actual_duration' => 11,
//        ]);
//
//        $args = [
//            'chef_user_id' => $user->id,
//            'name' => 'kolokasiii',
//            'is_vegetarian' => true,
//            'flight_id' => $flight->id,
//        ];
//
//        $response = $this->post('meals', $args);
//
//        $response->assertStatus(201);
//
//        $this->assertDatabaseHas('meals', $args);
//    }
//

//    public function test_it_updates_a_meal()
//    {
//        $user = User::factory()->create();
//
//        $airport = Airport::create([
//            'city' => 'sotira',
//            'code' => 'sotira',
//
//        ]);
//
//        $airplane = Airplane::create([
//            'model' => 'a320',
//            'maker' => 'airbus',
//        ]);
//
//        $flight = Flight::create([
//
//            'airplane_id' => $airplane->id,
//            'From' => 1,
//            'To' => 2,
//            'departure' => now(),
//            'arrival' => now(),
//            'expected_duration' => 10,
//            'actual_duration' => 11,
//        ]);
//
//        $meal = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => $user->name,
//            'is_vegetarian' => true,
//            'flight_id' => $flight->id,
//        ]);
//
//        $dataToUpdate = ['is_vegetarian' => false];
//
//        $response = $this->post("meals/$meal->id", $dataToUpdate);
//
//        $response->assertStatus(204);
//
//        $this->assertDatabaseHas('meals', [
//            'id' => $meal->id,
//            'is_vegetarian' => false,
//        ]);
//
//    }

    public function test_it_deletes_a_meal()
    {
        $user = User::factory()->create();

        $airport = Airport::create([
            'city' => 'sotira',
            'code' => 'sotira',

        ]);

        $airplane = Airplane::create([
            'model' => 'a320',
            'maker' => 'airbus',
        ]);

        $flight = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => 1,
            'To' => 2,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);

        $meal = Meal::create([
            'chef_user_id' => $user->id,
            'name' => $user->name,
            'is_vegetarian' => true,
            'flight_id' => $flight->id,
        ]);


        $response = $this->post("meals-delete/$meal->id");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('meals', [
            'id' => $user->id,
        ]);

    }
}
