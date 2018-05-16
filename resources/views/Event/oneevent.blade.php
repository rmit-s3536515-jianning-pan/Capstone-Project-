@extends('layouts.app')

@section('content')

<!-- <section id="inner-banner-2">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <div class="inner_banner_2_detail">
                        <h1>Event Page</h1>
                        <h4>Organizer: <em>{{ $owner->name }}</em></h4>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<section class="page-title-4 bg-secondary" style="    background: url(../images/bg4.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class=" uppercaseh3 text-uppercase mb0">{{ $event['title'] }}</h2>
                <h4>Organizer: <em>{{ $owner->name }}</em></h4>
            </div>
            
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<!--     <section class="banner ban-image"></section>
 -->
    <section class="reserve-block">
        <div class="container">
            @if(Session::has('message'))
        <div class="alert alert-success text-center">
            <h4><em>{{Session::get('message')}}</em><h4>
        </div>
    @endif
            <div class="row">

                <div class="col-md-12">
                    <div class="text-center">
                        

                    @if($owner->id != Auth::user()->id)
                    <div class="col-md-6 ">
                            @if($attend==0)
                                    <div class="form-group">
                                        <a class="form-control btn-1 btn-lg-1 mb0 big" data-toggle="modal" data-target="#myModal">Join</a>
                                    </div>
                            @elseif ($attend==1)
                                    <div class="form-group">
                                        <a class="form-control btn-1 btn-lg-1 mb0 big" data-toggle="modal" data-target="#leave">Leave</a>
                                    </div>
                            @endif
						</div>

						<div class="col-md-6">
                        <!-- report event button -->
                            @if($reported==0)
                                    <div class="form-group">
                                        <a class="form-control btn-1 btn-lg-1 mb0 big" data-toggle="modal" data-target="#reportModal">Report Event</a>
                                    </div>
                            @elseif ($reported==1)
                                    <div class="form-group">
                                        <a class="form-control btn-1 btn-lg-1 mb0 big" data-toggle="modal" data-target="#reportedModal">Report Event</a>
                                    </div>
                            @endif
                        </div>
                    @endif


                    <div class="modal fade" id="leave" role="dialog">
                        <form method="get" action="{{ url('event/'.$id.'/leave') }}">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Are you sure that you want to leave this event?</h4>
                            </div>
                            <div class="modal-body">
                                <button type="submit" class="form-control m-btn big red">Leave</button>
                            </div>
                        </div>
                    </div></form></div>


                    <div class="modal fade" id="myModal" role="dialog">
                        <form method="get" action="{{ url('event/'.$id.'/join') }}">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Join this event</h4>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to join this event?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="form-control m-btn big green">Join</button>
                            </div>
                          </div>
                      </div>
                    </form>
                    </div>

                    <!-- report event popup  -->
                    <div class="modal fade" id="reportModal" role="dialog">
                        <form method="get" action="{{ url('event/'.$id.'/report') }}">
                        <div class="modal-dialog">

                          <!-- Modal for Reporting-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Report this event</h4>
                            </div>
                            <div class="modal-body">
                              <label class="control-label">Reason to report</label>
                              <textarea class="form-control" placeholder="Reasons for reporting this event" name="report" required></textarea>

                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="form-control m-btn big red">Report</button>
                            </div>
                          </div>
                      </div>
                    </form>
                    </div>
                    <!-- end of report event -->

                    <div class="modal fade modal-danger" id="reportedModal" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal for Reported-->
                          <div class="modal-content">
                            <div class="modal-header" style="text-align:center">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Error Submiting a Report</h4>
                            </div>
                            <div class="modal-body" style="text-align:center">
                              <label class="control-label" >You've already submitted a report to this Event!</label>
                            </div>
                          </div>
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
                <div class="col-md-8 responsive-wrap mt-4">
                    <div class="joining_wrap">
					<h2 class="pt-b">Title:&nbsp;&nbsp; {{ $event['title'] }}</h2>
					
					<h4 class="pt-b" style="padding-bottom:0px;margin-bottom:0px;padding-top:40px;font-weight:bold;">Description: </h4>
					<div class="pt-b" style="word-break:break-all">{{$event['description']}}</div>
                            
                            <hr>
                        
                </div>
			</div>
                <div class="col-md-4 responsive-wrap mt-4">
                    <div class="joining_wrap smt-4">
                        <div class="address">
                            <h3 class="mini-title">Date & Location</h3>
                            <hr>
                            <h4 class="pt-b" style="padding-top:0px;margin-top:0px;">Date: &nbsp; {{$event['start_date']}}</h4>
					<h4 class="pt-b" style="padding-top:0px;margin-top:0px;">Time: &nbsp; {{ $event['start_time'] }}</h4>
                            <p> </p>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-8 responsive-wrap mt-4">

                    <div class="joining_wrap">
                        <h3>Members</h3>

                            <hr>
                            
                        @if(empty($coming))
                            <h4><em>There are no users in this event yet.</em></h4>
                        @else

                            @foreach (array_chunk($coming,6) as $e)
                                <div class="row">
                                    @foreach($e as $u)
                                    <a href="#">
                                    <div class="col-lg-2 margin-t-b" style="margin-right: 10px">

                                        <span class="img-circle text-center members">
                                            @if(strlen($u->name)< 9)
                                                {{ $u->name}}
                                            @else
                                                {{ substr($u->name,0,9) }}   <em>...</em>
                                            @endif


                                        </span>
                                    </div>
                                    </a>
                                    <!-- <div class="col-md-4">
                                        <div class="circle bg-success block">
                                            <p style="line-height: inherit; text-align: center">{{$u->name}}</p>
                                        </div>
                                    </div> -->
                                    @endforeach
                                </div>

                            @endforeach
                        @endif

                            
                            <hr>
                        
                    </div> <!-- end joining wrap -->
                </div>  <!-- end members  -->
            

            </div> <!-- end row -->

        </div> <!-- end container -->
    </section>




@endsection