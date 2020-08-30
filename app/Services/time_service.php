<?php

namespace App\Services;

use App\reservation;
use Carbon\Carbon;

class time_service
{
    public function getTimeLeftText(string $timeEnd)
    {
        $timeEnd = Carbon::createFromDate($timeEnd);
        $timeStart = $this->getTimeNow();

        $dayDif = $timeStart -> diffInDays($timeEnd);
        $hourDif = $timeStart -> diffInRealHours($timeEnd);
        $hourDif = $hourDif - $dayDif*24 - 3;
        if($dayDif < 1 && $hourDif < 1)
        {
            return 'less than 1 hour';
        }
        return $dayDif.' days and '. $hourDif . ' hours';
    }

    public function getTimeNow()
    {
        return Carbon::now('Europe/Vilnius');
    }

    public function connectDateAndTime($date, $time)
    {
        $dateTime = date('Y-m-d H:i:s', strtotime("$date $time"));
        return $dateTime;
    }

    public function isReservationTimeAvailable($dateTime)
    {
        $timeNow = $this->getTimeNow();
        if($timeNow > $dateTime)
        {
            return false;
        }
        else return $this->isReservationTimeFree($dateTime);
    }

    public function isReservationTimeFree($dateTime)
    {
        $reservation = reservation::where('dateTime', $dateTime) -> first();
        if($reservation == null)
        {
            return true;
        }
        else return false;
    }

}
