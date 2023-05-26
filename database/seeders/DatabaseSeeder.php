<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SessionSeeder::class);

        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);

        $this->call(DepartmentSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(RegistrationSeeder::class);

        $this->call(TransportSeeder::class);
        $this->call(TransportRouteSeeder::class);

        $this->call(StaffSeeder::class);

        //         $this->call(staffAttSeeder::class);
        // //         \App\Models\User::factory(10)->create();
        //         $this->call(StudentSeeder::class);
    }
}
