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
                @foreach($data as $cate)
                <?php $check =null; ?>
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
                     <?php $check = $checked->category_id; ?>
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
                @endforeach

                <input type="submit" value"Update" class="form-control"><br>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>

@endsection
