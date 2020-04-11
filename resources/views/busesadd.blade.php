<form action="{{ url('/buses/store') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Operator</label>
        <input type="text" class="form-control" name="operator" placeholder="Operator">
        @error('operator')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="bname" placeholder="Name">
        @error('bname')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Location</label>
        <input type="text" class="form-control" name="location" placeholder="Location">
        @error('location')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Seat Row</label>
        <input type="text" class="form-control" name="seat_row" placeholder="Seat Row">
        @error('seat_row')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Seat Column</label>
        <input type="text" class="form-control" name="seat_column" placeholder="Seat Column">
        @error('seat_column')
        <div>{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" placeholder="Company">
        @error('company')
        <div>{{$message}}</div>
        @enderror
    </div>

    <input type="submit" class="btn btn-sm btn-info" value="Add" />
    <a href="{{ url('/buses') }}" class="btn btn-sm btn-info">Back</a>

</form>