
@extends('layouts.app')

@section('content')

    <!--Explore by catory-->
    <div class="container">

      <div class="row">
      <div class="panel panel-default">
      <div class="panel-heading">  <h4>User Profile</h4>@if(Session::has('message'))
                    <div class="alert alert-success">
                      <strong>{{Session::get('message')}}</strong>
                    </div>
                @endif</div>
      <div class="panel-body">
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">

          <img alt="Profile Picture" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

          </div>
            <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >

                <div class="container" >
                  <h2>{{ Auth::user()->name }}</h2>
                </div>
                   <hr>
                    <ul class="container details" >
                      <li>
                        <p><b>Email :</b> {{ Auth::user()->email }}</p>
                      </li>
                      <li>
                        <p><b>Date of Birth :</b> {{ Auth::user()->dob }}</p>
                      </li>
                      <li>
                        <p><b>Gender :</b> {{ Auth::user()->gender }}</p>
                      </li>
                      <li>
                        <p><b>Address :</b> {{ Auth::user()->address }}</p>
                      </li>
                    </ul>

                    <p><h3>Preferences :</h3></p><hr>
                    @foreach ($data as $sub)
                      <li>{{ $sub->name }}</li>
                    @endforeach
                    <br>
                  <button type="button" class="btn-block" onclick="location.href = '{{ route('updateView') }}'">Update</button>

            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
