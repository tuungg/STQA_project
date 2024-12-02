<?php

namespace Database\Seeders;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = [
                [
                    'flight_code' => 'JT610',
                    'origin' => 'SUB',
                    'destination' => 'CGK',
                    'departure_time' => Carbon::now(),
                    'arrival_time' =>Carbon::tomorrow(),
                ],
                [
                    'flight_code' => 'JT611',
                    'origin' => 'JPN',
                    'destination' => 'NYC',
                    'departure_time' => Carbon::now(),
                    'arrival_time' =>Carbon::tomorrow(),
                ],
                [
                    'flight_code' => 'JT612',
                    'origin' => 'SGP',
                    'destination' => 'MLY',
                    'departure_time' => Carbon::now(),
                    'arrival_time' =>Carbon::tomorrow(),
                ],
                [
                    'flight_code' => 'JT613',
                    'origin' => 'USA',
                    'destination' => 'AUS',
                    'departure_time' => Carbon::now(),
                    'arrival_time' =>Carbon::tomorrow(),
                ],
                [
                    'flight_code' => 'JT614',
                    'origin' => 'KKN',
                    'destination' => 'SSA',
                    'departure_time' => Carbon::now(),
                    'arrival_time' =>Carbon::createFromDate(2024,12,2),
                ],
                // Carbon::create($year, $month, $day, $hour, $minute, $second, $tz)."\n";
        ];

        foreach ($flights as $f){
            Flight::create($f);
        }

    }
}
