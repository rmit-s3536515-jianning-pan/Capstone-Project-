@extends('admin')

@section('content')
 <!-- <section class="content-header"> -->
    <div class="container">
       <h2><strong>Preferences</strong></h2>
      <div class="row">

          <!-- <div class="col-md-12"> -->

          <ul class="breadcrumb" style="background-color: inherit; font-size: 15px">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li>Preferences</li>
          </ul>
        <!-- </div> -->
      </div>


@if (Session::has('parentMessage'))
   <div class="alert alert-success col-md-10">{{ Session::get('parentMessage') }}</div>
@endif
       @if (Session::has('childMessage'))
   <div class="alert alert-success col-md-10">{{ Session::get('childMessage') }}</div>
@endif
        @if (Session::has('parentErrorMessage'))
   <div class="alert alert-danger col-md-10">{{ Session::get('parentErrorMessage') }}</div>
@endif
@if (Session::has('childErrorMessage'))
   <div class="alert alert-danger col-md-10">{{ Session::get('childErrorMessage') }}</div>
@endif
@if (Session::has('parentDeleteMessage'))
   <div class="alert alert-success col-md-10">{{ Session::get('parentDeleteMessage') }}</div>
@endif
@if (Session::has('childDeleteMessage'))
   <div class="alert alert-success col-md-10">{{ Session::get('childDeleteMessage') }}</div>
@endif

    <!-- start of add parent name     -->
      <div class="row" style="margin-bottom: 20px">
          <div class="col-md-6 col-md-offset-2"  style="background-color: #fff; box-shadow: 3px 3px 1px #ccc">
              <h3><strong>Add Parent</strong></h3>
               <form class="form-horizontal" action="{{ route('addParentName') }}">
                {{ csrf_field() }}
                  <div class="form-group">

                <label class="control-label col-md-4"  style="text-align: left">Parent Category Name</label>
                <div class="col-md-8">
                <input type="text" name="catname" class="form-control" required>
              </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
          <button class="btn btn-primary" style="margin-bottom: 10px">Add the Parent Name</button>
        </div>

        </div>

               </form>
          </div>
      </div>
      <!-- end of add parent name -->

      <!-- start of add child name -->
      <div class="row" style="margin-bottom: 20px">

          <div class="col-md-6 col-md-offset-2"  style="background-color: #fff; box-shadow: 3px 3px 1px #ccc">
            <h3><strong>Add Child</strong></h3>

            <form class="form-horizontal" action="{{  route('addChildName')}}">

            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label" style="text-align: left">Category Name</label>
              </div>
                <div class="col-md-8">
                    <select class="category form-control" name="category">
                      @foreach($categories as $cates)
                        @if($cates->id==1){
                        <option value="{{ $cates->id}}" selected>{{ $cates->cat_name }}</option>
                      }
                      @else
                         <option value="{{ $cates->id}}">{{ $cates->cat_name }}</option>
                      @endif
                      @endforeach
                    </select>
                 </div>
              </div>

            <!--   @foreach($categories as $cates)

               <div class="form-group subcates" id="{{ $cates->id }}">
                   <label class="control-label col-md-4" style="text-align: left"> Sub Category</label>
                    <div class="col-md-8">
                      <select class="category form-control" name="subs" >
                        @foreach($subs as $sub)
                            @if($cates->id==$sub->cate_id)
                                <option value="{{ $sub->id}}">{{ $sub->name}}</option>
                            @endif

                        @endforeach
                      </select>
                    </div>
                  </div>

              @endforeach -->

            <div class="form-group">
                <label class="control-label col-md-4"  style="text-align: left">Child Category Name</label>
                <div class="col-md-8">
                <input type="text" name="childname" class="form-control" required>
              </div>


          </div>

          <div class="form-group">
             <div class="col-md-4 col-md-offset-4">
          <button class="btn btn-primary" style="margin-bottom: 10px">Add the Sub Category Name</button>
        </div>

        </div>
          </form>

      </div>

    </div>
    <!-- endof add child name  -->

    <!-- start of deleting parent form -->
  <div class="row" style="margin-bottom: 20px">
          <div class="col-md-6 col-md-offset-2"  style="background-color: #fff; box-shadow: 3px 3px 1px #ccc">
              <h3><strong>Delete Parent</strong></h3>
               <form class="form-horizontal" action="{{ route('deleteParentName') }}">
                {{ csrf_field() }}
                  <div class="form-group">
                <label class="control-label col-md-4" style="text-align: left">Category Name To Delete</label>
                <div class="col-md-8">
                    <select class="category form-control" name="deleteCategory">
                      @foreach($categories as $cates)
                        @if($cates->id==1){
                        <option value="{{ $cates->id}}" selected>{{ $cates->cat_name }}</option>
                      }
                      @else
                         <option value="{{ $cates->id}}">{{ $cates->cat_name }}</option>
                      @endif
                      @endforeach

                    </select>
                 </div>
              </div>
               <div class="form-group">
                   <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-primary" style="margin-bottom: 10px">Delete the Parent Name</button>
                  </div>

            </div>
        </form>
              </div>
              </div>
             <!-- endof delete parent name -->


          <!-- start of deleting child form -->
  <div class="row" style="margin-bottom: 20px">
          <div class="col-md-6 col-md-offset-2"  style="background-color: #fff; box-shadow: 3px 3px 1px #ccc">
              <h3><strong>Delete Child</strong></h3>
               <form class="form-horizontal" action="{{ route('deleteChildName') }}">
                {{ csrf_field() }}
                  <div class="form-group">
                <label class="control-label col-md-4" style="text-align: left">Child Name To Delete</label>
                <div class="col-md-8">
                    <select class="category form-control" name="deleteChild">
                      @foreach($categories as $cates)
                        @if($cates->count()!=0)
                       <optgroup label="{{ $cates->cat_name }}">
                           @foreach($subs as $sub)

                            @if($sub->cate_id==$cates->id)
                              <option value="{{ $sub->id}}" selected>{{ $sub->name}}</option>
                            @endif
                          @endforeach
                       </optgroup>
                       @endif
                      @endforeach

                    </select>
                 </div>
              </div>
               <div class="form-group">
                 <div class="col-md-4 col-md-offset-4">
                      <button class="btn btn-primary" style="margin-bottom: 10px">Delete the Child Name</button>
                </div>

            </div>
        </form>
              </div>
              </div>
             <!-- endof delete child name -->
              </div>

<!-- </section> -->
<script type="text/javascript">
    $(document).ready(function() {
    $('.category').select2();
});
</script>

<script type="text/javascript">
    $('.subcates').hide();
    var id = $('#selectedCat').find('option:selected').val();
    $('#'+id).show();
    $('#selectedCat').change(function(){

      var selected = $(this).find('option:selected').val();
        $('.subcates').hide();
        // console.log('#'+selected);
        // console.log($('#'+selected).find("select"));
        $('#'+selected).show();
        // if($('#'+selected).is("is:selected")){
        //     $('#'+selected).hide();
        // }
        // else{

        //   $('#'+selected).show();

        // }

    });
</script>
@endsection
