@extends('layouts.app')
<style type="text/css">
   .jumbotron{
        background-color: orange !important;
        margin-bottom: 0 !important;
   }

   .jumbotron h1{
        color:rgba(0,0,0,0.7) !important;
   }

   .card-img-top {
        width: 100% !important;
    }

    .minfooter{
        background-color: #314455 !important;
        color: white !important;
    }
</style>
@section('content')

    <div class="jumbotron text-center">
            <h1>Encounter</h1>
    </div> 

    <!--Explore by catory-->
    <div class="container">
        <h3>Explore By Catory</h3>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card"">
                   <a href=""><img class="card-img-top" src="{{ url('/images/bird.png') }}" alt="Card image cap"></a>
                    <div class="card-body text-center">
                         <h3 class="card-title">Sport</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card"">
                   <a href=""><img class="card-img-top" src="{{ url('/images/bird.png') }}" alt="Card image cap"></a>
                    <div class="card-body text-center">
                         <h3 class="card-title">Technology</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card"">
                   <a href=""><img class="card-img-top" src="{{ url('/images/bird.png') }}" alt="Card image cap"></a>
                    <div class="card-body text-center">
                         <h3 class="card-title">Adventure</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Content-->
    <div class="container-fluid minfooter">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                
                <ul class="nav flex-column">
                    <li class="nav-item"><h2>Your Account</h2>
                    </li>
                    <li class="nav-item">
                        <h4><a class="nav-link" href="{{ url('/login') }}">Login</a></h4></li>
                    <li class="nav-item">
                        <h4><a class="nav-link" href="{{ url('/register') }}">Register</a></h4></li>
                </ul>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <h2>Discover</h2>
            </div>
    </div>
</div>
@endsection
