<p>Reservation Info screen</p>
Reservation code: {{$reservationInfo -> code}} <br>
Reservation status: {{$reservationInfo -> status}} <br>
Reservation time: {{$reservationInfo -> dateTime}} <br>
Time left: {{$timeLeft}} <br>
Number in line: {{$numberInLine}} <br>
Specialist: {{$specialistInfo -> name}} {{$specialistInfo -> surname}} <br>

<form method="POST" action="/reservation/cancel">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <p><input type="hidden" name="res_code" value="{{$reservationInfo -> code}}"></p>
    <p>
        <button type="submit" >
            Cancel Reservation
        </button>
    </p>

</form>
