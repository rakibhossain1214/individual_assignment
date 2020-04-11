<form action="{{ url('/schedules/store') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Route</label>
        <input type="text" class="form-control" name="route" placeholder="Route">
    </div>

    <div class="form-group">
        <label>Fare</label>
        <input type="text" class="form-control" name="fare" placeholder="Fare">
    </div>

    <div class="form-group">
        <label>Departure</label>
        <input type="text" class="form-control" name="departure" placeholder="Departure">
    </div>

    <div class="form-group">
        <label>Arrival</label>
        <input type="text" class="form-control" name="arrival" placeholder="Arrival">
    </div>

    <input type="submit" class="btn btn-info" value="Save" />
    <a href="{{ url('/schedules') }}" class="btn btn-sm btn-info">Back</a>

</form>