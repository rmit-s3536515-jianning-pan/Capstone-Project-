@extends('layouts.app')

@section('content')
<<<<<<< HEAD
 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/g.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">Create a Group</h2>
                <p class="lead mb0">...</p>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('/index') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Groups</a>
                    </li>
                    <li class="active">Create a Group</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


<section>
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="feature boxed bg-secondary">
            <form class="form-listing text-center" name="form_G" method="post" action="{{ url('/storeGroup') }}">
                {{ csrf_field() }}
                <h4 class="uppercase mt48 mt-xs-0">Create a Group</h4>
                <p class="lead mb64 mb-xs-24">
                    Share a little detail about your group so we
                    <br> can connect you to other people alike.
                </p>
                <div class="overflow-hidden">
                    <hr>
                    <h6 class="uppercase">
                        1. What will the Groups's name be?
                    </h6>
                    <input type="text" name="group_name" class="form-control" id="group_name" placeholder="Your Group name" required>
                    <hr>
                </div>

                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        2. What will your group be about??
                    </h6>
                        @foreach($categories->chunk(3) as $cate)
                            <div class="row">
                                @foreach($cate as $c)
                                <div class="col-md-4 margin-t-b">
                                <div class="form-group cate-options ">                          <select class="selectpicker form-control" name="pref[]" multiple="" title="{{$c['original']['cat_name']}}" data-selected-text-format="count" data-size="5" data-actions-box="true">
                                
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
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <div class="col-md-12 inner-box form-">
                        <h6 class="uppercase">
                            3. Describe who should join, and what you will do.
                        </h6>
                        <textarea class="desc-box form-control resizeable" rows="5" name="description" min="30" max="1000" placeholder="Description of your event" required></textarea>
            
                    </div>
                    <div class="form-group col-md-6">
            <button class="m-btn blue ">
                Submit<span class="glyphicon glyphicon-chevron-right"></span>
            </button>
                </div>

                
        </div>

            </form>
        </div>

    </div>

</section>
=======

<div class="jumbotron welcome_header text-center">
		<h1> Create a new Group</h1>
		<p>We will help you to find the right people</p>
</div>

<div class="container">
		<div class="row">
				<div class="col-md-12">
						<form name="form_G" method="post" action="{{ url('/group/store') }}"> {{ csrf_field() }}
								<h1>What will you group be about?</h1>
								<div class="col-md-12">
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
<br>
>>>>>>> 358437bc6ef94a0c671654800c7568ec622340f7

@endsection
