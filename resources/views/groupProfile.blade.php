@extends('layouts.app')

@section('content')

    <section class="banner ban-image"></section>

    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Name</h5>
                    <p class="reserve-description">Description</p>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="join-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-danger">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="light-bg booking-details_wrap ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="joining_wrap">
                            <p>More Description</p>
                            
                            <hr>
                        
                    </div>
                </div>





                <div class="col-md-4 responsive-wrap">
                    <div class="joining_wrap smt-4">
                        <div class="address">
                            <h3>Event's coming up</h3>
                            <hr>
                            <p> </p>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </section>




@endsection