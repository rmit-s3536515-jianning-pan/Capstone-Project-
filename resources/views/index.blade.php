@extends('layouts.app')

@section('content')



<header class="bg-primary text-white banner size" style="background-image: url(../../images/k.jpg)">
  <div class="container text-center title">
    <h1>Welcome to Encounter</h1>
    <p class="lead"></p>
    <ul class="actions">
      <li><a href="#event-index" class="start-btn btn-primary btn-xl js-scroll-trigger">Get Started</a></li>
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


<section id="event-index" >
  <div class="container">
    <div class="row row-clear ">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="text-uppercase">Featured Events</h2>
            <h4>Discover & connect with Events based on your interests</h4>
            <hr class="my-4">
            <p class="lead"></p>
          </div>
        </div>
  </div>

  <div class="container">
    <div class="row">
          @include('eventContainer')
    </div>
  </div>

</section>

<!-- <section class="banner ban-image" style="background-image: url(../../images/h.jpg)">

</section> -->


<section id="services" class="bg-light">
  <div class="container">
    <div class="row row-clear">
      <div class="col-lg-12 mx-auto text-center">
        <h1>How Encounter works?</h1>
      </div>      
    </div>

    <div class="row process-content">
      <div class="col-lg-4 steps">
        <div class="item" data-item="1">
          <h5>Sign Up</h5>
          <p>Start by registering</p>
        </div>

        <div class="item" data-item="2">
          <h5>Select Preferences</h5>
          <p>Choose from a variety of topics that you are interested in</p>
        </div>
      </div> <!-- /left-side -->
    
<img class="img-fluid rounded-circle col-lg-4" src="images/q.jpg" alt="">


      <div class="col-lg-4 steps">
        <div class="item" data-item="3">
          <h5>Join Event</h5>
          <p>Be connected to events that are shown to you</p>
        </div>

        <div class="item" data-item="4">
          <h5>Meet Up</h5>
          <p>Last but not least, go to the event</p>
        </div>
      </div> <!-- /right-side -->  
    </div> <!-- /process-content --> 
   </section> <!-- /process--> 

  </div>
</section>

<!-- @include('listCatergoriesIcon')
 -->

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


