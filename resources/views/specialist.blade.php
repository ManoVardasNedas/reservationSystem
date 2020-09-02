<p>specialist screen</p>

<br> <a href="/logout"><button class="button">Logout</button></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<h1>Reservations</h1>
<div id="data_ref">
    @foreach($reservations as $reservation)
        <p>
            Reservation code: {{$reservation -> code}} <br>
            Reservation time: {{$reservation -> dateTime}} <br>
            Reservation status: {{$reservation -> status}} <br>

            <form method="POST" action="/reservation/cancel">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="res_code" value="{{$reservation -> code}}">
                <button type="submit" >
                    Cancel Reservation
                </button>
            </form>

            <form method="POST" action="/reservation/start">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="res_code" value="{{$reservation -> code}}">
                <button type="submit" >
                    Start
                </button>
            </form>

            <form method="POST" action="/reservation/finish">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="res_code" value="{{$reservation -> code}}">
                <button type="submit" >
                    Finish
                </button>
            </form>
        </p>
    @endforeach
</div>

<script>
    var auto_refresh = setInterval( function()
        {
            $('#data_ref').load('<?php echo url('/specialist/refresh');?>').fadeIn("slow");
        },
        5000
    );
</script>
