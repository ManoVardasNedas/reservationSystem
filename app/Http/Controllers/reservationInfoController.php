<?php

namespace App\Http\Controllers;

use App\Services\reservation_service;
use App\specialist;
use Illuminate\Http\Request;

class reservationInfoController extends Controller
{

    private $serviceReservation;

    public function __construct()
    {
        $this->serviceReservation = new reservation_service();
    }

    public function showReservationInfo(Request $request)
    {
        $code = $request->input('res_code');
        
        return view('reservation_info');
    }
}
