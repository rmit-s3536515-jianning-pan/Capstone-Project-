@extends('layouts.app')


@section('content')

 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/home7.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">Plan An Event</h2>
                <p class="lead mb0">...</p>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    <li>
                        <a href="{{ url('/index') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Event</a>
                    </li>
                    <li class="active">Create an Event</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


<section>
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="feature boxed bg-secondary">
            <form class="form-listing text-center" role="form" method="POST" action="{{ url('/event/create') }}">
                {{ csrf_field() }}
                <h4 class="uppercase mt48 mt-xs-0">Create your Event</h4>
                <p class="lead mb64 mb-xs-24">
                    Share a little detail about your event so we
                    <br> can connect you to other people alike.
                </p>
                <div class="overflow-hidden">
                    <hr>
                    <h6 class="uppercase">
                        1. What will the Event's name be?
                    </h6>
                    <input type="text" name="name" class="form-padding form-control col-md-offset- " placeholder="Your Event Name" required>
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        2. How many people can attend this event?
                    </h6>
                    <input class="form-padding textField form-control" name="max" maxlength="2"
            data-mask-as-number-min="5" data-mask-as-number-max="30"
            placeholder="Minimum 5">
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        3. When will this event happen?
                    </h6>
                    <div class="form-group col-md-6" style="width:50%;margin: 0 auto; margin-bottom: 15px;">
                    <input type="text"  class="form-padding datepicker form-control" name="event_date" placeholder="date" data-large-mode="true" data-lock="from" data-large-default="true" data-modal="true" required>
                    </div>

                    <div class="form-group col-md-6" style="width:50%;margin: 0 auto; margin-bottom: 15px;">
                    
                        <!-- <input type="hidden" name="event_time" class="form-control"> -->
                        <input type="text" name="event_time" class="form-padding form-control" id="timepicker" placeholder="12:00" required>
                    <!-- </div> -->
                    
                    </div>
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <h6 class="uppercase">
                        4. What will your group be about?
                    </h6>
                        @foreach($categories->chunk(3) as $cate)
                            <div class="row">
                                @foreach($cate as $c)
                                <div class="col-md-4 margin-t-b">
                                <div class="form-group cate-options ">                          <select class="selectpicker form-control" name="pref[]" multiple="" title="{{$c['original']['cat_name']}}" data-selected-text-format="count" data-size="5" data-actions-box="true">
                                
                                @foreach($subs as $sub)
                                    @if($sub->cate_id==$c['original']['id'])
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        </div>
                                @endforeach
                            
                            </div>
                        
                
                    @endforeach
                    <hr>
                </div>
                <div class="overflow-hidden">
                    <div class="col-md-12 inner-box form-">
                        <h6 class="uppercase">
                            4. Describe who should join, and what you will do.
                        </h6>
                        <textarea class="desc-box form-control resizeable" rows="5" name="description" min="30" max="1000" placeholder="Description of your event" required></textarea>
            
                    </div>
                    <div class="form-group col-md-6">
            <button class="m-btn blue ">
                Submit<span class="glyphicon glyphicon-chevron-right"></span>
            </button>
                </div>

                
        </div>

            </form>
        </div>

    </div>

</section>

<script type="text/javascript">
    $('.datepicker').dateDropper();
</script>

<script type="text/javascript">
    $('.textField').maskAsNumber();
</script>
<script type="text/javascript">
    $('#timepicker').timepicker();
</script>
@endsection