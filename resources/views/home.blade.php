<p>Home screen</p>

<form method="POST" action="/reservation/info">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <p><label>Reservation Code</label></p>
    <p><input type="text" name="res_code"></p>

    <p>
        <button type="submit" >
            Check
        </button>
    </p>

</form>

<p><a href="/reservation"><button class="button">Register</button></a></p>

