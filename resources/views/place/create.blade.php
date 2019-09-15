@extends('layouts.app')

@section('content')
    <h3>Place Create</h3>
    <div class="col-sm-4">
        <form action="/savePlace" method="post">
            @csrf

            <div>
                <label> City</label>
                <input type="text" class="form-control" name="city">
            </div>
            <div>
                <label> State </label>
                <input type="text" class="form-control" name="state">
            </div>
            <div>
                <label> Zip Code</label>
                <input type="number" class="form-control" name="zipcode">
            </div>
            </br>
            <div>

                <input type="submit" class="btn btn-success" name="submit" value="Create">
            </div>


        </form>
    </div>

@endsection