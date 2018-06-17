@extends('layouts.app')


@section('content')

<section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/grad5.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row" >
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

  @if(!empty($created))
	<div class="container" >
    <h1>Created Past Events</h1>
		@foreach(array_chunk($created,3) as $record)
			<div class="row">
				@foreach($record as $add)
				<div class="col-md-6 my-2">
                    <a href="{{ url('event/'.$add->id) }}">
                      <div class="listing-item bg-white shadow-1 blue-hover p-relative text-center panel-primary item-height2">
                          <!-- <div class="panel-heading" style="background-color: #EB586F">
                            
                          </div> -->

                          <div class="panel-heading bg" style="padding-bottom: 0; padding: 5px 0;">
                              <h4 class="text-danger" style="font-weight: 400%;     background: red; color: black;">{{ $add->pasttime }}</h4>
                            <h3>{{ $add->title }}</h3>
                            
                          </div>
                          <div class="panel-body" style="height: 70px;">
                          <div >
                            <span>{{ $add->start_time }} | {{ $add->start_date }} | Max Attendee  {{ $add->max_attend }}</span>
                        </div>
                        <br>
                              <p> 
                                    @if(strlen($add->description)< 200)
                                         {{ $add->description}}
                                    @else
                                         {{ substr($add->description,0,130) }} <em>...</em>
                                    @endif
                              </p>
                              


                          </div>
                          

                      </div>
                    </a>
                </div>
				@endforeach
			</div>
			@endforeach
	</div>
  @endif

  @if(!empty($joined))
  <div class="container">
    <h1>Joined Past Events</h1>
    @foreach(array_chunk($joined,3) as $record)
      <div class="row" style="    padding-bottom: 100px;">
        @foreach($record as $add)
        <div class="col-md-6 my-2">
            <a href="{{ url('event/'.$add->id) }}">
              <div class="listing-item bg-white shadow-1 blue-hover p-relative text-center panel-primary item-height2" style="height: 100%; padding-bottom: 30px;">
                  <!-- <div class="panel-heading" style="background-color: #EB586F">
                    
                  </div> -->

                    <div class="panel-heading bg" style="padding-bottom: 0; padding: 5px 0;">
                        <h4 class="text-danger" style="font-weight: 400%;     background: red; color: black;">{{ $add->pasttime }}</h4>
                      <h3>{{ $add->title }}</h3>
                      
                    </div>
                    <div class="panel-body" style="height: 70px;">
                    <div >
                      <span>{{ $add->start_time }} | {{ $add->start_date }} | Max Attendee  {{ $add->max_attend }}</span>
                  </div>
                  <br>
                  <p> 
                        @if(strlen($add->description)< 200)
                             {{ $add->description}}
                        @else
                             {{ substr($add->description,0,130) }} <em>...</em>
                        @endif
                  </p>

                  </div>
              </div>
            </a>
        </div>
        @endforeach
      </div>
      @endforeach
  </div>
  @endif

  @if(empty($joined) && empty($created))
    <div class="container" style="height: 300px">
       <h1>No History Events</h1>
    </div>
  @endif

@endsection