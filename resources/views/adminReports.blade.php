@extends('admin')

@section('content')

 <!-- <section class="content-header"> -->
  <section class="content-header">
    <h2><strong>Manage Report</strong></h2>

    <div class="row">
        <!-- <div class="col-md-12"> -->
        <ul class="breadcrumb" style="background-color: inherit; font-size: 15px">
              <li><a href="{{ url('/admin') }}">Home</a></li>
              <li>Reports</li>
        </ul>
      <!-- </div> -->
    </div>
</section>
    <!-- Table content -->

      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Report List</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body ">
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th>Event Name</th>
                      <th>Reported Description</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($reports as $report)
                  <tr>
                      <td>{{ $report->title }}</td>
                      <td>{{ $report->report }}</td>
                      <td>
                          <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="{{ '#'.$report->id }}">Remove Event</button>
                          <button type="button" class="btn btn-block btn-danger" onclick="location.href = 'ignoreReport/{{ $report->id }}';">Ignore Report</button>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>


        @foreach($reports as $report)
        <div class="modal fade" id="{{ $report->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Remove Event</h4>
              </div>
              <div class="modal-body">
                  <p>Are you sure about removing this event permanently?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-success" onclick="location.href = 'removeEvent/{{ $report->event_id }}';">Yes</button>
              </div>
            </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        @endforeach



@endsection
