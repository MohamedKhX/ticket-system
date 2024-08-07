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
        Airline::factory()->create([
            'name' => 'الخطوط الجوية الليبية',
            'description' => ' الخطوط الجوية الليبية هي الناقل الجوي الوطني في ليبيا، يقع مقرها في العاصمة طرابلس، بمطار معيتيقة الدولي وهي مملوكة بالكامل للحكومة الليبية. ',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAapWkiG_0LQj-vbfgiWfk7lUY5pY6AcBQsQ&s'
        ]);

        Airline::factory()->create([
            'name' => 'الخطوط الجوية الإفريقية',
            'description' => "الخطوط الجوية الأفريقية (بالإنجليزية: Afriqiyah Airways)‏ هي شركة طيران ليبية مقرها طرابلس، تتخذ الشركة من مطار معيتيقة الدولي مقرا رئيسيا لها. كما تنطلق رحلاتها أيضاً من مطارات مصراتة وبنغازي. وتعمل الشركة على تسير رحلات داخلية في ليبيا ورحلات دولية لتونس، تركيا، مصر، الأردن، السودان، النيجر. ",
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhwNbOa4aZ_DKxGxcLc18S6xIWbesyUNtg5w&s'
        ]);

        Airline::factory()->create([
            'name' => 'برنيق للطيران',
            'description' => "برنيق للطيران هي شركة طيران ليبية، وتتخذ من مطار بنينا الدولي في بنغازي مقراً لعملياتها.",
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4Znwwj9n_qEV_PO3mOiZEhpy0gPSYwS4jBA&s'
        ]);

        Airline::factory()->create([
            'name' => 'غدامس للنقل الجوي',
            'description' => "طيران غدامس هي شركة طيران ليبية مملوكة للقطاع الخاص. تأسست في 2004. تتخذ من طرابلس مقرا لها. تسير رحلات مجدولة داخل ليبيا وأوروبا وشمال أفريقيا والشرق الأوسط. ",
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhKh-YdZ8ljO6G-cyM7gKnantcpnx2YGPmvg&s'
        ]);

        Airline::factory()->create([
            'name' => 'الكفرة للطيران',
            'description' => "الكفرة للطيران هي أحد شركات الطيران العاملة في ليبيا في مجال التدريب علي الطيران والنقل الخفيف للبضائع، حيث قامت بافتتاح مركز لتدريب الطلبة علي قيادة الطائرات. وتمتلك هذه الشركة طائرتان من نوع CESSNA 172R وطائرة JETSTREAM 3200 التي تستخدم للنقل الخفيف ورجال الأعمال. ",
            'logo' => "https://upload.wikimedia.org/wikipedia/commons/1/16/Air_Kufra_Logo.png"
        ]);
    }
}
