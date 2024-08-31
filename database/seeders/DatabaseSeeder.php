<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Aircraft;
use App\Models\Airport;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

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

        $adminUser = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'type' => UserType::Admin->value
        ]);

        $user1 = User::factory()->create([
            'email' => 'libyanairlines@aero.ly',
            'password' => bcrypt('password'),
            'airline_id' => 1,
            'type' => UserType::Employee->value
        ]);



        $user2 = User::factory()->create([
            'email' => 'afriqiyah@aero.ly',
            'password' => bcrypt('password'),
            'airline_id' => 2,
            'type' => UserType::Employee->value
        ]);



        $user3 = User::factory()->create([
            'email' => 'berniq@aero.ly',
            'password' => bcrypt('password'),
            'airline_id' => 3,
            'type' => UserType::Employee->value
        ]);



        $user4 = User::factory()->create([
            'email' => 'Ghadames@aero.ly',
            'password' => bcrypt('password'),
            'airline_id' => 4,
            'type' => UserType::Employee->value
        ]);



        $user5 = User::factory()->create([
            'email' => 'AirKufra@aero.ly',
            'password' => bcrypt('password'),
            'airline_id' => 5,
            'type' => UserType::Employee->value
        ]);

    }
}
