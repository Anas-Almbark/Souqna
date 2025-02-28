@extends('layout')
@section('content')
@include('supports.message')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="contact">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Contact Us</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href={{ route("home.index") }}>Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>
            </div>
        </div>
</div>
</section>
<!-- ================ end banner area ================= -->

<!-- ================ contact section start ================= -->
<section class="section-margin--small">
<div class="container">
  <div class="d-none d-sm-block mb-5 pb-4">
    <div id="map" style="height: 420px;"></div>
    <script>
      function initMap() {
        var location = { lat: 36.586042, lng: 37.058643 }; 
        var grayStyles = [
          {
            featureType: "all",
            stylers: [
              { saturation: -90 },
              { lightness: 50 }
            ]
          },
          { elementType: 'labels.text.fill', stylers: [{ color: '#A3A3A3' }] }
        ];
        
        var map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 14,   
          styles: grayStyles,
          scrollwheel: false
        });

        var marker = new google.maps.Marker({
          position: location,
          map: map,
          title: " Azaz"
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
</div>



  <div class="row">
    <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-home"></i></span>
        <div class="media-body">
          <h3>Syria Aleppo Azaz</h3>
          <p>Santa monica bullevard</p>
        </div>
      </div>
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
        <div class="media-body">
          <h3><a href="tel:454545654">00 963 994 644 239</a></h3>
          <p>Mon to Fri 9am to 6pm</p>
        </div>
      </div>
      <div class="media contact-info">
        <span class="contact-info__icon"><i class="ti-email"></i></span>
        <div class="media-body">
          <h3><a href="mailto:support@colorlib.com">souqna@support.com</a></h3>
          <p>Send us your query anytime!</p>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">
      <form action="{{ route('supports.store') }}" class="form-contact contact_form" method="post" id="contactForm" novalidate="novalidate">
        @csrf
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
            </div>
            <div class="form-group">
              <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
            </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group">
                <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
            </div>
          </div>
        </div>
        <div class="form-group text-center text-md-right mt-3">
          @if (Auth::user())
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          @endif
          <button type="submit" class="button button--active button-contactForm">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<!-- ================ contact section end ================= -->
@endsection