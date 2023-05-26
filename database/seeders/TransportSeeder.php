<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Transport::create([
                'vehicle_number' => 'VH-' . $faker->numberBetween(1000, 5000),
                'vehicle_model' => $faker->randomElement(['Honda', 'Toyota', 'Suzuki']),
                'driver_name' => $faker->name,
                'driver_phone' => $faker->phoneNumber,
                'note' => $faker->text,
            ]);
        }
    }
}
