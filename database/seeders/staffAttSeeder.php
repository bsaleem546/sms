<?php

namespace Database\Seeders;

use App\Models\StaffAttendence;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class staffAttSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indexedArray  = array('absent', 'present', 'leave', 'late');
        for ($i = 0; $i <= 29; $i++) {
            $add_at = Carbon::parse('2022-05-01')->addDays($i)->format('Y-m-d');
            StaffAttendence::create([
                "staff_id" => 2,
                "time_in" => '19:00:00',
                "time_out" => '06:01:00',
                "add_at" => $add_at,
                "status" => $indexedArray[array_rand($indexedArray)],
                'month_off' => Carbon::parse( $add_at )->format('M-Y')
            ]);
            StaffAttendence::create([
                "staff_id" => 3,
                "time_in" => '19:00:00',
                "time_out" => '06:01:00',
                "add_at" => $add_at,
                "status" => $indexedArray[array_rand($indexedArray)],
                'month_off' => Carbon::parse( $add_at )->format('M-Y')
            ]);
        }

    }
}
