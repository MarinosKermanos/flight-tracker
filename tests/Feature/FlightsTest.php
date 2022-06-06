<?php

namespace Tests\Feature;

use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FlightsTest extends TestCase
{
    public function test_it_creates_a_flight()

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

        $args = [
            'airplane_id' => $airplane->id,
            'From' => $fromAirport->id,
            'To' => $toAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ];


        $response = $this->post('flights', $args);

        $response->assertStatus(201);

        $this->assertDatabaseHas('flights', $args);
    }

    public function test_it_gets_flights_without_meals()
    {
        $this->withoutExceptionHandling();

        $toAirport = Airport::factory()->create();

        $fromAirport = Airport::factory()->create();

        $airplane = Airplane::factory()->create();

        $flight = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => $toAirport->id,
            'To' => $fromAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);
//        $flightId = $flight->id;
        $response = $this->get("flight-no-meal/$flight->id");
        $response->assertStatus(200);
    }

    public function test_it_gets_all_flights_having_meal_with_their_meal()
    {

        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $toAirport = Airport::factory()->create();

        $fromAirport = Airport::factory()->create();

        $airplane = Airplane::factory()->create();

        $flight1 = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => $toAirport->id,
            'To' => $fromAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);

        $flight2 = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => $toAirport->id,
            'To' => $fromAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);

        $flight3 = Flight::create([

            'airplane_id' => $airplane->id,
            'From' => $toAirport->id,
            'To' => $fromAirport->id,
            'departure' => now(),
            'arrival' => now(),
            'expected_duration' => 10,
            'actual_duration' => 11,
        ]);


        DB::table('meals')->insert([
            [
                'chef_user_id' => $user->id,
                'name' => 'patates',
                'is_vegetarian' => true,
                'flight_id' => $flight1->id,
            ],
            [
                'chef_user_id' => $user->id,
                'name' => 'kremmidia',
                'is_vegetarian' => true,
                'flight_id' => $flight2->id,
            ]
        ]);

        $response = $this->get("flights-with-meal");
        $response->assertStatus(200);

    }

//    public function test_if_flight_has_a_drink(){
//
//        $this->withoutExceptionHandling();
//
//        $toAirport = Airport::factory()->create();
//
//        $fromAirport = Airport::factory()->create();
//
//        $airplane = Airplane::factory()->create();
//
//        $flight = Flight::create([
//
//            'airplane_id' => $airplane->id,
//            'From' => $toAirport->id,
//            'To' => $fromAirport->id,
//            'departure' => now(),
//            'arrival' => now(),
//            'expected_duration' => 10,
//            'actual_duration' => 11,
//
//        ]);
//    }
}
