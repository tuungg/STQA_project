<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for($i=0; $i<10; $i++){
            Ticket::create([
                'flight_id' => $faker->numberBetween(1, 10),
                'passenger_name' => $faker->name,
                'passenger_phone' => substr($faker->phoneNumber, 1, 14),
                'seat_number' => $faker->randomLetter.$faker->numberBetween(1, 99),
            ]);
        }

        // $Tickets =[
        //     [
        //         'flight_id' => 1,
        //         'passenger_name' => "Gunawan",
        //         'passenger_phone' =>"073884747474",
        //         'seat_number' => "A01",
        //     ],
        // ];

        // foreach ($Tickets as $t){
        //     Ticket::create($t);
        // }
    }
}
