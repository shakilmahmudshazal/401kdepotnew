@extends('layouts.master')

@section('content')
@if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
    <h3>Add Place </h3>
    <div class="col-sm-4">
        <form action="/savePlace" method="post">
            @csrf

            <div>
                <label> City</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div>
                <label> State </label>
                <input type="text" class="form-control" name="state" required>
            </div>
            <div>
                <label> Zip Code</label>
                <input type="number" class="form-control" name="zipcode" required>
            </div>
            </br>
            <div>

                <input type="submit" class="btn btn-success" name="submit" value="Create">
            </div>


        </form>
    </div>

    <br>
    <br>
    <br>
    <h2>All Place List</h2>

    <table class="table table-dark">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">ZipCode</th>
    </tr>
  </thead>
  <tbody>
    @foreach($place as $place)
    <tr>
      <!-- <th scope="row"></th> -->
      <td>{{$place->city}}</td>
      <td>{{$place->state}}</td>
      <td>{{$place->zipcode}}</td>
      <td><a class="btn btn-danger" href="/deletePlace/{{$place->id}}">Delete</a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>

@endsection