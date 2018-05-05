@extends('layouts.app')

@section('content')

<div class="panel-body">
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">My Group Page</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4>My Groups List</h4>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th class="col-md-6" style="text-align:center">Group Name</th>
                                  <th style="text-align:center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($own as $ownedGroup)
                              <tr>
                                  <td><h5>{{ $ownedGroup->title }}</h5></td>
                                  <div class="row col-md-9">
                                    <td>
                                      <div class="col-md-6" style="padding-left:0px;padding-right:5px"><button type="submit" class="btn btn-outline btn-primary btn-block btn-primary" data-toggle="modal" data-target="{{ '#'.$ownedGroup->id }}">Edit</button></div>
                                      <div class="col-md-6" style="padding-left:5px;padding-right:0px"><button type="submit" class="btn btn-outline btn-primary btn-block btn-danger" onclick="location.href = '/deleteGroup/{{ $ownedGroup->id }}';">Delete</button></div>
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
                        <h4>Joined Groups List</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-md-6" style="text-align:center">Groups Name</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($joined as $joinedGroup)
                                <tr>
                                    <td><h5>{{ $joinedGroup->title }}</h5></td>
                                    <td>
                                      <button type="submit" class="btn btn-outline btn-primary btn-block btn-danger" onclick="location.href = '/leaveEvent/{{ $joinedGroup->group_id }}';">Leave</button>
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

@foreach($own as $ownedGroup)
<!-- Modal -->
<div class="modal fade" id="{{ $ownedGroup->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update Group Details</h4>
            </div>
            <form role="form" method="POST" action="{{ route( 'updateGroup' ) }}"> {{ csrf_field() }}
              <input type='hidden' name='id' value='{{ $ownedGroup->id }}'>
            <div class="modal-body">
              <div class="form-group">
                  <label class="control-label">Group Name</label>
                  <div>
                      <input type="text" name="title" class="form-control input-lg"  value="{{ $ownedGroup->title }}">
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label">Group Description</label>
                  <div>
                      <textarea class="form-control" style="resize:vertical" rows="5" name="description" min="30" max="1000"  required>{{ $ownedGroup->description }}</textarea>
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

@endsection
