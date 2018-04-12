@extends('layouts.app')

@section('content')

    <!-- <div class="jumbotron text-center welcome_header">
            <h1>Encounter</h1>
    </div>  -->
    
    <div class="container-fluid welcome_header" >
        <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="images/2.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="images/1.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>

            <div class="item">
              <img src="images/3.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a >
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a >
        </div>

        </div>
    </div>

    <div class="container-fluid bg-primary search">
        <form class="col-md-8 col-md-offset-2" method="get" action="{{ url('event/showall') }}">
            <div class="row">
                <div class="col-md-5 margin-t-b">
                    <label for="keywords">Name</label>
                    <div class="input-group input-group-lg">
                        <input type="text" name="keywords" class="form-control" placeholder="Enter keywords">
                    </div>
                </div>
                <div class="col-md-5 margin-t-b">
                    <label>Classification</label>
                    <div class="dropdown btn-group btn-group-lg">
                        <button class="btn btn-lg btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Any Classification<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                        </button>

                        <ul class="dropdown-menu scrollable-menu" id="main-menu">
                            @foreach ($categories as $cate)
                                <li class="item">
                                   <!--  <label class="check">{{ $cate->cat_name}}
                                     <input type="checkbox" name="categories[]" value="{{ $cate->id}}">
                                         <span class="checkmark"></span>
                                      </label> -->
                                    <a href="#" data-value="{{ $cate->cat_name }}" tabIndex="-1" class="{{$cate->id}}"><input type="checkbox" name="categories[]" value="{{ $cate->id}}"><span>{{ $cate->cat_name}}</span></a>
                                   
                                        <ul class="subcatmenu"> 
                                            <!-- <li><a href="#" ><input type="checkbox" id="checkAll"><span>Check All</span></a></li> -->
                                            @foreach ($subs as $sub)
                                                @if ($sub->cate_id==$cate->id)   
                                            <li>
                                               <a href="#" data-value="{{ $sub->name }} " tabIndex="-1" ><input type="checkbox" name="subs[]" value="{{ $sub->id}}"><span>{{ $sub->name}}</span></a>
                                            </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 margin-t-b">
                    <label class="invisible">hidden</label>
                    <div class="input-group input-group-lg">
                        <button type="submit" class="btn btn-success btn-lg" style="width:100%">Search</button>
                    </div>
                    
                </div>
            </div>

            </div>
        </form>
    </div>

    <!-- <p>{{ Auth::user()->id }}</p> -->
    @if (count($event)>0)
    <div class="container">
            <h3>Recommanded Events</h3>

        @foreach (array_chunk($event,3) as $e)
        <div class="row">

            @foreach($e as $add)
            <div class="col-md-4 marginbottom">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3>{{ $add["title"] }}</h3>
                        <h4>Matching Percentage: {{ Session::get($add['id'])}}%</h4>    
                    </div>
                    <div class="panel-body">
                        <p>{{  $add["description"] }}</p>
                        <div>{{ $add["start_date"] }}</div>
                        <div>{{ $add["start_time"] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
           
            
        </div>
        @endforeach  
    </div>
    @endif
    <!--Explore by catory-->
    <div class="container">
        <h3>Explore By Category</h3>
        
            @foreach($categories->chunk(3) as $category)
                <div class="row">
                    @foreach($category as $c)
                    <div class="col-md-4 col-sm-12 marginbottom">
                                 
                            <div class="panel panel-success text-center" >
                                <div class="panel-heading" style="height: 100px; font-size: 40px" >{{ $c['cat_name'] }}</div>
                                

                            </div>
                    
                    </div>
                    @endforeach
               
            </div>
            @endforeach
           
       
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


<script type="text/javascript">
    $(function(){
        $('.panel').matchHeight();
    });
</script>

<script type="text/javascript">
    

        var options = [];

$( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   return false;
});
    </script>

    <!-- <script>
        $(document).ready(function(){
            $('#checkAll').click(function(){
                if( ($(this).prop('checked'))){
                   $('input:checkbox').prop('checked',true);
                }else{
                    $('input:checkbox').prop('checked',false);
                }
                
            });
        });
    </script> -->

    <script>
       
        $(document).ready(function() {
            $('#main-menu .subcatmenu').hide();

            $('#main-menu >li a').click(function(){
                
                $('#main-menu >li .subcatmenu').show();
                
            });
          
        });
        
    </script>
@endsection
