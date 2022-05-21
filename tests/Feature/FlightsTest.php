<?php

namespace Tests\Feature;

use App\Models\Airplane;
use App\Models\Airport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
