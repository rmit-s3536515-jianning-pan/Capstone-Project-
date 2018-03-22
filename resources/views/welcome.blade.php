@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center welcome_header">
            <h1>Encounter</h1>
    </div> 

    <!--Explore by catory-->
    <div class="container">
        <h3>Explore By Catory</h3>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 col-sm-12">
                <div class="thumbnail thumnail-border">
        <a href="#">
            <div class="jumbotron wel_pic"></div>
         <!--  <img src="{{ url('/images/bird.png') }}" class="img-circle" alt="Nature" style="width:100%"> -->
          <div class="caption text-center">
            <p>{{ $category->cat_name}}</p>
          </div>
        </a>
      </div>
                <!-- <div class="card">
                   <a href=""><img class="card-img-top" src="{{ url('/images/bird.png') }}" alt="Card image cap"></a>
                    <div class="card-body text-center">
                         <h3 class="card-title">{{ $category->cat_name}}</h3>
                    </div>
                </div> -->
            </div>
            @endforeach
           
        </div>
    </div>

    <!--Content-->
    <div class="container-fluid minfooter">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                
                <ul class="nav flex-column">
                     @if (Auth::guest())
                    <li class="nav-item"><h2>Your Account</h2>
                    </li>
                    <li class="nav-item">
                        <h4><a class="nav-link" href="{{ url('/login') }}">Login</a></h4></li>
                    <li class="nav-item">
                        <h4><a class="nav-link" href="{{ url('/register') }}">Register</a></h4></li>
                    @else
                    <li class="nav-item"><h2>HELP</h2></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <h2>Discover</h2>
            </div>
    </div>
</div>
@endsection
