@extends('layouts.app')


@section('content')

<div class="jumbotron-fluid text-center">
		<h2>Create Event</h2>
</div>
<div class="container"><hr></div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form role="form" method="POST" action="{{ url('/event/create') }}">
				{{ csrf_field() }}
				<div class="form-group col-md-6">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control col-md-offset-" placeholder="Event Name" required>
				</div>

				<div class="form-group col-md-6">
					<label for="max">Max Attendees</label>
					<input type="number" name="max" class="form-control" placeholder="Max Attendee" min="5" max="30" required>
				</div>

				<div class="form-group col-md-6">
					<label for="event_date">Event date</label>
					<input type="date" name="event_date" class="form-control" placeholder="date" min="<?php echo date("Y-m-d");?>" required>
				</div>

				<div class="form-group col-md-6">
					<label for="event_time">Event time</label>
					<input type="time" name="event_time" class="form-control" placeholder="time" required>
				</div>
				
				
				
				<div class="col-md-12">
					<!-- <div class="col-md-12">
						<label>Choose Categories</label>
					</div> -->
					<h5>Choose Categories</h5>
					@foreach($categories->chunk(3) as $cate)
						<div class="row">
							@foreach($cate as $c)
							<div class="col-md-4 margin-t-b">
							<div class="form-group">							<select class="selectpicker form-control" name="pref[]" multiple="" title="{{$c['original']['cat_name']}}" data-selected-text-format="count" data-size="5" data-actions-box="true">
							
							@foreach($subs as $sub)
								@if($sub->cate_id==$c['original']['id'])
								<option value="{{ $sub->id }}">{{ $sub->name }}</option>
								@endif
							@endforeach
						</select>
					</div>

					</div>
							@endforeach
						
						</div>
					
			
        		@endforeach
				</div>
				<div class="form-group col-md-12">
					<label for="description">Description</label>
					<textarea class="form-control resizeable" rows="5" name="description" min="30" max="1000" required></textarea>
					
				</div>


				<div class="form-group col-md-6">
					<button type="submit" name="submit" class="btn btn-primary">
						Submit
					</button>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection
