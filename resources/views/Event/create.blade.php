@extends('layouts.app')


@section('content')


 <script type="text/javascript">
    $(document).ready(function(){
       	$('.jumbotron-fluid h2').click(function(){
       		alert("hello");
       	});
    });
</script>
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
				
				
				
				<div>
					<div class="col-md-12">
						<label>Choose Categories</label>
					</div>
					@foreach($categories as $cate)
				<div class="form-group col-md-4 group_cate" >
            		<input type="checkbox" name="cates[]" id="{{ $cate->id}}" autocomplete="off" value="{{ $cate->id}}" />
            		<div class="btn-group">
               			 <label for="{{ $cate->id}}" class="btn btn-default">
                    		<span class="glyphicon glyphicon-ok"></span>
                   			 <span> </span>
                		</label>
               		 <label for="{{ $cate->id}}" class="btn btn-default active">
                    	{{ $cate->cat_name}}
               		 </label>
          		  </div>
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
