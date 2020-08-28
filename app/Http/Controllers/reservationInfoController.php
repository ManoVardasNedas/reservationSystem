<?php

namespace App\Http\Controllers;

use App\specialist;
use Illuminate\Http\Request;

class reservationInfoController extends Controller
{
    public function showReservationInfo(Request $request)
    {
        return view('reservation_info');
    }
}
