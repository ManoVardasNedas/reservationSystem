<?php

namespace App\Http\Controllers;

use App\reservation;
use App\specialist;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    public function show_res_create()
    {
        $specialists = specialist::all();
        return view('reservationCreate', compact('specialists'));
    }

    public function createReservation(Request $request)
    {
        $code = rand(1000000, 9999999);

        $date = $request-> input('reservationDate');
        $time = $request-> input('reservationTime');
        $dateTime = date('Y-m-d H:i:s', strtotime("$date $time"));

        reservation::create([
            'code'              => $code,
            'fk_specialistID'   => $request -> input('specialistID'),
            'dateTime'          => $dateTime,
            'status'            => 'Upcoming'
        ]);

        return $code;
    }
}
