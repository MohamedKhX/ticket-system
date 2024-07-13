<?php

namespace Database\Seeders;

use App\Models\Airline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Airline::factory()->create(['name' => 'الخطوط الجوية الليبية']);
        Airline::factory()->create(['name' => 'الخطوط الجوية الإفريقية']);
        Airline::factory()->create(['name' => 'برنيق للطيران']);
        Airline::factory()->create(['name' => 'غدامس للنقل الجوي']);
        Airline::factory()->create(['name' => 'الكفرة للطيران']);
    }
}
