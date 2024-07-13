<?php

namespace Database\Seeders;

use App\Models\Aircraft;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AircraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aircrafts = [
            ['name' => 'Airbus A320', 'economy_seats' => 160, 'business_seats' => 12, 'first_class_seats' => 8, 'airline_id' => 1],
            ['name' => 'Boeing 737', 'economy_seats' => 150, 'business_seats' => 10, 'first_class_seats' => 6, 'airline_id' => 1],
            ['name' => 'Airbus A380', 'economy_seats' => 400, 'business_seats' => 60, 'first_class_seats' => 14, 'airline_id' => 1],
            ['name' => 'Boeing 747', 'economy_seats' => 410, 'business_seats' => 45, 'first_class_seats' => 14, 'airline_id' => 1],
            ['name' => 'Airbus A350', 'economy_seats' => 315, 'business_seats' => 45, 'first_class_seats' => 16, 'airline_id' => 1],
            ['name' => 'Boeing 777', 'economy_seats' => 375, 'business_seats' => 50, 'first_class_seats' => 14, 'airline_id' => 1],
            ['name' => 'Airbus A330', 'economy_seats' => 277, 'business_seats' => 42, 'first_class_seats' => 8, 'airline_id' => 1],
            ['name' => 'Boeing 787', 'economy_seats' => 242, 'business_seats' => 39, 'first_class_seats' => 8, 'airline_id' => 1],
            ['name' => 'Airbus A220', 'economy_seats' => 135, 'business_seats' => 12, 'first_class_seats' => 8, 'airline_id' => 1],
            ['name' => 'Boeing 737 MAX', 'economy_seats' => 200, 'business_seats' => 16, 'first_class_seats' => 8, 'airline_id' => 1],
        ];

        foreach ($aircrafts as $aircraft) {
            Aircraft::factory()->create($aircraft);
        }
    }
}
