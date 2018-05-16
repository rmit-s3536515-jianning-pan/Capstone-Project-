@extends('layouts.app')


@section('content')
 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/r.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">All Groups</h2>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('event/showall') }}">Home</a>
                    </li>
                    
                    <li class="active">Groups</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section>
    <div class="container">
        <div class="row">
            @if(!empty($tasks))
            @foreach($tasks as $task)
            <div class="col-md-4 my-2">

                <a href="{{ url('group/'.$task->id) }}">
                  <div class="listing-item bg-white shadow-1 blue-hover p-relative text-center panel-primary">
                      <!-- <div class="panel-heading" style="background-color: #EB586F">
                        
                      </div> -->

                      <div class="panel-heading" style=" height: 100%; padding-bottom: 15px;">

                        <h3>{{ $task->title }}</h3>
                      </div>
                      <div class="panel-body px-2 text-uppercase d-inline-block font-weight-medium lts-2px" style="width: 100%; height: 100px;">
                          <p>{{ $task->description }}</p>
                          
                      </div>

                  </div>
                </a>                    
            </div>
            @endforeach
            @else
                <div style="height: 300px"></div>
            @endif

        </div>
    </div>
</section>

@endsection