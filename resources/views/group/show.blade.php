@extends('layouts.app')


@section('content')
	<div class="jumbotron welcome_header text-center">
		<h1> Join a Group</h1>
		<p>Be a part of the fun!</p>
	</div>
	<div class="container">
		<div class="row">
			@foreach($tasks as $task)
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
			@endforeach
		</div>
	</div>


@endsection