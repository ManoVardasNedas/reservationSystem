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

    public function getReservationsBySpecialistUserID(int $userID)
    {
        $reservations = reservation::join('specialists', 'reservations.fk_specialistID', '=', 'specialists.specialist_ID')
            ->where('fk_userID', $userID)
            ->orderBy('dateTime')
            ->limit(6)
            ->get();

        return $reservations;
    }

    public function getLineNumber(string $time, int $specialistID)
    {
        $reservations = reservation::where('fk_specialistID', $specialistID)
            ->where('dateTime','<=', $time)
            ->get();

        $numberInLine = count($reservations);

        return $numberInLine;
    }

    public function finishStartedSpecialist($code)
    {
        $codeRes = $this->getReservation($code);
        $specialistID = $codeRes['fk_specialistID'];
        reservation::where([
            ['fk_specialistID', $specialistID],
            ['status', 'Started']])
            ->update(['status' => 'Finished']);
    }
}
