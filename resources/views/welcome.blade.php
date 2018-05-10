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
    @if (!empty($event))
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
    @else
      <div id="extendHeight" style="height: 300px"></div>
    @endif

    <div class="container">
        <h3>All Events</h3>
        @if (!empty($events))
        @foreach($events->chunk(3) as $chunk)
            <div class="row">
              @foreach($chunk as $e)
                 <div class="col-md-4">
                        <a href="{{ url('event/'.$e['original']['id']) }}">
                          <div class="panel panel-primary text-center">
                              <div class="panel-heading ">

                                  <h3>{{ $e["original"]["title"] }}</h3>
                                  <!-- <h4>Matching Percentage: {{ round($score) }}%</h4> -->
                              </div>
                              <div class="panel-body">
                                  <p>{{  $e['original']["description"] }}</p>
                                  <div>{{ $e['original']["start_date"] }}</div>
                                  <div>{{ $e['original']["start_time"] }}</div>
                              </div>
                          </div>
                        </a>
                    </div>
              @endforeach

            </div>
        @endforeach
        @else
            <div id="extendHeight" style="height: 300px"></div>
        @endif
    </div>

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
