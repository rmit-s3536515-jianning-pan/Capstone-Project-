@extends('layouts.app')

@section('content')


<header class="bg-primary text-white banner size" style="background-image: url(../../images/k.jpg); font-family: Dosis, arial, sans-serif; letter-spacing: 0.2em;">
  <div class="container text-center title">
    <h1>Welcome to Encounter</h1>
    <p class="lead"></p>
    <ul class="actions">
      <li><a href="#event-index" class="start-btn btn-xl js-scroll-trigger" style="color:white !important">Get Started</a></li>
    </ul>
  </div>
</header>


<!-- <section id="about">
    <div class="container">
      <div class="row row-clear">
        <div class="col-lg-12 mx-auto text-center">
          <h4>Expand your horizons with Encounter</h4>
          <h2 class="text-uppercase">With Encounter, you'll...</h2>
          <hr class="my-4">
          <p class="lead"></p>
        </div>
      </div>
</section>

<section id="two" class="wrapper style1 spotlight alt">
  <div class="content col-sm-4">
      <div class="inner">
          <h2>Encounter like minded people</h2>
      </div>
  </div>
  <div class="image" style="background-image: url(images/l.jpg); background-position: 30% 30%;"><img src="images/l.jpg" data-position="30% 30%" alt="" style="display: none;">
  </div>
</section>

<section id="three" class="wrapper style2 spotlight">
  <div class="content">
    <div class="inner">
      <h2>Encounter new experiences</h2>
    </div>
  </div>
  <div class="image" style="background-image: url(images/k.jpg); background-position: right center;"><img src="images/k.jpg" data-position="center right" alt="" style="display: none;">
  </div>
</section>

<section id="three" class="wrapper style3 spotlight alt">
  <div class="content">
      <div class="inner">
          <h2>Learn something new</h2>
      </div>
  </div>
  <div class="image" style="background-image: url(images/m.jpg); background-position: 30% 30%;"><img src="images/m.jpg" data-position="30% 30%" alt="" style="display: none;">
  </div>
</section> -->

<!--about the event -->
<!-- <section id="about-e" class="pt100 pb100">
    <div class="container ">
        <div class="section_title ">
            <h3 class="title col-sm-10 col-sm-offset-1">
                About
            </h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-sm-offset-1">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing eli. Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
                </p>
            </div>

        </div>
    </div>
</section> -->
<!--about the event end -->


<section id="event-index" class="lis-bg-light" >
  <div class="container">
    <div class="row row-clear ">
        <div class="section_title">
            <h3 class="title col-sm-10 col-sm-offset-1">
                Featured Events 
            </h3>
            <h4 class="section-description col-sm-10 col-sm-offset-1">Discover & connect with Events based on your interests</h4>
        </div>
      </div>
  </div>

  <div class="container">
    <div class="row col-sm-10 col-sm-offset-1">
          @include('_eventContainer')
    </div>
  </div>
</section>


<!-- <section class="image-square left">
  <div class="col-md-6 image">
      <div class="background-image-holder fadeIn" style="background: url(../../images/t.jpg);">
          <img alt="image" class="background-image" src="images/vent2.jpg" style="display: none;">
      </div>

  </div>
  <div class="clearfix"></div>
  <div class="col-md-6 col-md-offset-1 content">
      <h3 class="uppercase">Experience your next
          <br> Adventure Today.</h3>
      <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
          <br> do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </p>
      <ul class="bullets mb40 mb-xs-24">
          <li>All Inclusive Packages</li>
          <li>Multi-Night Stays</li>
          <li>Equipment Provided</li>
      </ul>
      <a class="btn btn-lg bg-dark mb0" href="#">Book A Tour</a>
  </div>

</section>

 -->
<section class="banner ban-image" style="background-image: url(../../images/n.jpg)">

</section>




@include('_listCatergoriesIcon')


<!--     <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger"><span class="ti-plus"></span> ADD LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<div class="get-it">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center p-3">
          <h3>Experience your next adventure today!</h3>
        </div>
        <div class="col-lg-4 text-center p-3">   <a href="#" class="btn-2 btn-template-outlined-white-2 btn-xl">Sign Up</a></div>
      </div>
    </div>
  </div>


<script type="text/javascript">
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 700);
        return false;
      }
    }
  });
    </script>


@endsection


