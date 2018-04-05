
@extends('layouts.app')

@section('content')

    <!--Explore by catory-->
    <div class="container">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

            <div class="container">
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >User Profile</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">


                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2>{{ Auth::user()->name }}</h2>

                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p>Email : {{ Auth::user()->email }}</p></li>
                            <li><p>Date of Birth :{{ Auth::user()->dob }}</p></li>
                            <li><p>Gender :{{ Auth::user()->gender }}</p></li>
                            <li><p>Address :{{ Auth::user()->address }}</p></li>
                            <li><p>Bio :{{ Auth::user()->bio }}</p></li>
                          </ul>
                          <hr>
                          <button type="button" class="btn-block" onclick="location.href = '{{ route('updateView') }}'">Update</button>
                      </div>
                </div>
            </div>
            </div>
    </div>

@endsection
