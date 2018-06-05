<!--event calender-->
<section class="pb100 bg-prime mt-30">
        @if(Session::has('message'))
    <div class="container">
        <div class="alert alert-success popMessage">
          <h3><strong>{{Session::get('message')}}</strong></h3>
        </div>
    </div>
    @endif
    @if (!empty($event))
    <div class="container con">
        <div class="row ro">
            <div class="col-sm-10 col-sm-offset-1">
                <h2 class="uppercase mb40 mb-xs-24 text-center">Check these events out!</h2>
                <h3 class="section-description text-white text-center">~ Based on your preferences, these are the best events for you ~</h3>
                <hr class="mb40 mb-xs-24 fade-half">

            @foreach (array_chunk($event,3) as $e)
                <ul class="unordered_list">
                    @foreach($e as $add)
                    <li class="mb40 mb-xs-24 shadow-1 blue-hover">
                        
                            <div class="overflow-hidden mb32 ">
                                <div class="col-sm-1 percent-b" >
                                    <?php $score = $add['score']; ?>
                                    <h4 class="uppercase pt8  p-unset" style="display: inline-block; font-size: x-large;     margin-left: -10px">{{ round($score) }}%</h4>
                                </div>

                                <div class="col-sm-4">
                                    <h4 class="uppercase mb0">{{ $add["item"]["title"] }}</h4>
                                    <span><h6 class="mb0 uppercase">When</h6>{{ $add['item']["start_time"] }}</span>
                                    <span><h6 class="mb0 uppercase pt8">Time</h6>{{ $add['item']["start_date"] }}</span>
<!--                                     <span>Adventure | Sports </span>
 -->                                </div>
                                <div class="col-sm-4">
                                    <span><h6 class="uppercase pt8">Description:</h6>@if(strlen($add['item']["description"])< 200)
                                         {{ $add['item']["description"]}}
                                    @else
                                         {{ substr($add['item']["description"],0,130) }} <em>...</em>
                                    @endif</span>
                                </div>
                                <div class="col-sm-3 text-right">
                                <a class="butn butn-sm butn-white mt8" href="{{ url('event/'.$add['item']['id']) }}">Read More</a>
                            </div>
                            </div>
                        <hr class="fade-half mb0">
                    </li>
                    @endforeach
                </ul>
                @endforeach
            </div>
            @else
      <div style="height: 300px"></div>
    @endif
        </div>
        <!--end of row-->
    </div>
</section>
<!--event calender end -->



