<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Teacher'],
            ['name' => 'Manager'],
            ['name' => 'Principle'],
            ['name' => 'IT'],
            ['name' => 'Lower Staff']];
        \DB::table('departments')->insert($departments);
    }
}
