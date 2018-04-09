@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2>Events</h2>
		<div class="row">
			@foreach($records as $record)
				<div class="panel panel-default text-center">
					<div class="panel-heading">
						<h3>{{ $record->title }}</h3>
					</div>
					<div class="panel-body">
						<p>{{ $record->description}}</p>
					</div>
					<div class="panel-footer">
						<span>Max Attendee: {{ $record->max_attend }}</span>
					</div>
				</div>

			@endforeach
		</div>
		
	</div>

@endsection