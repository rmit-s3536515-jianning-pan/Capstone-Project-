@extends('layouts.app')


@section('content')

<section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/l.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">History Events</h2>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('event/showall') }}">Home</a>
                    </li>
                    
                    <li class="active">History Events</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


	<div class="container">
		@foreach(array_chunk($records,3) as $record)
			<div class="row">
				@foreach($record as $add)
				<div class="col-md-4 my-2">
                    <a href="{{ url('event/'.$add->id) }}">
                      <div class="listing-item bg-white shadow-1 blue-hover p-relative text-center panel-primary item-height2">
                          <!-- <div class="panel-heading" style="background-color: #EB586F">
                            
                          </div> -->

                          <div class="panel-heading bg" style=" height: 50%; padding-bottom: 15px;">

                            <h3>{{ $add->title }}</h3>
                            <h3 class="text-danger" style="font-weight: 400%">{{ $add->pasttime }}</h3>
                          </div>
                          <div class="panel-body" style="height: 70px;">
                              <p>
                                    @if(strlen($add->description)< 200)
                                         {{ $add->description}}
                                    @else
                                         {{ substr($add->description,0,130) }} <em>...</em>
                                    @endif
                              </p>
                              
                          </div>
                          <div class="panel-body px-2 text-uppercase d-inline-block font-weight-medium lts-2px" style="width: 100%">
                            <span class="text-right">{{ $add->start_date }}</span> |
                              <span class="text-left">{{ $add->start_time }}</span> 
                              <hr>
                              <span>Max Attendee: {{ $add->max_attend }}</span>
                          </div>

                      </div>
                    </a>
                </div>
				@endforeach
			</div>
			@endforeach
	</div>

@endsection