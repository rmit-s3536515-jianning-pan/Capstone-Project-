@extends('layouts.app')

@section('content')

    <!-- <div class="jumbotron text-center welcome_header">
            <h1>Encounter</h1>
    </div>  -->
    
    <div class="welcome_header" >
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
          <img src="images/2.jpg" class="percent100" alt="">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="images/1.jpg" class="percent100" alt="">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="images/3.jpg" class="percent100" alt="">
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

    <div class="container-fluid bg-primary search">
        <form class="col-md-8 col-md-offset-2" method="get" action="{{ url('event/showall') }}">
            <div class="row">
                <div class="col-md-5">
                    <label for="keywords">Name</label>
                </div>
                <div class="col-md-5">
                    <label>Classification</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="input-group input-group-lg">
                        <input type="text" name="keywords" class="form-control" placeholder="Enter keywords">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="dropdown btn-group btn-group-lg">
                        <button class="btn btn-lg btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Any Classification<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                        </button>

                        <ul class="dropdown-menu">
                            @foreach ($categories as $cate)
                                <li class="item"><a href="#" data-value="{{ $cate->cat_name }}" tabIndex="-1"><input type="checkbox" name="categories[]" value="{{ $cate->cat_name}}"><span>{{ $cate->cat_name}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--  <select class="form-control" name="category_id">
                        <option value="" > All </option>   
                            @foreach ($categories as $cate)
                                @if(Request::input('category_id')==$cate->id)
                                    <option value ="{{ $cate->id }}" selected>{{ $cate->cat_name}} </option>   
                                @else
                                <option value ="{{ $cate->id }}" >{{ $cate->cat_name}}  </option>   
                                
                                @endif
                            @endforeach
                    </select> -->
                </div>
                <div class="col-md-2">
                    <div class="input-group input-group-lg">
                        <button type="submit" class="btn btn-success btn-lg" style="width:100%">Search</button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>

    <!-- start searching bar -->

   <!--  <div class="table-responsive container col-md-12">  
    <table class="table table-striped grid-view-tbl" id="home_search_table">
        
        <thead>
        <tr class="header-row" style="color:#337ab7;">
       
            <th>Name</th>
       
        
            <th>Category</th>
            
            <th></th>
        </tr>
        <tr class="search-row">
            <form id="search_form" class="search-form">
             
                <td><input type="text" class="form-control" name="name" value="" placeholder="Enter Keywords"></td>
              
                <td>
                    <select class="form-control" name="category_id">
                        <option value="" > All </option>   
                            @foreach ($categories as $cate)
                                @if(Request::input('category_id')==$cate->id)
                                    <option value ="{{ $cate->id }}" selected>{{ $cate->cat_name}} </option>   
                                @else
                                <option value ="{{ $cate->id }}" >{{ $cate->cat_name}}  </option>   
                                
                                @endif
                            @endforeach
                    </select>
                </td>
                <td>
                    <div class="form-group">
                        <button style="width:100%; font-size: 4vmin;" type="submit" class="btn btn-success">Search</button>
                    </div>
                </td>
                <input type="hidden" id="rand" name="rand" value="">

            </form>
        </tr>
        </thead>

        <tbody>
        
        </tbody>

    </table>

    <div class="text-center" >
        <button  style="width:40%; font-size: 4vmin;" class="btn btn-primary" onclick="$('#search_form').submit()">Start Searching</button>
    </div>

</div>
 -->
<!-- end of searching  -->



    <!-- <p>{{ Auth::user()->id }}</p> -->
    @if (count($event)>0)
    <div class="container">
            <h3>Recommanded Events</h3>

        <div class="row">
            <!-- <div class="card-deck"> -->
            @foreach ($event as $e)
            <a href="#">
            <div class="marginbottom card col-md-4 text-center"> 
                <div class="card-body bg-primary">
                    <h4 class="card-title text-center">{{ $e->title }}</h4>
                    <hr>
                    <p class="card-text">
                        {{ $e->description }}
                    </p>
                </div>
            </div>
        </a>
            @endforeach  
            <!-- </div>  -->
        </div>
    </div>
    @endif
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
      
   console.log( options );
   return false;
});

    </script>
@endsection
