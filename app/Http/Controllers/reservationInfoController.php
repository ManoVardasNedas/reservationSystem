<?php

namespace App\Http\Controllers;

use App\Services\reservation_service;
use App\Services\specialist_service;
use Illuminate\Http\Request;

class reservationInfoController extends Controller
{

    private $serviceReservation;
    private $serviceSpecialist;

    public function __construct()
    {
        $this->serviceReservation = new reservation_service();
        $this->serviceSpecialist = new specialist_service();
    }

    public function showReservationInfo(Request $request)
    {
        $code = $request->input('res_code');
        $reservationInfo = $this->serviceReservation->getReservation($code);
        $specialistInfo = $this->serviceSpecialist->getSpecialist($reservationInfo['fk_specialistID']);

        return view('reservation_info', compact('reservationInfo', 'specialistInfo'));
    }
}
