<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Operator</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Route</th>
      <th scope="col">Fare</th>
      <th scope="col">Departure</th>
      <th scope="col">Arrival</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  @foreach($schedules as $schedule)
    <tr>
      <td>{{ $schedule->operator }}</td>
      <td>{{ $schedule->busname }}</td>
      <td>{{ $schedule->location }}</td>
      <td>{{ $schedule->route }}</td>
      <td>{{ $schedule->fare }}</td>
      <td>{{ $schedule->departure }}</td>
      <td>{{ $schedule->arrival }}</td>
      <td>
      <form action="{{ url('/schedules/delete/'.$schedule->id) }}" method="post">
            @csrf
            <a href="{{ url('/schedules/edit/'.$schedule->id) }}" class="btn btn-sm btn-info">Edit</a>
            <input type="submit" class="btn btn-sm btn-info" value="Delete" />
        </form>

      </td>
    </tr>
  @endforeach
  </tbody>
</table>