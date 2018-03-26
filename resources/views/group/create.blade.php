@extends('layouts.app')

@section('content')
		<div class="jumbotron text-center">
			<h1> Create a new Group</h1>
			<p>We will help you to find the right people</p>
		</div>
		

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<form>
				<fieldset class="text-left">
					<legend><h1>What will you group be about?</h1>
					
					<div class="form-group">
           				 <div class="col-sm-12 col-md-12 col-lg-12 marginbottom">
                			<input type="search" class="form-control" id="search" placeholder="Add your options..">
            			</div>
       			 	</div>

						@foreach($cates as $cate)
				<div class="form-group col-md-3" >
            		<input type="checkbox" name="{{ $cate->cat_name}}" id="{{ $cate->cat_name}}" autocomplete="off" />
            		<div class="btn-group">
               			 <label for="{{ $cate->cat_name}}" class="btn btn-default">
                    		<span class="glyphicon glyphicon-ok"></span>
                   			 <span> </span>
                		</label>
               		 <label for="{{ $cate->cat_name}}" class="btn btn-default active">
                    	{{ $cate->cat_name}}
               		 </label>
          		  </div>
        	</div>
        		@endforeach
					</legend>
					
					
				</fieldset>

				<fieldset class="text-left">
					<legend><h1>What will be Group's name be?</h1>
						<div class="form-group">
							<input type="text" name="group_name" class="form-control" id="group_name" placeholder="Group name">
						</div>
						<h2>Describe who should join, and what your Meetup will do.</h2>
						<div class="form-group">
							<textarea class="form-control resizeable" rows="5" id="description" required maxlength="300" placeholder="describe your group"></textarea>
						</div>
					</legend>
				</fieldset>
				 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Group
                                </button>
                            </div>
            </div>		
				</form>
			</div>

		</div>
	</div>




@endsection