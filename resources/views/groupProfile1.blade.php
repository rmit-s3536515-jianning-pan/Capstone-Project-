@extends('layouts.app')

@section('content')
<section >
				<div class="container">
					<div class="row">

						<a href="#" class="text-white">
                            <div class="media d-block d-md-flex text-md-left text-center"> <img src="dist/images/profile-2.png" class="img-fluid d-md-flex mr-4 border border-white lis-border-width-4 rounded mb-4 mb-md-0" alt="">
                                <div class="media-body align-self-center">
                                    <h2 class="text-white font-weight-bold lis-line-height-1">Timeout 72 Hours</h2>
                                    <p class="mb-0">Place here yore event tag line...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        </section>
        <!--End Profile Cover -->
        <!-- Profile header -->
        <div class="profile-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-6 order-xl-1 order-2 text-xl-right text-center">
                        <ul class="nav nav-pills flex-column flex-sm-row lis-font-poppins" id="myTab" role="tablist">
                            <li class="nav-item ml-0"> <a class="nav-link lis-light py-4 lis-relative mr-3 active"> Venue Details</a> </li>
                           
                        </ul>
                    </div>
		        </div>
		    </div>
        <!-- End header -->
<!-- Profile Content -->
        <section class="lis-bg-light pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                        <div class="tab-content" id="myTabContent">
                            
                                <h6 class="lis-font-weight-500"><i class="fa fa-align-right pr-2 lis-f-14"></i> Description</h6>
                                <div class="card lis-brd-light mb-4 wow fadeInUp" >
                                    <div class="card-body p-4">
                                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-12 col-lg-4">
					<h6 class="lis-font-weight-500"><i class="fa fa-clock-o pr-2 lis-f-14"></i> Schedule</h6>
                        <div class="card lis-brd-light mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="card-body p-4">
                                <button class="text-btn bg-transparent border-0  w-100 text-left collapsed px-0 lis-light" data-toggle="collapse" data-target="#demo"><span class="lis-light-green font-weight-bold">Event Date</span> : November 13 - 15 </button>
                            </div>
                    	</div>
                    <h6 class="lis-font-weight-500"><i class="fa fa-tags pr-2 lis-f-14"></i> Categories</h6>
                        <div class="card lis-brd-light mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="card-body p-4">
                                <ul class="list-inline mb-0 lis-light-gold font-weight-normal h4">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <div class="lis-bg4 lis-icon lis-rounded-circle-50 text-center">
                                                <div class="text-white mb-0 lis-line-height-2_5 h4"><i class="icofont icofont-fast-food"></i></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <div class="lis-bg1 lis-icon lis-rounded-circle-50 text-center">
                                                <div class="text-white mb-0 lis-line-height-2_5 h4"><i class="icofont icofont-hotel-alt"></i></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <div class="lis-bg2 lis-icon lis-rounded-circle-50 text-center">
                                                <div class="text-white mb-0 lis-line-height-2_5 h4"><i class="icofont icofont-beer"></i></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
				</div>


                </div>
            </div>


</section>



@endsection