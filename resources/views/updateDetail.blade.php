@extends('layouts.app')

@section('content')

<div class="container">

  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading"><h3>Update Details</h3></div>

          <div class="panel-body">

            <form method="post" action="{{ route('insert') }}">
              {{ csrf_field() }}
                <p><h4><b>Profile :</b></h4></p><hr>
                <div class="form-group col-md-6">
                    <label>Name :</label>
                    <input type="text" name="name" class="form-control col-md-offset-" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Email : </label>
                    <input type="email" name="email" class="form-control col-md-offset-" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Date of Birth : </label>
                    <input type="date" name="dob" class="form-control col-md-offset-" value="{{ Auth::user()->dob }}">
                </div>
                <div class="form-group col-md-6">
                <label>Gender :</label>
                <Select name="gender" class="form-control col-md-offset-" value="{{ Auth::user()->gender }}">
                    <option value="Male">Male</option>
                    <option value"Female">Female</option>
                </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Address : </label>
                    <textarea type="text" name="address" class="form-control" value="{{ Auth::user()->address }}"></textarea>
                </div>
                <p><h4><b>Preferences :</b></h4></p><hr>

                @if(Session::has('minimumSelection'))
                    <div class="alert alert-warning">
                      <strong>{{Session::get('minimumSelection')}}</strong>
                    </div>
                @endif
                <div class="form-group">

                     <select class="js-example-basic-multiple form-control" name="pref[]" multiple="multiple">
                  @foreach($categories as $cate)
                    <optgroup label="{{$cate->cat_name}}">
                      @foreach($subs as $sub)
                          @if($sub->cate_id==$cate['original']['id'])
                              @if(in_array($sub->id,$selected))
                                <option value="{{$sub->id}}" selected>{{$sub->name}}</option>
                              @else
                                 <option value="{{$sub->id}}">{{$sub->name}}</option>
                              @endif
                          @endif
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>

                </div>


                <div class="form-group">
                     <button type="submit" value="Update" class="form-control m-btn blue">Update</button>
                </div>
               <br>
               <!--  <input type="submit" value="Update" class="form-control"><br> -->

            </form>
          </div>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
