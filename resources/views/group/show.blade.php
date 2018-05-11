
@extends('layouts.app')


@section('content')
<<<<<<< HEAD
    
 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/r.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">All Groups</h2>
                <p class="lead mb0">...</p>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('/index') }}">Home</a>
                    </li>
                    
                    <li class="active">Groups</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

        <div class="container">
<!--            <div class="default-sorting">
                <form class="ordering" method="get">

                    <select name="orderby" class="orderby">
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                        <option value="event_date">Sort by event date</option>
                    </select>
                    <input type="hidden" name="paged" value="1">
                </form>
            </div> -->

            <div class="row">
                @foreach($tasks as $task)
                <div class="col-md-4 my-2">

                    <div class="listing-item bg-white shadow-1 blue-hover p-relative" >
                        <img src="https://images.pexels.com/photos/442559/pexels-photo-442559.jpeg?auto=compress&cs=tinysrgb" alt="">

                        <div class="px-2 py-1">
                            <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                              Travel | Adventure | {{ $task->id }}
                            </p>

                            <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                              {{ $task->title }}
                            </h1>

                        </div>

                        <a href="{{ url('group/'.$task->id) }}" class=" px-2 text-uppercase d-inline-block font-weight-medium lts-2px styled-link">Read More
                        </a>

                    </div>

                    
                </div>
                @endforeach
            </div>
            {{$tasks->links()}}
        </div>
    
=======
	<div class="jumbotron welcome_header text-center">
		<h1> Join a Group</h1>
		<p>Be a part of the fun!</p>
	</div>
	<div class="container">
		<div class="row">
			@if(!empty($tasks))
			@foreach($tasks as $task)
			<a href="{{ url('group/'.$task->id) }}">
				<div class="col-md-6 marginbottom">
					<div class="panel panel-primary text-center">
						<div class="panel-heading">
					    	<h3>{{ $task->title }}</h3>
					    </div>
					    <div class="panel-body">
					    	<p>{{ $task->description}}</p>
					    </div>
					</div>
		    		<hr>
				</div>
			</a>
			@endforeach
			@else
				<div id="extendHeight" style="height: 300px"></div>
			@endif

		</div>
	</div>
>>>>>>> 358437bc6ef94a0c671654800c7568ec622340f7


@endsection
