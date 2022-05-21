<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class   DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
//        $this->call(staffAttSeeder::class);
//         \App\Models\User::factory(10)->create();
//        $this->call(ClassSeeder::class);
//        $this->call(StudentSeeder::class);
//        $this->call(SubjectSeeder::class);
    }
}
