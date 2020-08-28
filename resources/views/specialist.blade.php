<p>specialist screen</p>

<h1>Reservations</h1>
<div id="data_ref">
    @foreach($reservations as $reservation)
        <p>
            Reservation code: {{$reservation -> code}} <br>
            Reservation time: {{$reservation -> dateTime}} <br>
            Reservation status: {{$reservation -> status}} <br>
            
        </p>
    @endforeach
</div>
