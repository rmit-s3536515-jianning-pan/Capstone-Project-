<!-- search box start -->
    <div class="container-fluid bg-primary search">
        <form class="col-md-8 col-md-offset-2" method="get" action="{{ url('event/showall') }}">
            <div class="row">
                <div class="col-md-5 margin-t-b">
                    <label for="keywords">Name</label>
                    <div class="input-group input-group-lg">
                        <input type="text" name="keywords" class="form-control" placeholder="Enter keywords">
                    </div>
                </div>
                <div class="col-md-5 margin-t-b">
                    <label>Classification</label>
                    <div class="dropdown btn-group btn-group-lg">
                        <button class="btn btn-lg btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Any Classification<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                        </button>

                        <ul class="dropdown-menu scrollable-menu" id="main-menu">
                            @foreach ($categories as $cate)
                                <li class="item">
                                   <!--  <label class="check">{{ $cate->cat_name}}
                                     <input type="checkbox" name="categories[]" value="{{ $cate->id}}">
                                         <span class="checkmark"></span>
                                      </label> -->
                                    <a href="#" data-value="{{ $cate->cat_name }}" tabIndex="-1" class="{{$cate->id}}"><input type="checkbox" name="categories[]" value="{{ $cate->id}}"><span>{{ $cate->cat_name}}</span></a>
                                   
                                        <ul class="subcatmenu"> 
                                            <!-- <li><a href="#" ><input type="checkbox" id="checkAll"><span>Check All</span></a></li> -->
                                            @foreach ($subs as $sub)
                                                @if ($sub->cate_id==$cate->id)   
                                            <li>
                                               <a href="#" data-value="{{ $sub->name }} " tabIndex="-1" ><input type="checkbox" name="subs[]" value="{{ $sub->id}}"><span>{{ $sub->name}}</span></a>
                                            </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 margin-t-b">
                    <label class="invisible">hidden</label>
                    <div class="input-group input-group-lg">
                        <button type="submit" class="btn btn-success btn-lg" style="width:100%">Search</button>
                    </div>
                    
                </div>
            </div>

            </div>
        </form>
    </div>
    <!-- search box ends -->