@extends('layouts.app')


@section('content')
	
	<div class="container">
		<h2>Events</h2>
		@if (count($records)>0)
			@foreach(array_chunk($records,3) as $record)
			<div class="row">
				@foreach($record as $add)
				<div class="col-md-4 marginbottom">
				<div class="panel panel-primary text-center">
					<div class="panel-heading">
						<h3>{{ $add['item']['item']["title"] }}</h3>
					</div>
					<div class="panel-body">
						<p>{{ $add['item']['item']["description"] }}</p>
						<hr>
						<span>Max Attendee: {{ $add['item']['item']["max_attend"] }}</span>
					</div>
					
				</div>
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
							<span class="glyphicon glyphicon-exclamation-sign" style="color: green; font-size: 70px"></span>

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