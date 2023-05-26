<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('__sessions')->insert([
            'start_date' => '2023-05-26',
            'end_date' => '2024-05-26',
            'status' => 1
        ]);
    }
}
