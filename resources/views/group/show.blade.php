@extends('layouts.app')


@section('content')
	<div class="jumbotron welcome_header text-center">
		<h1> Join a Group</h1>
		<p>Be a part of the fun!</p>
	</div>
	<div class="container">
		<div class="row">
			@if(!empty($tasks))
			@foreach($tasks as $task)
			<a href="{{ url('group/'.$task->id) }}">
				<div class="col-md-6 marginbottom">
					<div class="panel panel-primary text-center">
						<div class="panel-heading">
					    	<h3>{{ $task->title }}</h3>
					    </div>
					    <div class="panel-body">
					    	<p>{{ $task->description}}</p>
					    </div>
					</div>
		    		<hr>
				</div>
			</a>
			@endforeach
			@else
				<div id="extendHeight" style="height: 300px"></div>
			@endif

		</div>
	</div>


@endsection