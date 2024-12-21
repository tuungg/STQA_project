<?php

namespace Database\Seeders;

use App\Models\Flight;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $usedFlightCodes = []; // Array to track used flight codes

        for ($i = 0; $i < 10; $i++) {
            do {
                $flightCode = $faker->bothify('JT###');
            } while (in_array($flightCode, $usedFlightCodes)); // Ensure it's unique

            $usedFlightCodes[] = $flightCode; // Add to the used codes list

            Flight::create([
                'flight_code' => $flightCode,
                'origin' => $faker->stateAbbr,
                'destination' => $faker->stateAbbr,
                'departure_time' => $faker->dateTimeBetween('now', '+1 year'),
                'arrival_time' => $faker->dateTimeBetween('+1 year', '+2 year'),
            ]);
        }
    }
}
