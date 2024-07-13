<?php

namespace Database\Seeders;

use App\Models\Aircraft;
use App\Models\Airport;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AirportSeeder::class,
            AirlineSeeder::class,
            AircraftSeeder::class,
            FlightSeeder::class,
        ]);

        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'airline_id' => 1,
        ]);
    }
}
