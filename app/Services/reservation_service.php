<?php

namespace App\Services;

use App\reservation;

class reservation_service
{
    public function getReservation(int $reservation_code)
    {
        $reservation = reservation::where('code', $reservation_code)->first();
        return $reservation;
    }
}
