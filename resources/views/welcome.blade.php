@extends('layouts.app')

@section('content')

    <!-- include search page -->
    @include('homepage_search')
    @if(Session::has('message'))
    <div class="container">
        <div class="alert alert-success popMessage">
          <h3><strong>{{Session::get('message')}}</strong></h3>
        </div>
    </div>
    @endif
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
                                  <?php $score = $add['score']; ?>
                                  <h3>{{ $add["item"]["title"] }}</h3>
                                  <h4>Matching Percentage: {{ round($score) }}%</h4>
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
    <!--Explore by category-->
    <!--<div class="container">
        <h3>Explore By Category</h3>

            @foreach($categories->chunk(3) as $category)
                <div class="row">
                    @foreach($category as $c)
                    <div class="col-md-4 col-sm-12 marginbottom">
                            <a href="{{ url('/'.$c['cat_name']) }}">
                            <div class="panel panel-success text-center" >
                                <div class="panel-heading" style="height: 100px; font-size: 40px" >{{ $c['cat_name'] }}</div>


                            </div>
                           </a>
                    </div>
                    @endforeach

            </div>
            @endforeach
    </div>-->

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
    <script type="text/javascript">
        $(document).ready(function(){
            $('.popMessage').slideUp(4000);
        });
    </script>

@endsection
