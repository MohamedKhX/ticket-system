<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Airport::factory()->create([
            'name' => 'مطار معيتيقة الدولي',
            'city' => 'طرابلس',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار الأبرق الدولي',
            'city' => 'البيضاء',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار بنينا الدولي',
            'city' => 'طرابلس',
            'country' => 'بنغازي',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار الكفرة',
            'city' => 'الكفرة',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار غات',
            'city' => 'غات',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار سبها الدولي',
            'city' => 'سبها',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار أوباري',
            'city' => 'أوباري',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار أجدابيا',
            'city' => 'أجدابيا',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار مرسى البريقة',
            'city' => 'مرسى البريقة',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار مرتوبة',
            'city' => 'درنة',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار غدامس',
            'city' => 'غدامس',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'قاعدة الجفرة الجوية',
            'city' => 'هون',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار مصراتة المدني',
            'city' => 'مصراتة',
            'country' => 'ليبيا',
        ]);

        //

        Airport::factory()->create([
            'name' => 'مطار رأس لانوف',
            'city' => 'راس لانوف',
            'country' => 'ليبيا',
        ]);
    }
}
