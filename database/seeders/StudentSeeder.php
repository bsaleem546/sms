<?php

namespace Database\Seeders;

use App\Models\_Class;
use App\Models\Admission;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $gender = ['male', 'female'];

        $classes = _Class::pluck('id')->toArray();

        for ($i=0; $i<=200; $i++){
            $admission = Admission::create([
                "student_name" => $faker->name,
                "gender" => $gender[array_rand($gender)],
                "dob" => '2004-09-01',
                "religion" => 'Islam',
                "cast" => 'abc',
                "blood_group" => 'A+',
                "address" => 'address 2554',
                "state" => 'sindh',
                "city" => 'Karachi',
                "country" => 'Pakistan',
                "phone" => '03125748961',
                "email" => $faker->unique()->safeEmail,
                "extra_note" => 'nothing',
                "gr_no" => 'GR-00'.$i,
                "father_name" => $faker->name,
                "father_phone" => '011454686754',
                "father_occ" => 'nothing',
                "mother_name" => $faker->name,
                "mother_phone" => '0121546746465',
                "mother_occ" => 'nothing',
                "student_pic" => 'non',
                "is_trans" => 0,
                "transport_id" => 0,
                "__class_id" => $classes[array_rand($classes)],
                "__session_id" => 1,
                "user_id" => 1,
                "status" => 'admitted'
            ]);

            Student::create([
                'admission_id' => $admission->id,
                '__class_id' => $admission->__class_id,
                '__session_id' => 1,
                'roll_no' => '00'.$i,
                'name' => $admission->student_name,
            ]);
        }
    }
}
