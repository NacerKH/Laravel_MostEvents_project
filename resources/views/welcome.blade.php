@extends('layouts.template')
@section('content')


<!--header end here-->

<!--cover section slider -->
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>
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
                            <a href="#" class=" btn btn-primary btn-rounded" >
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
                            <a href="#" class=" btn btn-primary btn-rounded" >
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
                                12-14 February 2021  - gammarth
                            </p>
                            <a href="#" class=" btn btn-primary btn-rounded" >
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
            <li  data="1"><span>2</span></li>
            <li  data="2"><span>3</span></li>
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
                <div class="countdown" ></div>
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing eli. Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <p>
                    In rhoncus massa nec  sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod quis. Maecenas ornare, ex in malesuada tempus.
                </p>
            </div>
        </div>

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
                <div class="speaker_img" >
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
                <div class="speaker_img" >
                    <img src="assets/img/speakers/s2.jpg" alt="speaker name"style="width:200%;max-width:400px">
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
                <div class="speaker_img" >
                    <img src="assets/img/speakers/s5.jpg" alt="speaker name" >
                    <div class="info_box">
                        <h5 class="name">Gati</h5>
                        <p class="position">CEO Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img" >
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
                <div class="speaker_img" >
                    <img src="assets/img/speakers/s7.jpg" alt="speaker name" >
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
                    <img src="assets/img/speakers/s8.jpg" alt="speaker name" >
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
                        <a href="{{route('register.cevent')}}" class="btn btn-primary btn-rounded">register</a>
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
                        <a href="{{route('register.oner')}}" class="btn btn-primary btn-rounded">register</a>
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
                            For  Booking Events
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
                        <a href="{{route('register.client')}}" class="btn btn-primary btn-rounded">register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--price section end -->

<!--event calender-->
<section class="pb100">
    <div class="container">
        <div class="table-responsive">
            <table class="event_calender table">
                <thead class="event_title">
                <tr>
                    <th>
                        <i class="ion-ios-calendar-outline"></i>
                        <span>next events calendar</span>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img src="assets/img/cleander/c1.png" alt="event">
                    </td>
                    <td class="event_date">
                        14
                        <span>February</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>Conference in Amsterdam</h5>
                            <h6>08 AM - 04 PM</h6>
                            <p>Speaker: Daniel Hill</p>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                    </td>
                    <td class="buy_link">
                        <a href="#">buy now</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="assets/img/cleander/c2.png" alt="event">
                    </td>
                    <td class="event_date">
                        18
                        <span>February</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>Conference in Amsterdam</h5>
                            <h6>08 AM - 04 PM</h6>
                            <p>Speaker: Daniel Hill</p>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                    </td>
                    <td class="buy_link">
                        <a href="#">buy now</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="assets/img/cleander/c3.png" alt="event">
                    </td>
                    <td class="event_date">
                        22
                        <span>February</span>
                    </td>
                    <td>
                        <div class="event_place">
                            <h5>Conference in Amsterdam</h5>
                            <h6>08 AM - 04 PM</h6>
                            <p>Speaker: Daniel Hill</p>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                    </td>
                    <td class="buy_link">
                        <a href="#">buy now</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--event calender end -->

<!--brands section -->
<section class="bg-gray pt100 pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                our partners
            </h3>
        </div>
        <div class="brand_carousel owl-carousel">
            <div class="brand_item text-center">
                <img src="{{asset('assets/img/brands/b1.png')}}" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="{{asset('assets/img/brands/b2.png')}}" alt="brand">
            </div>

            <div class="brand_item text-center">
                <img src="{{asset('assets/img/brands/b3.png')}}" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="{{asset('assets/img/brands/b4.png')}}" alt="brand">
            </div>
            <div class="brand_item text-center">
                <img src="{{asset('assets/img/brands/b5.png')}}" alt="brand">
            </div>
        </div>
    </div>
</section>
<!--brands section end-->

<section class="bg-img pt100 pb100" style="background-image: url('assets/img/bg/tickets.png')">
    <div class="container">
        <div class="section_title mb30">
            <h3 class="title color-light">
                GEt your tikets
            </h3>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-9 text-md-left text-center color-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus. Integer iaculis in aazzzCurabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
            </div>
            <div class="col-md-3 text-md-right text-center">
                <a href="#" class="btn btn-primary btn-rounded mt30">buy now</a>
            </div>
        </div>
    </div>
</section>
<!--get tickets section -->

@endsection