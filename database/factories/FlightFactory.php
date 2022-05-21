<?php

namespace Database\Factories;

use App\Models\Airplane;
use App\Models\Airport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'airplane_id' => Airplane::factory(),
            'From' => Airport::factory(),
            'To' => Airport::factory(),
            'departure' => $this->faker->dateTime,
            'arrival' => $this->faker->dateTime,
            'expected_duration' => $this->faker->time,
            'actual_duration' => $this->faker->time,
        ];
    }
}
