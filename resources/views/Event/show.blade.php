@extends('layouts.app')

<!-- This page contains the search results of your search -->
@section('content')

	@include('homepage_search')
	<div class="container">
		<h2>Searched Result</h2>
		@if (count($records)>0)
			@foreach(array_chunk($records,3) as $record)
			<div class="row">
				@foreach($record as $add)
				 <a href="{{ url('event/'.$add['item']['id']) }}">
				<div class="col-md-4">
				<div class="panel panel-primary text-center">
					<div class="panel-heading">
						<h3>{{ $add['item']["title"] }}</h3>
					</div>
					<div class="panel-body">
						<p>{{ $add['item']["description"] }}</p>
						<hr>
						<span>Max Attendee: {{ $add['item']["max_attend"] }}</span>
					</div>

				</div>
			</div>
				</a>
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



	<script type="text/javascript">
		$(function(){
			$('.panel').matchHeight();
		});
	</script>
@endsection
