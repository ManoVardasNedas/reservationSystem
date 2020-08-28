<?php

namespace App\Services;

use App\specialist;

class specialist_service
{
    public function getSpecialist(int $specialistID)
    {
        $specialist = specialist::where('specialist_ID', $specialistID)->first();
        return $specialist;
    }
}
