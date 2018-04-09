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
						<h3>{{ $add["title"] }}</h3>
					</div>
					<div class="panel-body">
						<p>{{ $add["description"] }}</p>
						<hr>
						<span>Max Attendee: {{ $add["max_attend"] }}</span>
					</div>
					
				</div>
			</div>
				@endforeach
			</div>
			@endforeach
		@else
			<p><span class="glyphicon glyphicon-warning"></span>Result is not found!</p>
		@endif
	</div>



	<script type="text/javascript">
		$(function(){
			$('.panel').matchHeight();
		});
	</script>
@endsection