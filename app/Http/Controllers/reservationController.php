<?php

namespace App\Http\Controllers;

use App\reservation;
use App\Services\reservation_service;
use App\Services\time_service;
use App\specialist;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    private $serviceReservation;
    private $serviceTime;

    public function __construct()
    {
        $this->serviceReservation = new reservation_service();
        $this->serviceTime = new time_service();
    }

    public function show_res_create()
    {
        $specialists = specialist::all();
        return view('reservationCreate', compact('specialists'));
    }

    public function createReservation(Request $request)
    {
        $this->validateReservationCreate($request);
        $code = $this->serviceReservation->generateCode();

        $date = $request-> input('reservationDate');
        $time = $request-> input('reservationTime');
        $dateTime = $this->serviceTime->connectDateAndTime($date, $time);

        $this->serviceReservation->createReservation($code, $request->input('specialistID'), $dateTime);


        return "Your code: ".$code. "<br> <a href=\"/\"><button class=\"button\">Back to main screen</button></a>";
    }

    public function cancelReservation(Request $request)
    {
        $this->validateReservationCode($request);
        $code = $request->input('res_code');
        $this->serviceReservation->deleteReservation($code);
        return redirect('/');
    }

    public function startReservation(Request $request)
    {
        $this->validateReservationCode($request);
        $code = $request -> input('res_code');
        $this-> serviceReservation-> finishStartedSpecialist($code);
        $this-> serviceReservation-> changeReservationStatus( $code ,'Started');
        return back();
    }

    public function finishReservation(Request $request)
    {
        $this->validateReservationCode($request);
        $code = $request -> input('res_code');
        $this-> serviceReservation-> changeReservationStatus( $code ,'Finished');
        return back();
    }

    private function validateReservationCode(Request $request)
    {
        $this->validate($request, [
            'res_code'  =>  'numeric'
        ]);
        return true;
    }

    private function validateReservationCreate(request $request)
    {
        $this->validate($request, [
            'specialistID'      =>  'required|numeric',
            'reservationDate'   =>  'required|date'
        ]);
    }

}
