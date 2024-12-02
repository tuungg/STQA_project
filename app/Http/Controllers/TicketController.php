<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function index(Flight $flight){
        $data['flight'] = $flight;
        $data['tickets'] = Ticket::where('flight_id',$flight->id)->get();
        $data['totalBoard'] = Ticket::where('flight_id',$flight->id)
                                        ->where('is_boarding', 1)
                                        ->count();
        return view('flight.detail',$data);

    }

    public function create(Flight $flight){
        // tampilan form
        $data['flight'] = $flight;
        return view('flight.book',$data) ;
    }

    public function store(Request $request){
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|numeric|max_digits:14',
            'seat_number' => 'required|string|max:3',
        ]);

        $ticket = Ticket::create($validated);

        if($ticket){
            return redirect()->back()->with('success', 'Booking success');
        }else{
            return redirect()->back()->with('error', 'Error while booking ticket');
        }
    }

    public function boarding(Ticket $ticket){
        if($ticket->is_boarding){
            return redirect()->back()->with('error', 'Ticket has been Board');
        }

        $ticket->update([
            'is_boarding' => 1,
            'boarding_time' => now(),
        ]);

        return redirect()->back()->with('success', 'Ticket has been Board');
    }

    public function destroy(Ticket $ticket){
        if($ticket->is_boarding){
            return redirect()->back()->with('error', 'Ticket has been boarding you cant delete it');
        }
        $ticket->delete();
        return redirect()->back()->with('success', 'Ticket has been deleted');
    }
}
