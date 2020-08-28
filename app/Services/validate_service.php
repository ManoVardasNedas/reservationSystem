<?php

namespace App\Services;

use Illuminate\Http\Request;

class validate_service
{
    public function validateReservationCode(Request $request)
    {
        $this->validate($request, [
            'res_code'  =>  'numeric'
        ]);
        return true;
    }

    public function validateReservationCreate(request $request)
    {
        $this->validate($request, [
            'specialistID'      =>  'required|numeric',
            'reservationDate'   =>  'required|date'
        ]);
    }

}
