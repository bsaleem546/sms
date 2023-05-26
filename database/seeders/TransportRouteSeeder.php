<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Transport;
use App\Models\TransportRoute;

class TransportRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $transports = Transport::all();
        for ($i = 0; $i < 10; $i++) {
            $routes = TransportRoute::create(['name' => $faker->name]);
            $randomTransports = $faker->randomElements($transports->pluck('id')->toArray(), $faker->numberBetween(1, 10));
            $routes->routes_transport()->sync($randomTransports);
        }
    }
}
