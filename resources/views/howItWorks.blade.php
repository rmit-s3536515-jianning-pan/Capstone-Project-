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



<section class="flat-row flat-introduce">
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
</section>

<section>
		<div class="block gray ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="how-it-works" style="padding-top: 10px">
							<div class="work-icon"> <img src="images/icon1.png" alt=""> </div>
							<div class="work-detail">
								<h3>Register an Account</h3>
								<p>Fill up a piece of information with username and email and password. It goes to next process after this.</p>
								<span class="number">01</span>
							</div>
						</div><!-- How it Works -->
						<div class="how-it-works" style="padding-top: 10px">
							<div class="work-icon"> <img src="images/icon2.png" alt=""> </div>
							<div class="work-detail">
								<h3>Choose your preferences</h3>
								<p>Choose your preferred interest in this part. You have to choose at least 4 preferred interest. It will successfully register for user after this.</p>
								<span class="number">02</span>
							</div>
						</div><!-- How it Works -->
						<div class="how-it-works" style="padding-top: 10px">
							<div class="work-icon"> <img src="images/icon3.png" alt=""> </div>
							<div class="work-detail">
								<h3>Be matched to an event for you</h3>
								<p>After registration, it goes to home page. It will show matched events with users' preferences.</p>
								<span class="number">03</span>
							</div>
						</div><!-- How it Works -->
					</div>
				</div>
			</div>
		</div>
	</section>



@endsection