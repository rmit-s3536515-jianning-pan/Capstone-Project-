@extends('layouts.app')

@section('content')
		<div class="jumbotron welcome_header text-center" style="background: url(../../images/n.jpg) center center no-repeat;">
			<h1> Create a New Group</h1>
			<p>We will help you to find the right people</p>
		</div>


		<div class="container">
			<div class="row">
				<!-- <div class="col-md-8 col-md-offset-2"> -->
				<div class="col-md-12">

				<form name="form_G" method="post" action="{{ url('/storeGroup') }}">
					{{ csrf_field() }}
					<h1>What will your group be about?</h1>
					<!-- <hr>
					<div class="form-group">
           				 <div class="col-sm-12 col-md-12 col-lg-12 marginbottom">
                			<input type="search" class="form-control" id="search" placeholder="Add your options..">
            			</div>
		       	</div> -->

				<div class="col-md-12">
					<!-- <div class="col-md-12">
						<label>Choose Categories</label>
					</div> -->
					<h3>Choose Categories</h3>
					@foreach($categories->chunk(3) as $cate)
						<div class="row">
							@foreach($cate as $c)
							<div class="col-md-4 margin-t-b">
							<div class="form-group">
								<select class="selectpicker form-control" name="pref[]" multiple="" title="{{$c['original']['cat_name']}}" data-selected-text-format="count" data-size="5" data-actions-box="true">

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

				<h1>What will be Group's name be?</h1>
						<div class="form-group">
							<input type="text" name="group_name" class="form-control" id="group_name" placeholder="Group name" required>
						</div>
						<h2>Describe who should join, and what your Meetup will do.</h2>
						<div class="form-group">

							<textarea class="form-control resizeable" rows="5" name="description" id="description" required maxlength="300" placeholder="describe your group" required></textarea>
						</div>

				 <div class="form-group">
	          <div class="col-md-6 col-md-offset-4">
	              <button class="m-btn blue">
	                  Create Group
	              </button>
	          </div>
	      </div>
				</form>
			</div>
			</div>

		</div>


@endsection