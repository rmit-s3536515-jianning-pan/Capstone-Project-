@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
			<h1>Get Few Interest</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

		<form role="form" method="POST" action="{{ route('poststep2') }}">
			 {{ csrf_field() }}

			@foreach($categories as $cate)
				<div class="form-group col-md-4">
					<input type="checkbox" name="cates[]" id="{{ $cate->id}}" autocomplete="off" value="{{ $cate->id}}" />
            		<div class="btn-group">
               			 <label  class="btn btn-default">
                    		<span class="glyphicon glyphicon-ok"></span>
                   			 <span> </span>
                		</label>
               		 <label for="{{ $cate->id }}" class="btn btn-default active">
                    	{{ $cate->cat_name}}
               		 </label>
          		  </div>

				</div>
			@endforeach

			 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
            </div>

		</form>

		</div>
	</div>
	</div>
	<!-- @if (session('name'))
		<p>{{ session('name')}}</p>

	@else
		<p>not session</p>

	@endif -->

@endsection
