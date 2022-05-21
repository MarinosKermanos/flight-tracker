<?php

namespace Database\Seeders;

use App\Models\Airplane;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {   //5 users
        $user1 = User::factory()->create([
            'name' => 'John'
        ]);
        $user2 = User::factory()->create([
            'name' => 'George'
        ]);
        $user3 = User::factory()->create([
            'name' => 'Kostas'
        ]);
        $user4 = User::factory()->create([
            'name' => 'Mike'
        ]);
        $user5 = User::factory()->create([
            'name' => 'Paul'
        ]);

        //4airplanes
        $airplane1 = Airplane::factory()->create([
            'model' => 'A320'
        ]);
        $airplane2 = Airplane::factory()->create([
            'model' => 'A332'
        ]);
        $airplane3 = Airplane::factory()->create([
            'model' => 'B747'
        ]);
        $airplane4 = Airplane::factory()->create([
            'model' => 'B737'
        ]);

        //6 Airports
        $airport1 = Airport::factory()->create([
            'city' => 'Larnaka'
        ]);
        $airport2 = Airport::factory()->create([
            'city' => 'Athens'
        ]);
        $airport3 = Airport::factory()->create([
            'city' => 'Thessaloniki'
        ]);
        $airport4 = Airport::factory()->create([
            'city' => 'New York'
        ]);
        $airport5 = Airport::factory()->create([
            'city' => 'Berlin'
        ]);
        $airport6 = Airport::factory()->create([
            'city' => 'London'
        ]);

        //10 flights
        $flight1 = Flight::factory()->create([
            'airplane_id' => $airplane1->id,
            'From' => $airport4->id,
            'To' => $airplane2->id,
        ]);
        $flight2 = Flight::factory()->create([
            'airplane_id' => $airplane2->id,
            'From' => $airport2->id,
            'To' => $airplane1->id,
        ]);
        $flight3 = Flight::factory()->create([
            'airplane_id' => $airplane4->id,
            'From' => $airport6->id,
            'To' => $airport5->id,
        ]);
        $flight4 = Flight::factory()->create([
            'airplane_id' => $airplane2->id,
            'From' => $airport6->id,
            'To' => $airport4->id,
        ]);
        $flight5 = Flight::factory()->create([
            'airplane_id' => $airplane3->id,
            'From' => $airport3->id,
            'To' => $airport4->id,
        ]);
        $flight6 = Flight::factory()->create([
            'airplane_id' => $airplane1->id,
            'From' => $airport1->id,
            'To' => $airport6->id,
        ]);
        $flight7 = Flight::factory()->create([
            'airplane_id' => $airplane2->id,
            'From' => $airport5->id,
            'To' => $airport6->id,
        ]);
        $flight8 = Flight::factory()->create([
            'airplane_id' => $airplane4->id,
            'From' => $airport1->id,
            'To' => $airport2->id,
        ]);
        $flight9 = Flight::factory()->create([
            'airplane_id' => $airplane2->id,
            'From' => $airport6->id,
            'To' => $airport5->id,
        ]);
        $flight10 = Flight::factory()->create([
            'airplane_id' => $airplane4->id,
            'From' => $airport6->id,
            'To' => $airport3->id,
        ]);

        //12 meals

        $meal1 = Meal::factory()->create([
            'chef_user_id' => $user5->id,
            'flight_id' => $flight1->id,
        ]);
        $meal2 = Meal::factory()->create([
            'chef_user_id' => $user4->id,
            'flight_id' => $flight2->id,
        ]);
        $meal3 = Meal::factory()->create([
            'chef_user_id' => $user3->id,
            'flight_id' => $flight3->id,
        ]);
        $meal4 = Meal::factory()->create([
            'chef_user_id' => $user2->id,
            'flight_id' => $flight4->id,
        ]);
        $meal5 = Meal::factory()->create([
            'chef_user_id' => $user1->id,
            'flight_id' => $flight5->id,
        ]);
        $meal6 = Meal::factory()->create([
            'chef_user_id' => $user5->id,
            'flight_id' => $flight6->id,
        ]);
        $meal7 = Meal::factory()->create([
            'chef_user_id' => $user4->id,
            'flight_id' => $flight7->id,
        ]);
        $meal8 = Meal::factory()->create([
            'chef_user_id' => $user3->id,
            'flight_id' => $flight8->id,
        ]);
        $meal9 = Meal::factory()->create([
            'chef_user_id' => $user2->id,
            'flight_id' => $flight9->id,
        ]);
        $meal10 = Meal::factory()->create([
            'chef_user_id' => $user5->id,
            'flight_id' => $flight10->id,
        ]);
        $meal11 = Meal::factory()->create([
            'chef_user_id' => $user2->id,
            'flight_id' => $flight10->id,
        ]);
        $meal12 = Meal::factory()->create([
            'chef_user_id' => $user5->id,
            'flight_id' => $flight9->id,
        ]);

    }
}
