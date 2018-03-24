@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
			<h1>Get Few Interest</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

		<form class="form-horizontal" role="form" method="POST" action="{{ route('poststep2') }}">
			 {{ csrf_field() }}
			
			@foreach($categories as $cat)
				<div class="form-group checkbox col-md-4">

				<label class="control-label">
				<input class="form-control " type="checkbox" name="cates[]" value="{{ $cat->id }}">{{ $cat->cat_name }}</label>
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
	@if (session('name'))
		<p>{{ session('name')}}</p>
	
	@else
		<p>not session</p>
	
@endif

@endsection