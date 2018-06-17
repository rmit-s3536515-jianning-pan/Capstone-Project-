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
				<div class="col-md-6 my-2 col-xs-12">
        <a href="{{ url('event/'.$add['item']['id']) }}">
          <div class="content">
            <div class="card">
              <div class="firstinfo">
                  <div>
                    
                  </div>
                <div class="profileinfo">
                  <h2>{{ $add["item"]["title"] }}</h2>
                  <h4> {{ $add['item']['start_date'] }} | {{ $add['item']["start_time"] }} | People: {{ $add['item']["max_attend"] }}</h4>
                  <p class="bio"> 
                    @if(strlen($add['item']["description"])< 200)
                           {{ $add['item']["description"]}}
                      @else
                           {{ substr($add['item']["description"],0,130) }} <em>...</em>
                      @endif
                </div>
              </div>
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
