@extends('layouts.app')


@section('content')
    
        <div class="jumbotron welcome_header text-center">
            <h1> Join a Group</h1>
            <p>Be a part of the fun!</p>
        </div>

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

                        <a href="{{ url('/groupProfile') }}" class=" px-2 text-uppercase d-inline-block font-weight-medium lts-2px styled-link">Read More
                        </a>

                    </div>

                    
                </div>
                @endforeach
            </div>
            {{$tasks->links()}}
        </div>
    


@endsection