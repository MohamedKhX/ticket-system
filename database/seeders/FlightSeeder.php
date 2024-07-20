<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $flights = [
            [
               'aircraft_id' => 1,
               'airline_id' => 1,
               'departure_airport_id' => 1,
               'arrival_airport_id' => 2,
               'departure_time' => now(),
               'arrival_time' => now()->addHours(2),
               'economy_price' => 100.00,
               'business_price' => 200.00,
            ],
            [
                'aircraft_id' => 2,
                'airline_id' => 1,
                'departure_airport_id' => 3,
                'arrival_airport_id' => 4,
                'departure_time' => now()->addDays(2),
                'arrival_time' => now()->addDays(2)->addHours(3),
                'economy_price' => 130.00,
                'business_price' => 230.00,
            ],
            [
                'aircraft_id' => 3,
                'airline_id' => 1,
                'departure_airport_id' => 4,
                'arrival_airport_id' => 5,
                'departure_time' => now()->addDays(3),
                'arrival_time' => now()->addDays(3)->addHours(4),
                'economy_price' => 140.00,
                'business_price' => 240.00,
            ],
            [
                'aircraft_id' => 4,
                'airline_id' => 1,
                'departure_airport_id' => 5,
                'arrival_airport_id' => 6,
                'departure_time' => now()->addDays(4),
                'arrival_time' => now()->addDays(4)->addHours(3),
                'economy_price' => 150.00,
                'business_price' => 250.00,
            ],
            [
                'aircraft_id' => 5,
                'airline_id' => 1,
                'departure_airport_id' => 6,
                'arrival_airport_id' => 7,
                'departure_time' => now()->addDays(5),
                'arrival_time' => now()->addDays(5)->addHours(4),
                'economy_price' => 160.00,
                'business_price' => 260.00,
            ],
        ];

        foreach ($flights as $flight) {
            Flight::factory()->create($flight);
        }
    }
}
