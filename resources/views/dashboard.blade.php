@extends('admin')

@section('content')

 <!-- <section class="content-header"> -->
<section class="content-header">
    <h2><strong>Dashboard</strong></h2>
    <div class="row">
        <!-- <div class="col-md-12"> -->
        <ul class="breadcrumb" style="background-color: inherit; font-size: 15px">
              <li><a href="{{ url('/admin') }}">Home</a></li>
              <li></li>
        </ul>
    </div>
</section>

<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Preference Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Parent Preferences</th>
                <th>Child Preferences</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($parents as $p)
            <tr>
                <td>{{ $p->cat_name }}</td>
                      <td>
                        @foreach($children as $c)
                        @if($c->cate_id == $p['original']['id'])
                        <li>{{ $c->name }}</li>
                        @endif
                        @endforeach
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
@endsection
