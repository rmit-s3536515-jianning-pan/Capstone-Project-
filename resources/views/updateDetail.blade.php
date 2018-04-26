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
<<<<<<< HEAD
=======
                <!--@foreach($data as $cate)
                 @php $check =null; @endphp
                  @foreach($selected as $checked)
                    @if($cate->id == $checked->category_id)
                      <div class="form-group col-md-4">
                        <input type="checkbox" name="cates[]" id="{{ $cate->id }}" autocomplete="off" value="{{ $cate->id }}" checked/>
                        <div class="btn-group">
                             <label  class="btn btn-default">
                                <span class="glyphicon glyphicon-ok"></span>
                                 <span> </span>
                            </label>
                           <label for="{{ $cate->id }}" class="btn btn-default active">
                              {{ $cate->cat_name }}
                           </label>
                         </div>
                      </div>
                     @php $check = $checked->category_id; @endphp
                     @break
                    @endif
                  @endforeach
                  @if ($check != $cate->id)
                     <div class="form-group col-md-4">
                     <input type="checkbox" name="cates[]" id="{{ $cate->id }}" autocomplete="off" value="{{ $cate->id }}"/>

                       <div class="btn-group">
                            <label  class="btn btn-default">
                               <span class="glyphicon glyphicon-ok"></span>
                                <span> </span>
                           </label>
                          <label for="{{ $cate->id }}" class="btn btn-default active">
                             {{ $cate->cat_name }}
                          </label>
                        </div>
                      </div>
                  @endif
                @endforeach-->
>>>>>>> ac69e84012dbbd735fc86530cd3cb2c1a2c73849

<<<<<<< HEAD
                <div class="form-group">
                     
                     <select class="js-example-basic-multiple form-control  " name="pref[]" multiple="multiple">
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
=======
                <input type="submit" value="Update" class="form-control"><br>
>>>>>>> 9fb14e4d5cb6cba1725bd6ff64c075b966a85e7f
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Add interests"
    });
});
</script>
@endsection


