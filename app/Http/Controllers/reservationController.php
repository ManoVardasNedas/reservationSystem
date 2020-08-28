<?php

namespace App\Http\Controllers;

use App\reservation;
use App\Services\reservation_service;
use App\specialist;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    private $serviceReservation;

    public function __construct()
    {
        $this->serviceReservation = new reservation_service();
    }

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

        return "Your code: ".$code. "<br> <a href=\"/\"><button class=\"button\">Back to main screen</button></a>";
    }

    public function cancelReservation(Request $request)
    {
        $code = $request->input('res_code');
        reservation::where('code', $code)->delete();
        return redirect('/');
    }

    public function startReservation(Request $request)
    {
        $code = $request -> input('res_code');
        $this-> serviceReservation-> finishStartedSpecialist($code);
        reservation::where('code', $code)->update(['status' => 'Started']);
        return back();
    }

    public function finishReservation(Request $request)
    {
        $code = $request -> input('res_code');
        reservation::where('code', $code)->update(['status' => 'Finished']);
        return back();
    }


}
