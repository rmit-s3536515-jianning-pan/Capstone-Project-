@extends('layouts.app')

@section('content')

		<div class="jumbotron-fluid welcome_header bg-primary text-center" style="padding:50px 0">
			<h1>Event Page</h1>
			<h4>Organizer: <em>{{ $owner->name }}</em></h4>
		</div>


	<div class="container-fluid">
		@if(Session::has('message'))
		<div class="alert alert-success">
			<h4><em>{{Session::get('message')}}</em><h4>
		</div>
	@endif
		<div class="row" >
			<div class="col-md-8">
				<div class="rounded bg-success">
					<h2 class="pt-b">Title:&nbsp;&nbsp;&nbsp; {{ $event['title'] }}&nbsp;&nbsp;{{$event['start_date']}}&nbsp;&nbsp;{{ $event['start_time'] }}</h2>
					<h4 class="pt-b">Description</h4>
					<div class="pt-b">{{$event['description']}}</div>
				</div>

				<div>
					<h4>Who's coming</h4>


						<div class="circle bg-success block">
								<p>sd</p>
						</div>

				</div>

			</div>

				<div class="col-md-4">
					@if($attend==0)
					<a class="form-control m-btn red big" data-toggle="modal" data-target="#myModal">Join</a>
					@elseif ($attend==1)
						<a class="form-control m-btn red big" data-toggle="modal" data-target="#leave">Leave</a>
					@endif
					<div class="modal fade" id="leave" role="dialog">
						<form method="get" action="{{ url('event/'.$id.'/leave') }}">
						<div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Are you sure that you want to leave this event?</h4>
					        </div>
					        <div class="modal-body">
					        	<button type="submit" class="form-control m-btn big red">Leave</button>
					        </div>
					    </div>
					</div></form></div>


					<div class="modal fade" id="myModal" role="dialog">
						<form method="get" action="{{ url('event/'.$id.'/join') }}">
						<div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Join this event</h4>
					        </div>
					        <div class="modal-body">
					          <p>Some text in the event.</p>
					        </div>
					        <div class="modal-footer">
					          <button type="submit" class="form-control m-btn big red">Join</button>
					        </div>
					      </div>
					  </div>
					</form>
					</div>
					@if($owner->id != Auth::user()->id)
					<!-- report event button -->
						<a class="form-control m-btn blue big" data-toggle="modal" data-target="#reportModal">Report Event</a>
					@endif
					<!-- report event popup  -->
					<div class="modal fade" id="reportModal" role="dialog">
						<form method="get" action="{{ url('event/'.$id.'/report') }}">
						<div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Report this event</h4>
					        </div>
					        <div class="modal-body">
					          <label class="control-label">Reason to report</label>
					          <textarea class="form-control" placeholder="Reasons for reporting this event" name="report" required></textarea>
					          
					        </div>
					        <div class="modal-footer">
					          <button type="submit" class="form-control m-btn big red">Report</button>
					        </div>
					      </div>
					  </div>
					</form>
					</div>
					<!-- end of report event -->


				</div>

				<!-- <button href="#" class="m-btn big red">Join</a> -->
		</div>



	</div>

	<script type="text/javascript">
		$(function(){
			$('.h').matchHeight();
		});
	</script>
@endsection
