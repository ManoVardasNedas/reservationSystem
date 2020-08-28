<?php

namespace App\Http\Controllers;

use App\Services\reservation_service;
use App\Services\specialist_service;
use App\Services\time_service;
use Illuminate\Http\Request;

class reservationInfoController extends Controller
{

    private $serviceReservation;
    private $serviceSpecialist;
    private $serviceTime;

    public function __construct()
    {
        $this->serviceReservation = new reservation_service();
        $this->serviceSpecialist = new specialist_service();
        $this->serviceTime = new time_service();
    }

    public function showReservationInfo(Request $request)
    {
        $code = $request->input('res_code');
        $reservationInfo = $this->serviceReservation->getReservation($code);
        $specialistInfo = $this->serviceSpecialist->getSpecialist($reservationInfo['fk_specialistID']);
        $timeLeft = $this->serviceTime->getTimeLeftText($reservationInfo['dateTime']);
        $numberInLine = $this->serviceReservation->getLineNumber($reservationInfo['dateTime'], $specialistInfo['specialist_ID']);


        return view('reservation_info', compact('reservationInfo', 'specialistInfo', 'timeLeft', 'numberInLine'));
    }
}
