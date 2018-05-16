@extends('layouts.app')

@section('content')


<section class="page-title-4 bg-secondary" style="    background: url(../images/bg4.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class=" uppercaseh3 text-uppercase mb0">{{ $group['title'] }}</h2>
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
                        <!-- report group button -->
                                    <div class="form-group">
                                        <a class="form-control btn-1 btn-lg-1 mb0 big" data-toggle="modal" data-target="#reportGroupModal">Report Group</a>
                                    </div>

                        </div>
                    @endif


                    <div class="modal fade" id="leave" role="dialog">

                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Are you sure that you want to leave this group?</h4>
                            </div>
                            <div class="modal-body">
                                <a class="form-control m-btn big red" href="{{ url('/group/leave/'.$group['id']) }}">Leave</a>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="modal fade" id="myModal" role="dialog">

                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Join this group</h4>
                            </div>
                            <div class="modal-body">
                              <p>Join this group and meet more people with the same hobby!</p>
                            </div>
                            <div class="modal-footer">
                              <a class="form-control m-btn big red" href="{{ url('/group/join/'.$group['id']) }}">Join</a>
                            </div>
                          </div>
                      </div>

                    </div>
<!-- report event popup  -->
                    <div class="modal fade" id="reportGroupModal" role="dialog">
                        <form method="get" action="{{ url('/group/report/'.$group['id']) }}">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Report this Group</h4>
                            </div>
                            <div class="modal-body">
                              <label class="control-label">Reason to report</label>
                              <textarea class="form-control" placeholder="Reasons for reporting this event" name="report" required></textarea>

                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="form-control m-btn big red">Report this Group</button>
                            </div>
                          </div>
                      </div>
                    </form>
                    </div>
                    <!-- end of report event -->



                           
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
          <h2 class="pt-b">Title:&nbsp;&nbsp; {{ $group['title'] }}</h2>
          
          <h4 class="pt-b" style="padding-bottom:0px;margin-bottom:0px;padding-top:40px;font-weight:bold;">Description: </h4>
          <div class="pt-b" style="word-break:break-all">{{$group['description']}}</div>
                            
                            <hr>
                        
                </div>
      </div>
<!--                 <div class="col-md-4 responsive-wrap mt-4">
                    <div class="joining_wrap smt-4">
                        
                        
                    </div>
                </div> -->

                <div class="col-md-8 responsive-wrap mt-4">

                    <div class="joining_wrap">
                        <h3>Members</h3>


                    <div class="row">
                      <div class="col-lg-2" style="margin-right: 10px">

                        <span class="img-circle text-center members">
                          Test

                        </span>
                      </div>
                      <div class="col-lg-2" style="margin-right: 10px">

                        <span class="img-circle text-center members">
                          Test

                        </span>
                      </div>
                      <div class="col-lg-2" style="margin-right: 10px">

                        <span class="img-circle text-center members">
                          Test

                        </span>
                      </div>
                    </div>
                                
                    </div> <!-- end joining wrap -->
                </div>  <!-- end members  -->
            

            </div> <!-- end row -->

        </div> <!-- end container -->
    </section>




@endsection