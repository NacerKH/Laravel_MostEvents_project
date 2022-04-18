
@extends('layouts.template')
@section('content')




<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="{{asset('assets/img/bg/bg-img.png')}}">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                        contact us
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                <li><a href="{{route('welcome')}}">Home</a>  | </li>
                <li><span>Contact</span></li>
            </ul>
        </div>
    </div>
</section>
<!--page title section end-->


<!--contact section -->
<form action="" id="sendEmailform" method="post">
            @csrf
<section class="pt100 pb100">
    <div class="container">
        <img src="{{asset('assets/img/logo.png')}}" alt="MostEvents">
        
        <div class="row justify-content-center mt100">
        
            <div class="col-md-6 col-12">
                <div class="contact_info">
                    <h5>
                      MostEventS
                    </h5>
                    <p>
                      MostEvents is the Best Way for Find Events 
                    </p>
                    <ul class="social_list">
                        <li>
                            <a href="#"><i class="ion-social-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-dribbble"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-instagram"></i></a>
                        </li>
                    </ul>

                    <ul class="icon_list pt50">
                        <li>
                            <i class="ion-location"></i>
                            <span>
                                        Mahdia , rue de habib borguiba<br/>
                                        Zone touritique , Mahdia
                            </span>
                        </li>
                        <li>
                            <i class="ion-ios-telephone"></i>
                            <span>
                                       +76260106
                                </span>
                        </li>
                        <li>
                            <i class="ion-email-unread"></i>
                            <span>
                                    contact@MostEvents.com
                                </span>
                        </li>

                        <li>
                           
                        </li>
                    </ul>
                </div>
            </div>
           
            <div class="col-md-6 col-12">
                <div class="contact_form">
                    <div class="form-group">
                        <input type="text"  name="name" class="form-control" placeholder="name">
                     
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control" placeholder="email">
                      
                    </div>
                    <div class="form-group">
                        <input id="subject" name="subject" type="text" class="form-control" placeholder="subject">
                      
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" class="form-control" cols="4" rows="4" placeholder="massage"><  </textarea>
                    </div>
                    <div class="form-group text-right">
                        <button id="send_email" class="btn btn-rounded btn-primary">send massage</button>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt70">
                <!--map -->
                <div id="map" data-lon="24.036176" data-lat=" 57.039986" class="map"></div>
                <!--map end-->
            </div>
        </div>
        
    </div>
    
</section>

</form>

@endsection
@section('scripts')
    <script>
        $(document).on('click', '#send_email', function (e) {
            e.preventDefault();
            var formData = new FormData($('#sendEmailform')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('contactsend')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if(data.status == true){
                       
                        // $('#success_msg').show();
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success("thank you We will answer in your email  😇 ");
                        $('#sendEmailform')[0].reset();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                    }
              
            });
        });
    </script>
@stop
