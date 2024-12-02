<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Tickets =[
            [
                'flight_id' => 1,
                'passenger_name' => "Gunawan",
                'passenger_phone' =>"073884747474",
                'seat_number' => "A01",
            ],
        ];

        foreach ($Tickets as $t){
            Ticket::create($t);
        }
    }
}
