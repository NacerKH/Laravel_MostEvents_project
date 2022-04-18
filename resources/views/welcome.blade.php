@extends('layouts.template')
@section('content')


<!--header end here-->

<!--cover section slider -->

<body>

<section id="home" class="home-cover">
<div class="cover_slider owl-carousel owl-theme">
<div class="cover_item" style="background: url('assets/img/bg/slider.png');">
<div class="slider_content">
<div class="slider-content-inner">
<div class="container">
<div class="slider-content-center">
<h2 class="cover-title">
Prepare yourself for the
</h2>
<strong class="cover-xl-text">Every Day My birthday</strong>
<p class="cover-date">
stay Tunned
</p>
<a href="#" class=" btn btn-primary btn-rounded">
Buy Tickets Now
</a>
</div>
</div>
</div>
</div>
</div>
<div class="cover_item" style="background: url('assets/img/bg/slider.png');">
<div class="slider_content">
<div class="slider-content-inner">
<div class="container">
<div class="slider-content-left">
<h2 class="cover-title">
Prepare yourself for the
</h2>
<strong class="cover-xl-text">conference</strong>
<p class="cover-date">
Big EVent
</p>
<a href="#" class=" btn btn-primary btn-rounded">
Buy Tickets Now
</a>
</div>
</div>
</div>
</div>
</div>
<div class="cover_item" style="background: url('assets/img/bg/slider.png');">
<div class="slider_content">
<div class="slider-content-inner">
<div class="container">
<div class="slider-content-center">
<h2 class="cover-title">
Prepare yourself for the
</h2>
<strong class="cover-xl-text">conference</strong>
<p class="cover-date">
12-14 February 2021 - gammarth
</p>
<a href="#" class=" btn btn-primary btn-rounded">
Buy Tickets Now
</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="cover_nav">
<ul class="cover_dots">
<li class="active" data="0"><span>1</span></li>
<li data="1"><span>2</span></li>
<li data="2"><span>3</span></li>
</ul>
</div>
</section>
<!--cover section slider end -->

<!--event info -->
<section class="pt100 pb100">
<div class="container">
<div class="row justify-content-center">
<div class="col-6 col-md-3  ">
<div class="icon_box_two">
<i class="ion-ios-calendar-outline"></i>
<div class="content">
<h5 class="box_title">
DATE
</h5>
<p>
12-14 february 2020
</p>
</div>
</div>
</div>

<div class="col-6 col-md-3  ">
<div class="icon_box_two">
<i class="ion-ios-location-outline"></i>
<div class="content">
<h5 class="box_title">
location
</h5>
<p>
Marsa,marsa plage.
</p>
</div>
</div>
</div>

<div class="col-6 col-md-3  ">
<div class="icon_box_two">
<i class="ion-ios-person-outline"></i>
<div class="content">
<h5 class="box_title">
Bandes&djs
</h5>
<p>
Miss M
</p>
</div>
</div>
</div>

<div class="col-6 col-md-3  ">
<div class="icon_box_two">
<i class="ion-ios-pricetag-outline"></i>
<div class="content">
<h5 class="box_title">
tikets
</h5>
<p>
$65 early bird
</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!--event info end -->


<!--event countdown -->
<section class="bg-img pt70 pb70" style="background-image: url('assets/img/bg/bg-img.png');">
<div class="overlay_dark"></div>
<div class="container">
<div class="row justify-content-center">
<div class="col-12 col-md-10">
<h4 class="mb30 text-center color-light">Counter until the big event</h4>
<div class="countdown"></div>
</div>
</div>
</div>
</section>
<!--event count down end-->


<!--about the event -->
<section class="pt100 pb100">
<div class="container">
<div class="section_title">
<h3 class="title">
About the event
</h3>
</div>
<div class="row justify-content-center">
<div class="col-12 col-md-6">
<p>
@include('includes.video1')
</p>
</div>
<div class="col-12 col-md-6">
<p>
    @include('includes.video2')
</p>
</div>
</div>
<center>
    <div><a href="{{ route('watch') }}" class="btn btn-primary btn-rounded">Watch More videos</a></div><br><br>
    
    </center>
