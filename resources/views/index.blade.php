@extends('layouts.app')

@section('content')


  <body id="page-top">

    <header class="bg-primary text-white" id="banner">
      <div class="container text-center title">
        <h1>Welcome to Encounter</h1>
        <p class="lead"></p>
        <ul class="actions">
          <li><a href="#about" class="start-btn btn-primary btn-xl js-scroll-trigger">Get Started</a></li>
        </ul>
      </div>
    </header>


    <section id="about" class="bg-purple">
      <div class="container">
        <div class="row row-clear ">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="text-uppercase">Expand your horizons with Encounter</h2>
            <hr class="my-4">
            <p class="lead"></p>
          </div>
        </div>

        <div class="row row-clear">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="images/q.jpg" alt="">
              </div>
                <h3 class="mb-3">Meet like minded people</h3>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <div class="p-5">
                  <img class="img-fluid rounded-circle" src="images/a1.jpg" alt="">
              </div>
                <h3 class="mb-3">Try new Things</h3>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <div class="p-5">
                <img class="img-fluid rounded-circle" src="images/01.jpg" alt="">
              </div>
                <h3 class="mb-3">Learn something new</h3>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="bg-light">
      <div class="container">
        <div class="row row-clear">
          <div class="col-lg-12 mx-auto text-center">
            <h1>How it works?</h1>
          </div>      
        </div>

    <div class="row process-content">
      <div class="left-side">
        <div class="item" data-item="1">

          <h5>Sign Up</h5>

          <p>Start by registering</p>
            
        </div>

        <div class="item" data-item="2">

          <h5>Select Preferences</h5>

          <p>Choose from a variety of topics that you are interested in</p>
            
        </div>
          
      </div> <!-- /left-side -->
      
      <div class="right-side">
          
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

    <section id="contact">
      <div class="container">
        <div class="row row-clear">
          <div class="col-lg-12 mx-auto text-center">
            <h2>About Us</h2>
            <p class="lead"></p>
          </div>
        </div>
      </div>
    </section>


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


