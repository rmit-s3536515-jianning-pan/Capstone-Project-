@extends('layouts.app')

@section('content')

 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/l.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">Events For You</h2>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('event/showall') }}">Home</a>
                    </li>
                    
                    <li class="active">Events Matched</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

    <!-- include search page -->
@include('_eventPercentage_show')
<!-- <section>
    @if(Session::has('message'))
    <div class="container">
        <div class="alert alert-success popMessage">
          <h3><strong>{{Session::get('message')}}</strong></h3>
        </div>
    </div>
    @endif
    @if (!empty($event))
        <div class="container">
        <h3></h3>
        <h2 class="uppercase mb40 mb-xs-24 text-center">Check these events out!</h2>
        <h3 class="section-description text-center">~ Based on your preferences, these are the best events for you ~</h3>
        <hr class="mb40 mb-xs-24 fade-half">

        @foreach (array_chunk($event,3) as $e)
            <div class="row">
                @foreach($e as $add)
                    <div class="col-md-4 my-2">

                        <a href="{{ url('event/'.$add['item']['id']) }}">
                          <div class="listing-item bg-white shadow-1 blue-hover p-relative text-center panel-primary item-height2">
                             

                              <div class="panel-heading green-colour" style=" height: 50%; padding-bottom: 15px; background-image: url(images/bg1.png);">
                                  
                                  <?php $score = $add['score']; ?>
                                <h4>Matching Percentage: {{ round($score) }}%</h4>

                                <h3>{{ $add["item"]["title"] }}</h3>
                              </div>
                              <div class="panel-body" style="height: 70px;">
                                  <p>
                                    @if(strlen($add['item']["description"])< 200)
                                         {{ $add['item']["description"]}}
                                    @else
                                         {{ substr($add['item']["description"],0,130) }} <em>...</em>
                                    @endif

                                  </p>
                                  
                              </div>
                              <div class="panel-body px-2 text-uppercase d-inline-block font-weight-medium lts-2px" style="width: 100%">
                                <span class="text-right">{{ $add['item']["start_date"] }}</span> |
                                  <span class="text-left">{{ $add['item']["start_time"] }}</span>
                              </div>

                          </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    @else
      <div style="height: 300px"></div>
    @endif
</section> -->


<script type="text/javascript">
    $(function(){
        $('.panel').matchHeight();
    });
</script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.popMessage').slideUp(4000);
        });
    </script>

@endsection