<!--event features-->
<div class="row justify-content-center mt30">
<div class="col-12 col-md-6 col-lg-3">
<div class="icon_box_one">
<i class="lnr lnr-mic"></i>
<div class="content">
<h4>9 Speakers</h4>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
</p>
<a href="#">read more</a>
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-3">
<div class="icon_box_one">
<i class="lnr lnr-rocket"></i>
<div class="content">
<h4>8 hrs Marathon</h4>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
</p>
<a href="#">read more</a>
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-3">
<div class="icon_box_one">
<i class="lnr lnr-bullhorn"></i>
<div class="content">
<h4>Live Broadcast</h4>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
</p>
<a href="#">read more</a>
</div>
</div>
</div>

<div class="col-12 col-md-6 col-lg-3">
<div class="icon_box_one">
<i class="lnr lnr-clock"></i>
<div class="content">
<h4>Early Bird</h4>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
</p>
<a href="#">read more</a>
</div>
</div>
</div>
</div>
<!--event features end-->
</div>
</section>
<!--about the event end -->


<!--speaker section-->
<section class="pb100">
<div class="container">
<div class="section_title mb50">
<h3 class="title">
our speakers
</h3>
</div>
</div>
<div class="row justify-content-center no-gutters">
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s1.jpg" alt="speaker name" style="width:200%;max-width:400px">
<div class="info_box">
<h5 class="name">Radi RedStar</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s2.jpg" alt="speaker name" style="width:200%;max-width:400px">
<div class="info_box">
<h5 class="name">Miss M</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>

</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s3.jpg" alt="speaker name" style="width:200%;max-width:400px">
<div class="info_box">
<h5 class="name">Nader guirate</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s4.jpg" alt="speaker name" style="width:200%;max-width:400px">
<div class="info_box">
<h5 class="name">Sanfara</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s5.jpg" alt="speaker name">
<div class="info_box">
<h5 class="name">Gati</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s6.jpg" alt="speaker name">
<div class="info_box">
<h5 class="name">A.L.A</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s7.jpg" alt="speaker name">
<div class="info_box">
<h5 class="name">Fahmi Riahi</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="speaker_box">
<div class="speaker_img">
<img src="assets/img/speakers/s8.jpg" alt="speaker name">
<div class="info_box">
<h5 class="name">Sabri mefteh</h5>
<p class="position">CEO Company</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!--speaker section end -->
@empty(auth()->user())




<!--Price section-->
<section class="pb100">
<div class="container">
<div class="section_title mb50">
<h3 class="title">
Register
</h3>
</div>

<div class="row justify-content-center">
<div class="col-md-4 col-12">
<div class="price_box active">
<div class="price_highlight">
recommended
</div>
<div class="price_header">
<h4>
Event Creator
</h4>
<h6>
We had a condition for register ...
</h6>
</div>
<div class="price_tag">
65 <sup>$</sup>
</div>
<div class="price_features">
<ul>
<li>
Event Creator
</li>

</div>
<div class="price_footer">
<a href="{{ route('register.cevent') }}" class="btn btn-primary btn-rounded">register</a>
</div>
</div>
</div>
<div class="col-md-4 col-12">
<div class="price_box">
<div class="price_header">
<h4>
Space Owner
</h4>
<h6>
For the Owner
</h6>
</div>
<div class="price_tag">
85 <sup>$</sup>
</div>
<div class="price_features">
<li>

</li>

</div>
<div class="price_footer">
<a href="{{ route('register.oner') }}" class="btn btn-primary btn-rounded">register</a>
</div>
</div>
</div>
<div class="col-md-4 col-12">
<div class="price_box">
<div class="price_header">
<h4>
Customer
</h4>
<h6>
For Booking Events
</h6>
</div>
<div class="price_tag">
Free <sup>0$</sup>
</div>
<div class="price_features">
<ul>
<li>
Consult Events

</li>




</ul>
</div>
<div class="price_footer">
<a href="{{ route('register.client') }}" class="btn btn-primary btn-rounded">register</a>
</div>
</div>
</div>
</div>
</div>
</section>
@endempty
@auth
    

<center>
<div><a href="{{ route('pagehome') }}" class="btn btn-primary btn-rounded">Browse your Needs</a></div><br><br>

</center>
@endauth
@include('includes.footer')

@endsection
