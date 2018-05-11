@extends('layouts.app')

@section('content')

 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/l.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">Events</h2>
                <p class="lead mb0">...</p>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('/index') }}">Home</a>
                    </li>
                    
                    <li class="active">Events</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<!--    

    <div class="container-fluid welcome_header" >
        <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
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
  -->

    <!-- include search page -->
@include('_homepage_search')


@include('_eventPercentage_show')

<!-- <section style="background-color: #f3f4f7;">
    @if (count($event)>0)
    <div class="container">
            <h3>Recommended Events</h3>

        @foreach (array_chunk($event,3) as $e)
        <div class="row">

            @foreach($e as $add)
            <div class="col-md-4 marginbottom">
                <a href="{{ url('event/'.$add['item']['id']) }}">
                  <div class="panel panel-primary text-center">
                      <div class="panel-heading">

                          <h3>{{ $add["item"]["title"] }}</h3>
                          <h4>Matching Percentage: {{ $add['score'] }}%</h4>    

                      </div>
                      <div class="panel-body">
                          <p>{{  $add['item']["description"] }}</p>
                          <div>{{ $add['item']["start_date"] }}</div>
                          <div>{{ $add['item']["start_time"] }}</div>
                      </div>
                  </div>
                </a>
            </div>
            @endforeach


        </div>
        @endforeach

    </div>
    @endif
</section> -->
    <!--Explore by category-->
<!-- <section class="pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
               Explore Categories
            </h3>
        </div>

            @foreach($categories->chunk(3) as $category)
                <div class="row justify-content-center">
                    @foreach($category as $c)
                    <div class="col-md-4 col-sm-12 marginbottom">

                        <a href="{{ url('/'.$c['cat_name']) }}">

                        <div class="speaker_box">
                          <div class="speaker_img">
                              <img src="images/p.jpg" alt="speaker name">
                              <div class="info_box">
                                  <h5 class="name">{{ $c['cat_name'] }}</h5>
                              </div>
                          </div>
                      </div>

                              
                        
                       </a>
                    </div>
                    @endforeach
                </div>
            @endforeach
      </div>
  </section> -->

    <!--Content-->
<!--    <div class="container-fluid minfooter">
        <div class="row ">
            <div class="col-md-8 col-md-offset-2">
              <div class="col-md-6 text-center"><h2>HELP</h2></div>
              <div class="col-md-6 text-center"><h2>DISCOVER</h2></div>
            </div>
    </div>
</div>
-->

<script type="text/javascript">
    $(function(){
        $('.panel').matchHeight();
    });
</script>

    <script>
        $(document).ready(function() {
            $('#main-menu .subcatmenu').hide();
            $('#main-menu >li a').click(function(){
                $('#main-menu >li .subcatmenu').show();
            });
        });
    </script>
@endsection
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
