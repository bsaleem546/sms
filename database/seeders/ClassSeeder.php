<?php

namespace Database\Seeders;

use App\Models\_Class;
use App\Models\Section;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = Section::all();
        foreach ($sections as $section) {
            for ($i = 1; $i <= 3; $i++) {
                _Class::create([
                    'section_id' => $section->id,
                    'name' => 'CLASS ' . $i
                ]);
            }
        }
    }
}
