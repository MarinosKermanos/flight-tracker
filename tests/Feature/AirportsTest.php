<?php

namespace Tests\Feature;

use App\Models\Airplane;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AirportsTest extends TestCase
{
    public function test_it_creates_an_airport()

    {
        $user = User::factory()->create();

        $airplane = Airplane::create([
            'model' => 'a320',
            'maker' => 'airbus',
        ]);

        $args = [
            'city' => 'sotira',
            'code' => 'sotira',
        ];

        $response = $this->post('airports', $args);

        $response->assertStatus(201);

        $this->assertDatabaseHas('airports', $args);


    }

}
