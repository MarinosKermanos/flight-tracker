<?php

namespace Tests\Feature;

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

    public function test_it_creates_a_meal()
    {
        $user = User::factory()->create();

        $args = [
            'chef_user_id' => $user->id,
            'name' => 'kolokasi',
            'is_vegetarian' => true
        ];

        $response = $this->post('meals', $args);

        $response->assertStatus(201);

        $this->assertDatabaseHas('meals', $args);
    }
}
