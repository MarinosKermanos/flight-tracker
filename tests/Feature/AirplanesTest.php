<?php

namespace Tests\Feature;

use App\Models\User;


use App\Models\Airplane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AirplanesTest extends TestCase
{
    public function test_it_creates_an_airplane()
    {

        $user = \App\Models\User::factory()->create();

        $args = [
            "model" => 'b747',
            "maker" => 'boeing',
        ];

        $response = $this->post('airplanes', $args);
        $response->assertStatus(201);
        $this->assertDatabaseHas('airplanes', $args);

    }
}
