<?php

namespace Tests\Feature;

use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MealsTest extends TestCase
{
    use DatabaseMigrations;

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

    public function test_it_creates_a_meal()

    {
        $user = User::factory()->create();

        $airplane = Airplane::create([
            'model' => 'a320',
            'maker' => 'airbus',
        ]);

        $fromAirport = Airport::create([
            'city' => 'sotira',
            'code' => 'sotira',

        ]);

        $toAirport = Airport::create([
            'city' => 'liopetri',
            'code' => 'liopetri',

        ]);

        $flight = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => $fromAirport->id,
            'To' => $toAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);

        $args = [
            'chef_user_id' => $user->id,
            'name' => 'kolokasiii',
            'is_vegetarian' => true,
            'flight_id' => $flight->id,
        ];

        $response = $this->post('meals', $args);

        $response->assertStatus(201);

        $this->assertDatabaseHas('meals', $args);


    }


    public function test_it_updates_a_meal()
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
            'name' => 'pattixa',
            'is_vegetarian' => true,
            'flight_id' => $flight->id,
        ]);

        $dataToUpdate = ['is_vegetarian' => false];

        $response = $this->post("meals-update/$meal->id", $dataToUpdate);

        $response->assertStatus(204);

        $this->assertDatabaseHas('meals', [
            'id' => $meal->id,
            'is_vegetarian' => false,
        ]);

    }

    public function test_get_all_vegetarian_meals()
    {
        $user = User::factory()->create();

        $fromAirport = Airport::create([
            'city' => 'sotira',
            'code' => 'sotira',
        ]);

        $toAirport = Airport::create([
            'city' => 'liopetri',
            'code' => 'liopetri',
        ]);

        $airplane = Airplane::create([
            'model' => 'a320',
            'maker' => 'airbus',
        ]);

        $flight = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => $fromAirport->id,
            'To' => $toAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);

//        $steak = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'steak',
//            'is_vegetarian' => false,
//            'flight_id' => $flight->id,
//        ]);

//        $glitzia = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'glitzia',
//            'is_vegetarian' => false,
//            'flight_id' => $flight->id,
//        ]);

//        $poulles = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'poulles',
//            'is_vegetarian' => true,
//            'flight_id' => $flight->id,
//        ]);
//
//
//        $aggourka = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'aggourka',
//            'is_vegetarian' => true,
//            'flight_id' => $flight->id,
//        ]);

        DB::table('meals')->insert([
            [
                'chef_user_id' => $user->id,
                'name' => 'poulles',
                'is_vegetarian' => true,
                'flight_id' => $flight->id,
            ],
            [
                'chef_user_id' => $user->id,
                'name' => 'aggourka',
                'is_vegetarian' => true,
                'flight_id' => $flight->id,
            ],
            [
                'chef_user_id' => $user->id,
                'name' => 'steak',
                'is_vegetarian' => false,
                'flight_id' => $flight->id,
            ],
            [
                'chef_user_id' => $user->id,
                'name' => 'glitzia',
                'is_vegetarian' => false,
                'flight_id' => $flight->id,
            ]
        ]);

        $vegetarian = true;
        $response = $this->get("all-veg/$vegetarian");
        $response->assertStatus(200);
//        $response->assertJson(function ($json){
//            return $json->count($json);
//        });


    }

//    public function test_get_all_non_vegetarian_meals()
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
//            'name' => 'steak',
//            'is_vegetarian' => false,
//            'flight_id' => $flight->id,
//        ]);
//
//        $meal = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'glitzia',
//            'is_vegetarian' => false,
//            'flight_id' => $flight->id,
//        ]);
//
//        $meal = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'poulles',
//            'is_vegetarian' => true,
//            'flight_id' => $flight->id,
//        ]);
//
//
//        $meal = Meal::create([
//            'chef_user_id' => $user->id,
//            'name' => 'aggourka',
//            'is_vegetarian' => true,
//            'flight_id' => $flight->id,
//        ]);
//
//        $vegetarian = false;
//        $response = $this->get("all-veg/$vegetarian"); // giati den trexei otan $vegetarian=gfalse????
//        $response->assertStatus(200);// erxetai kat efteian stin line 241
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
            'name' => 'marmellada',
            'is_vegetarian' => true,
            'flight_id' => $flight->id,
        ]);


        $response = $this->post("meals-delete/$meal->id");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('meals', [
            'id' => $meal->id,
        ]);

    }
}
