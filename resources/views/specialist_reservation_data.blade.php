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
        <br>
        </p>
    @endforeach
