<?php

namespace App\Http\Controllers;

use App\Services\reservation_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class specialistController extends Controller
{

    private $serviceReservation;

    public function __construct()
    {
        $this->serviceReservation = new reservation_service();
    }

    public function showSpecialistView()
    {
        $userID = auth()->user()['id'];
        $reservations = $this->serviceReservation->getReservationsBySpecialistUserID($userID);

        return view('specialist', compact('reservations'));
    }
}
