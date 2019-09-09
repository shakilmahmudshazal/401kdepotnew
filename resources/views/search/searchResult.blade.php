@extends('layouts.app')

@section('content')
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.form-inline {  
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

.form-inline label {
  margin: 5px 10px 5px 0;
}

.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
  cursor: pointer;
}

.form-inline button:hover {
  background-color: royalblue;
}

@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }
  
  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
  .pagination li{
    display: inline;
  }
}
</style>



 <form class="form-inline" method="get" action="/search">
   @csrf
  <!-- <label for="email">Email:</label>
 -->  <input type="text" id="search" placeholder="Search" name="service">
  <!-- <label for="pwd">Password:</label> -->
  <input type="text" id="place" placeholder="City/state" name="place">
  <!-- <label>
    <input type="checkbox" name="remember"> Remember me
  </label> -->
  <button type="submit">Search</button>
</form>

@foreach($users as $user)
  
  <ul type="none">
    <li><h1><a href="/searchProfile/{{$user->id}}">{{$user->name}}</a> </h1></li>
    <li> {{$user->email}}</li>
    <li>{{$user->userBasic->city}}</li>
    <li>{{$user->userBasic->state}}</li>
    <li>{{$user->userBasic->zipcode}}</li>
    
  </ul>
  
   
@endforeach 

{{$users->links()}}  


@endsection