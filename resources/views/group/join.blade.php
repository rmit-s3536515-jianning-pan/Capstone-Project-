@extends('layouts.app')


@section('content')
	<div class="jumbotron welcome_header text-center">
		<h1> Single group Page</h1>
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
					<h2 class="pt-b">Title:&nbsp;&nbsp;&nbsp; {{ $group['title'] }}</h2>
					<h4 class="pt-b">Description</h4>
					<div class="pt-b">{{$group['description']}}</div>
				</div>

				<div>
					<h4>Members</h4>


						<div class="row">
							<div class="col-lg-2" style="margin-right: 10px">
								
								<span class="img-circle text-center bg-primary" style="display:block; height: 12rem;width:12rem;line-height: 12rem">
									Test
									
								</span>
							</div>
							<div class="col-lg-2" style="margin-right: 10px">
								
								<span class="img-circle text-center bg-primary" style="display:block; height: 12rem;width:12rem;line-height: 12rem">
									Test
									
								</span>
							</div>
							<div class="col-lg-2" style="margin-right: 10px">
								
								<span class="img-circle text-center bg-primary" style="display:block; height: 12rem;width:12rem;line-height: 12rem">
									Test
									
								</span>
							</div>
						</div>
						
				</div>

			</div>

				<div class="col-md-4">
					
					

					@if($owner->id != Auth::user()->id)
						@if($attend==0)
						<div class="form-group">
							<a class="form-control m-btn red big" data-toggle="modal" data-target="#myModal">Join</a>
						</div>
						@elseif ($attend==1)
						<div class="form-group">
							<a class="form-control m-btn red big" data-toggle="modal" data-target="#leave">Leave</a>
						</div>
						@endif
					<!-- report group button -->
						<div class="form-group">
							<a class="form-control m-btn blue big" data-toggle="modal" data-target="#reportGroupModal">Report Group</a>
						</div>
					@endif

					<div class="modal fade" id="leave" role="dialog">
						
						<div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Are you sure that you want to leave this group?</h4>
					        </div>
					        <div class="modal-body">
					        	<a class="form-control m-btn big red" href="{{ url('/group/leave/'.$group['id']) }}">Leave</a>
					        </div>
					    </div>
					</div>
				</div>


					<div class="modal fade" id="myModal" role="dialog">
						
						<div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Join this group</h4>
					        </div>
					        <div class="modal-body">
					          <p>Some text in the group.</p>
					        </div>
					        <div class="modal-footer">
					          <a class="form-control m-btn big red" href="{{ url('/group/join/'.$group['id']) }}">Join</a>
					        </div>
					      </div>
					  </div>
					
					</div>

					<!-- report event popup  -->
					<div class="modal fade" id="reportGroupModal" role="dialog">
						<form method="get" action="{{ url('/group/report/'.$group['id']) }}">
						<div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Report this Group</h4>
					        </div>
					        <div class="modal-body">
					          <label class="control-label">Reason to report</label>
					          <textarea class="form-control" placeholder="Reasons for reporting this event" name="report" required></textarea>
					          
					        </div>
					        <div class="modal-footer">
					          <button type="submit" class="form-control m-btn big red">Report this Group</button>
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

@endsection