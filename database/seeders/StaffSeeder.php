<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $roles = [1, 2, 3];
        $departments = [1, 2, 3];

        for ($i = 0; $i < 100; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('staff123')
            ]);
            $user->assignRole($faker->randomElement($roles));
            $user->departments()->sync($faker->randomElements($departments, $faker->numberBetween(1, 3)));
            $staff = new Staff();
            $staff->name = $user->name;
            $staff->gender = $faker->randomElement(['Male', 'Female']);
            $staff->dob = $faker->date();
            $staff->address = $faker->address;
            $staff->phone = $faker->phoneNumber;
            $staff->email = $user->email;
            $staff->joining_date = $faker->date();
            $staff->salary = $faker->numberBetween(1000, 5000);
            $staff->is_bus_incharge = $faker->boolean;
            $staff->transport_id = $faker->numberBetween(1, 10);
            $staff->user_id = $user->id;
            $staff->added_by = 1;
            $staff->save();
        }
    }
}
