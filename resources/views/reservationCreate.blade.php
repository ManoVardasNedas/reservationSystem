<p>Reservation screen</p>
<form method="POST" action="/reservation/confirm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <p><label>Choose a specialist</label></p>
        <select class="form-control" name="specialistID">
            @foreach ($specialists as $specialist)
                <option value="{{$specialist->specialist_ID}}">{{$specialist->name}} {{$specialist->surname}}</option>
            @endforeach
        </select>

    <p><label>Choose date</label></p>
    <input type="date"  name="reservationDate">

    <p><label>Choose Time</label></p>
    <select name="reservationTime">
        <option value="8:00:00">8:00</option>
        <option value="9:00:00">9:00</option>
        <option value="10:00:00">10:00</option>
        <option value="11:00:00">11:00</option>
        <option value="12:00:00">12:00</option>
        <option value="13:00:00">13:00</option>
        <option value="14:00:00">14:00</option>
        <option value="15:00:00">15:00</option>
        <option value="16:00:00">16:00</option>
        <option value="17:00:00">17:00</option>
        <option value="18:00:00">18:00</option>
    </select>

    <p>
        <button type="submit" class="btn btn-primary button"> <span class="glyphicon glyphicon-refresh"></span>
            Register
        </button>
    </p>

</form>
<p id="demo1"></p>

