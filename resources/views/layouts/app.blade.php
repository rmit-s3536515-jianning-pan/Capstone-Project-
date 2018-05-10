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
    <!-- select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


<!-- ____________________________________________SB Admin 2 Bootstraps____________________________________________ -->
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bs/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('bs/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('bs/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('bs/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('bs/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!--______________________________________________________________________________________________________________-->


    <link rel="stylesheet" type="text/css" href="{{asset('css/m-buttons.min.css') }}">
    <script src="{{ asset('js/m-dropdown.min.js') }}"></script>
    <script src="{{ asset('js/m-radio.min.js') }}"></script>

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
        }
        .fa-btn {
            margin-right: 6px;
        }
        .home_nav{
            -webkit-box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.67);
            -moz-box-shadow: 0px 3px 21px 3px rgba(0,0,0,0.67);
            box-shadow: 0px .5px 10px .5px rgba(0,0,0,0.67);
            /*background:rgba(201,101,103,0.85) !important;*/
            /*background-color: #C96567 !important;*/
        }
        a{
            text-decoration: none !important;
            color: #19181A !important;
        }
        ul li a{
        display: block;
        padding: 30px 20px;
        color: #222;
        font-size: 12px;
        letter-spacing: 1px;
        text-decoration: none;
        text-transform: uppercase;
        }
        .br{
            /*border-right:1px solid black !important;*/
        }
        .navbar{
            border: 0;
            /*padding: 5px;*/
        }
        .navbar-nav li a:hover, .navbar-nav li.active a{
            background-color: #fff !important;
        }
        #app-layout {
         margin-top: 50px;
        }
        .navbar-brand {
            font-style: oblique, serif;
            font-weight: bold;
            font-size: 25px;
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
                <a class="navbar-brand" href="{{ url('/index') }}">
                    Encounter
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                @if (Auth::guest())
                    <li><a href="{{ url('/') }}">Services</a></li>
                    <li><a href="{{ url('/') }}">About Us</a></li>
                @else
                    <li><a href="{{ url('/') }}">Events</a></li>
                    <li><a href="{{ url('/Group/index') }}">Groups</a></li>
                @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                    @if (Auth::guest())

                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a class="br" href="{{ url('/myGroup') }}">My Group</a></li>
                        <li><a class="br" href="{{ url('/myEvent') }}">My Event</a></li>
                        <li ><a class="br" href="{{ url('/event/create') }}">Create Event</a></li>
                        <li ><a class="br" href="{{ url('createGroup')}}">Create Group</a></li>



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


    <!-- JavaScripts -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script> -->

<!-- ____________________________________________SB Admin 2 Bootstraps____________________________________________ -->
  <!-- jQuery -->
   <!--  <script src="{{ asset('bs/vendor/jquery/jquery.min.js') }}"></script>
 -->
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bs/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('bs/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bs/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bs/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<!--______________________________________________________________________________________________________________-->

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<footer class="footer-main">
     <div class="container">
       <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12">
                  <span><a class="text-white navbar-brand" href="{{ url('/index') }}">
                    Encounter
                </a></span>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="menu">
                         <span>Menu</span>
                         <li>
                            <a href="#">Home</a>
                          </li>

                          <li>
                             <a href="#">About</a>
                          </li>

                          <li>
                            <a href="#">Services</a>
                          </li>

                          <li>
                             <a href="#">Gallery</a>
                          </li>

                          <li>
                             <a href="{{ url('admin') }}">Admin</a>
                          </li>
                     </ul>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                  <ul class="address">
                        <span>Contact</span>
                        <li>
                           <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">Phone</a>
                        </li>
                        <li>
                           <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Adress</a>
                        </li>
                        <li>
                           <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">Email</a>
                        </li>
                   </ul>
               </div>
           </div>
        </div>
        <div class="col-md-12 text-center footer">
            <p>@2018 COPYRIGHT ENCOUNTER</p>
        </div>
    </footer>

</body>
</html>
