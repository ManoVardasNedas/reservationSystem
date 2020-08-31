<?php

namespace App\Services;

use App\reservation;
use Carbon\Carbon;

class reservation_service
{

    public function createReservation($code, $specialistID, $dateTime)
    {
        reservation::create([
            'code'              => $code,
            'fk_specialistID'   => $specialistID,
            'dateTime'          => $dateTime,
            'status'            => 'Upcoming'
        ]);
        return true;
    }

    public function getReservation(int $reservation_code)
    {
        $reservation = reservation::where('code', $reservation_code)->first();
        return $reservation;
    }

    public function getReservationsBySpecialistUserID(int $userID)
    {
        $timeNow = Carbon::now('Europe/Vilnius')->subHours(1);
        $reservations = reservation::join('specialists', 'reservations.fk_specialistID', '=', 'specialists.specialist_ID')
            ->where('fk_userID', $userID)
            ->where('dateTime', '>' , $timeNow)
            ->where('status', '!=', 'Finished')
            ->orderByRaw('IF(status = "Started", 0, 1)')
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

    public function generateCode()
    {
        $code = rand(1000000, 9999999);
        return $code;
    }

    public function deleteReservation(int $code)
    {
        reservation::where('code', $code)->delete();
        return true;
    }

    public function changeReservationStatus(int $code, string $status)
    {
        reservation::where('code', $code)->update(['status' => $status]);
        return true;
    }



}
