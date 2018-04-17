<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Encounter</title>
    
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- external javascript for matching height -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>

    <!-- jquery for multi select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    
    <!-- datetime picker -->

    <!-- http://felicegattuso.com/projects/datedropper/ -->
    <link href="{{ asset('css/datedropper.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/datedropper.js') }}"></script>
    

    <!-- time picker -->
    <link href="{{ asset('css/jquery.timepicker.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.timepicker.js') }}"></script>

    <!-- restrict input to numeric value -->
    <!-- https://www.jqueryscript.net/form/jQuery-Plugin-To-Restrict-Input-To-Numeric-Values-Mask-As-Number.html -->
    <script src="{{ asset('js/jquery-mask-as-number.js') }}"></script>



    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}



  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <!-- import our own css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />

    <style>
        body {
            font-family: 'Lato';
            padding-top: 70px;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .footer{
            background-color: #19181A !important;
            color:#fff !important;
            padding-top:25px;
            padding-bottom:25px;
        }
        .home_nav{
            -webkit-box-shadow: 0px 3px 21px 3px rgba(0,0,0,0.67);
-moz-box-shadow: 0px 3px 21px 3px rgba(0,0,0,0.67);
box-shadow: 0px 3px 21px 3px rgba(0,0,0,0.67);
            background:rgba(201,101,103,0.85) !important;
            /*background-color: #C96567 !important;*/
        }

        a{
            text-decoration: none !important;
            color: #19181A !important;
        }

        .br{
            border-right:1px solid black !important;
        }
        .navbar{
            border: 0;
        }

        .navbar-nav li a:hover, .navbar-nav li.active a{
            background-color: #fff !important;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top home_nav">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Encounter
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/') }}">Service</a></li>
                    <li><a href="{{ url('/') }}">About Us</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                    @if (Auth::guest())

                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                          <li ><a class="br" href="{{ url('/event/create') }}">Create a Event</a></li>
                         <li ><a class="br" href="{{ route('creategroup')}}">Create a Group</a></li>


                        <!-- <li><a class="br" href="{{ url('logout') }}">Logout</a></li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ url('/profile') }}"><i class="glyphicon glyphicon-user one"></i> Profile</a></li>
                                

                                <li><a href="{{ url('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

   
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <div class="container-fluid text-center footer">
            <div class="row">
                <div class="col-md-12">
                     <p>@2018 COPYRIGHT ENCOUNTER</p>
                </div>
            </div>
    </div>


</body>
</html>
