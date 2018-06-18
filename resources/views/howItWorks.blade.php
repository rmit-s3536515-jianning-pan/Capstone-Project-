@extends('layouts.app')


@section('content')
 <section class="page-title page-title-2 image-bg overlay parallax">
    <div class="background-image-holder fadeIn" style="transform: translate3d(0px, 0px, 0px); background: url(../../images/f.jpg); top: -100px;">
        <img alt="Background Image" class="background-image" src="images/home7.jpg" style="display: none;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="uppercase mb8">How Encounter Works</h2>
            </div>
            <div class="col-md-6 text-right">
                <ol class="breadcrumb breadcrumb-2">
                    
                    
                    <li class="active">How it works</li>
                </ol>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>



<!-- <section class="flat-row flat-introduce">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="introduce-header">
					<p>
						Description
					</p>
				</div>
			</div>
		</div>
	</div>
</section> -->

<section style="padding: 0px 0; ">
	<div class="block gray " style="background-color: grey; background-image: url('../../images/grad6.jpg'); ">
		<div class="container" >
	<div class="row">
		<div class="col-lg-5">
			<div class="section-title text-white">
				<h3>How to Get started?</h3>
				<!-- <p>Get started with us to explore the exciting</p> -->
			</div>
			<div class="enroll-list text-white">
				<div class="enroll-list-item">
					<span>1</span>
					<h5>Register for an Account</h5>
					<p>Fill up a piece of information with username and email and password. It goes to next process after this.</p>
				</div>
				<div class="enroll-list-item">
					<span>2</span>
					<h5>Choose your preferences</h5>
					<p>Choose your preferred interest in this part. You have to choose at least 4 preferred interest. It will successfully register for user after this.</p>
				</div>
				<div class="enroll-list-item">
					<span>3</span>
					<h5>Be matched to an event for you</h5>
					<p>After registration, it goes to home page. It will show matched events with users' preferences.</p>
				</div>
			</div>
		</div>
		<div class="col-lg-6 offset-lg-1 p-lg-0 p-4">
			<img src="images/m.jpg" alt="">
		</div>
	</div>
</div>
	</div>
</section>



@endsection