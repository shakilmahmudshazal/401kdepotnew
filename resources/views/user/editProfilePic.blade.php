@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form method="post" action="/saveProfilePic" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="profile_pic">Profile Pic</label> </br>
                    <input type="file" name="profile_pic">
                </div>

                <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('home') }}">BACK</a>
                <button type="submit" class="btn btn-primary">Save</button>
              
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
