<form action="{{ url('/schedules/store') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Route</label>
        <input type="text" class="form-control" name="route" placeholder="Route">
        @error('route')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Fare</label>
        <input type="text" class="form-control" name="fare" placeholder="Fare">
        @error('fare')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Departure</label>
        <input type="text" class="form-control" name="departure" placeholder="Departure">
        @error('departure')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Arrival</label>
        <input type="text" class="form-control" name="arrival" placeholder="Arrival">
        @error('arrival')
        <div>{{$message}}</div>
        @enderror
    </div>

    <input type="submit" class="btn btn-sm btn-info" value="Add" />
    <a href="{{ url('/schedules') }}" class="btn btn-sm btn-info">Back</a>

</form>