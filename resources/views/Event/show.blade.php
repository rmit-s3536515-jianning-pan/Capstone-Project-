@extends('layouts.app')

<!-- This page contains the search results of your search -->
@section('content')

 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/s.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">Search For Events</h2>
            </div>

        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

	@include('homepage_search')

	<section>
	<div class="container">
		<h2>Searched Results</h2>
		@if (count($records)>0)
			@foreach(array_chunk($records,3) as $record)
			<div class="row">
				@foreach($record as $add)
				<div class="col-md-4 my-2">
                    <a href="{{ url('event/'.$add['item']['id']) }}">
                      <div class="listing-item bg-white shadow-1 blue-hover p-relative text-center panel-primary item-height2">
                          <!-- <div class="panel-heading" style="background-color: #EB586F">
                            
                          </div> -->

                          <div class="panel-heading bg" style=" height: 50%; padding-bottom: 15px;">

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
                              <hr>
                              <span>Max Attendee: {{ $add['item']["max_attend"] }}</span>
                          </div>

                      </div>
                    </a>
                </div>
				@endforeach
			</div>
			@endforeach
		@else
			<div class="row">
				<div class="col-md-12">
					<hr class="noresult">
					<div class="row">

						<div class="col-md-4 text-center">
							<span class="glyphicon glyphicon-exclamation-sign" style="color: red; font-size: 70px"></span>

						</div>

						<div class="col-md-8 text-left">
							<h3>Sorry, we couldn't find any results matching with your search!</h3>
						</div>
					</div>


					<hr class="noresult">
				</div>
			</div>


		@endif
	</div>
</section>


	<script type="text/javascript">
		$(function(){
			$('.panel').matchHeight();
		});
	</script>
@endsection
