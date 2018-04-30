@extends('layouts.app')



@section('content')

	<div class="container-fluid welcome_header" style="border:2px red">
		<div class="row">
			
					<img src="images/2.jpg" alt="test" class="img-responsive">
					<div class="carousel-caption">
						<h1 class="text-success">CATEGORY OF: {{ $name }}</h1>
					</div>
			
		</div>
	</div>

	<div class="container margin-t-b text-center bg-primary">
		<h4>Location: Postcode s sdkaskdlsa kld s ds </h4>		
	</div>

	<div class="container">
		<h1>Your Group</h1>
		@if(count($items)>0)
		@foreach(array_chunk($items,3) as $item)
		<div class="row">
			@foreach($item as $i)
			
			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
								<h3>{{ $i['title']}}</h3>
						</div>
						<div class="panel-body">
								{{ $i['description']  }}
						</div>
					</div>
			</div>
			@endforeach
		</div>
		@endforeach
		@else
		<span>No Group Availabe</span>
		@endif
	</div>


@endsection