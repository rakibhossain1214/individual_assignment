<form action="{{ url('/buses/store') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Operator</label>
        <input type="text" class="form-control" name="operator" placeholder="Operator">
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="bname" placeholder="Name">
    </div>

    <div class="form-group">
        <label>Location</label>
        <input type="text" class="form-control" name="location" placeholder="Location">
    </div>

    <div class="form-group">
        <label>Seat Row</label>
        <input type="text" class="form-control" name="seat_row" placeholder="Seat Row">
    </div>

    <div class="form-group">
        <label>Seat Column</label>
        <input type="text" class="form-control" name="seat_column" placeholder="Seat Column">
    </div>

    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" placeholder="Company">
    </div>

    <input type="submit" class="btn btn-info" value="Save" />
    <input type="reset" class="btn btn-info" value="Reset" />

</form>