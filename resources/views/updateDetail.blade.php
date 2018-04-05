@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Update Details</div>

          <div class="panel-body">
            <form method="post" action="{{ route('insert') }}">
              {{ csrf_field() }}
                Name : <input type="text" name="name" value="{{ Auth::user()->name }}"><br><br>
                Email : <input type="email" name="email" value="{{ Auth::user()->email }}"><br><br>
                Date of Birth : <input type="date" name="dob" value="{{ Auth::user()->dob }}"><br><br>
                Gender : <Select name="gender" value="{{ Auth::user()->gender }}">
                            <option value="Male">Male</option>
                            <option value"Female">Female</option>
                        </select>
                        <br><br>
                Address : <input type="text" name="address" style="width:400px;" value="{{ Auth::user()->address }}"><br><br>
                Bio : <input type="text" name="bio" style="width:500px; height:50px;" value="{{ Auth::user()->bio }}"><br><br>

                <input type="submit" value"Update" class="form-control"><br>
            </form>

          </div>
        </div>
      </div>
  </div>
</div>

@endsection
