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
                Name : <br>
                <input type="text" name="name" value="{{ Auth::user()->name }}"><br><br>
                Email : <br>
                <input type="email" name="email" value="{{ Auth::user()->email }}"><br><br>
                Date of Birth : <br>
                <input type="date" name="dob" value="{{ Auth::user()->dob }}"><br><br>
                Gender : <br>
                <Select name="gender" value="{{ Auth::user()->gender }}">
                            <option value="Male">Male</option>
                            <option value"Female">Female</option>
                        </select>
                        <br><br>

                Address : <br>
                <input type="text" name="address" style="width:400px;" value="{{ Auth::user()->address }}"><br><br>

                <p><h4><b>Preferences :</b></h4></p><hr>


                <div class="form-group">
                     
                     <select class="js-example-basic-multiple  form-control" name="pref[]" multiple="multiple">
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
                     <button type="submit" value="Update" class="form-control m-btn red ">Update</button>
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


