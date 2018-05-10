
@extends('layouts.app')

@section('content')

<div class="panel-body">
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">My Event Page</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4>My Events List</h4>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <table width="100%" class="table table-striped table-bordered " >
                          <thead>
                              <tr>
                                  <th class="col-md-6" style="text-align:center">Event Name</th>
                                  <th style="text-align:center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($own as $ownedEvent)
                              <tr>
                                  <td><h5><a href="{{ url('event/'.$ownedEvent->id ) }}">{{ $ownedEvent->title }}</h5></td>
                                  <div class="row col-md-9">
                                    <td>
                                      <div class="col-md-6" style="padding-left:0px;padding-right:3px">
                                        <button type="submit" class="btn btn-outline btn-primary btn-block btn-primary" data-toggle="modal" data-target="{{ '#'.$ownedEvent->id }}">Edit</button>
                                      </div>
                                      <div class="col-md-6" style="padding-left:3px;padding-right:0px">
                                        <button type="submit" class="btn btn-outline btn-primary btn-block btn-danger" onclick="location.href = '/deleteEvent/{{ $ownedEvent->id }}';">Delete</button>
                                      </div>
                                    </td>
                                  </div>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <!-- /.table-responsive -->
                  </div>
              </div>
          </div>
      </div>
  </div>

    <div id="page-wrapper">
    <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Joined Events List</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-md-6" style="text-align:center">Event Name</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($joined as $joinedEvent)
                                <tr>
                                    <td><h5><a href="{{ url('event/'.$joinedEvent->id ) }}">{{ $joinedEvent->title }}</h5></td>
                                    <td>
                                      <button type="submit" class="btn btn-outline btn-primary btn-block btn-danger" onclick="location.href = '/leaveEvent/{{ $joinedEvent->event_id }}';">Leave</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @foreach($own as $ownedEvent)
<!-- Modal -->
<div class="modal fade" id="{{ $ownedEvent->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Event Details</h4>
            </div>
            <form role="form" method="POST" action="{{ route( 'updateEvent' ) }}"> {{ csrf_field() }}
              <input type='hidden' name='id' value='{{ $ownedEvent->id }}'>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="control-label">Event Name</label>
                      <div>
                          <input type="text" name="title" class="form-control input-lg"  value="{{ $ownedEvent->title }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Event Date</label>
                      <div>
                          <input type="text" class="datepicker form-control input-lg" name="start_date" data-large-mode="true" data-lock="from" data-large-default="true" data-modal="true" value="{{ $ownedEvent->start_date }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Event Time</label>
                      <div>
                          <input type="text" name="start_time" class="form-control input-lg" id="timepicker" value="{{ $ownedEvent->start_time }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Max Attendees</label>
                      <div>
                          <input class="textField form-control input-lg"  name="max_attend" maxlength="2" data-mask-as-number-min="5" data-mask-as-number-max="30" value="{{ $ownedEvent->max_attend }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Event Description</label>
                      <div>
                          <textarea class="form-control" style="resize:vertical" rows="5" name="description" min="30" max="1000"  required>{{ $ownedEvent->description }}</textarea>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
@endforeach
<script type="text/javascript">
	$('.datepicker').dateDropper();
</script>

<script type="text/javascript">
	$('.textField').maskAsNumber();
</script>

<script type="text/javascript">
	$('#timepicker').timepicker();
</script>
@endsection
