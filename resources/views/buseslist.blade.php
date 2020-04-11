<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Operator</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Seat Row</th>
      <th scope="col">Seat Column</th>
      <th scope="col">Manager</th>
      <th scope="col">Operations</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($buses as $bus)
    <tr>
      <td>{{ $bus->operator }}</td>
      <td>{{ $bus->bname }}</td>
      <td>{{ $bus->location }}</td>
      <td>{{ $bus->seat_row }}</td>
      <td>{{ $bus->seat_column }}</td>
      <td>{{ $bus->manager }}</td>
      <td>
        <!-- <a href="#" class="btn btn-sm btn-info">Show</a> -->
        
        <!-- <a href="{{ url('/buses/delete/'.$bus->id) }}" class="btn btn-sm btn-info">Delete</a> -->

        <form action="{{ url('/buses/delete/'.$bus->id) }}" method="post">
            @csrf
            <a href="{{ url('/buses/edit/'.$bus->id) }}" class="btn btn-sm btn-info">Edit</a>
            <input type="submit" class="btn btn-sm btn-info" value="Delete" />
        </form>

      </td>
    </tr>
  @endforeach
  </tbody>
</table>