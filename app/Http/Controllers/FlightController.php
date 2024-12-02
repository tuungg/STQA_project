<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(){
        $data['flights'] = Flight::all();
        return view("flight.index",$data);
    }
}
