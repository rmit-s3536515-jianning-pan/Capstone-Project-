<!-- search box start -->
    <div class="container-fluid search search-bar">
        <form class="col-md-8 col-md-offset-2" method="get" action="{{ url('event/showall') }}">
            <div class="row">
                <div class="col-md-5 margin-t-b">
                    <label for="keywords">Name</label>
                    <div class="input-group input-group-lg">
                        <input type="text" name="keywords" class="form-control" placeholder="Keywords">
                    </div>
                </div>
                <div class="col-md-5 margin-t-b">
                    <label>Classification</label>
                    <div class="input-group input-group-lg">
                        <select class="selectpicker" multiple="multiple" name="subs[]"  data-selected-text-format="count" data-actions-box="true"
                        data-size="8" title="All Categories">
                            @foreach ($categories as $cate)
                                <optgroup label="{{ $cate->cat_name }}" title="{{ $cate->cat_name}}" > 
                                     @foreach ($subs as $sub)
                                                @if ($sub->cate_id==$cate->id)   
                                            <option value="{{ $sub->id}}">
                                                {{ $sub->name}}
                                            </option>>
                                               
                                                @endif
                                    @endforeach
                                </optgroup> 
                                   <!--  <label class="check">{{ $cate->cat_name}}
                                     <input type="checkbox" name="categories[]" value="{{ $cate->id}}">
                                         <span class="checkmark"></span>
                                      </label> -->
                                   
                            @endforeach
                        </select>   

                       
                            
                        
                    </div>
                </div>


                <div class="col-md-2 margin-t-b">
                    <label class="invisible">hidden</label>
                    <div class="input-group input-group-lg">
                        <button type="submit" class="btn btn-success btn-lg start-btn" style="width:100%">Search</button>
                    </div>
                    
                </div>
            </div>

            </div>
        </form>
    </div>
    <!-- search box ends -->