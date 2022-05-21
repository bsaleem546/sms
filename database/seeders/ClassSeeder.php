<?php

namespace Database\Seeders;

use App\Models\_Class;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for ($i=3; $i<=10; $i++){
            _Class::create([
                'section_id' => 1,
                'name' => 'CLASS '.$i
            ]);
            _Class::create([
                'section_id' => 2,
                'name' => 'CLASS '.$i
            ]);
            _Class::create([
                'section_id' => 3,
                'name' => 'CLASS '.$i
            ]);


        }
    }
}
