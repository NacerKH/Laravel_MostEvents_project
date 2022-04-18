@extends('layouts.template')

@section('content')
<body>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="jumbotron jumbotron-fluid bg-dark">

    
    <div class="jumbotron-background">
        <img src="{{asset('assets/img/events/CC1.jpg')}}" class="blur " width="100%" height="100%"  >
    </div>


    
<div class="container">
    <div class="row bg-blur">
        <div class="col-3 px-5 pt-2">
            <img src="{{$cevent->picture()}}" class="w-100">
        </div>
        
    
    <div class="col-6 pt-5">
            <h4 class="text-muted ">Creator Event: {{$cevent->managerFullNamec()}}</h4>
    </div>
        
        <div class="col-2 pt-5">
        
      
            <h4 class="text-success mt-5">Phone:{{$cevent->managerPHonec()}}</h4>
        </div>
    </div>
        
        @if($cevent->ticket>0)
        <div class="col mt-5">
            <div class="btn btn-block btn-light py-5 text-center" data-toggle="modal" data-target="#Reservation-modal">
                <i class="fas fa-handshake fa-2x w-100"></i>
                <h2 class="h4">Book Now</h2>
            </div>
        </div>
        @endif
    </div>
    </body>
    


 


    @if($cevent->ticket>0)
    <form action="{{route('bookingticket.store')}}" method="POST" class="modal fade " id="Reservation-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        @csrf
        <input type="hidden" name="cevent_id" value="{{$cevent->id}}">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                      
                        <label for="exampleSelect1">Nb tickect</label>
                        <select class="form-control" id="exampleSelect1" name="nb_ticket">
                            @for($i=1;$i<=$cevent->ticket;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @error('ticket')
                        <span class="invalid-feedback @error('ticket') is-invalid @enderror" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Name of Events</label>
                        
                        <select class="form-control"  id="exampleSelect1" name="nameevent">
                                @foreach($cevent->post() as $item)
                                
                                <option value="{{$item->id}}">{{$item->name}}</option> <br />
                              
                                <!-- <input name="price" value="{{$item->price}}" type="hidden"> -->
                                @endforeach
                               </select>
                            
                          @error('nameevent')
                        
                        <span class="invalid-feedback @error('nameevent') is-invalid @enderror" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                   
                    
                 
                    
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Book</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>


                    </div>
                </div>
            </div>

        </div>

    </form>
    @endif
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
        
    @endsection
    @section('js')
    <script>
        $('#id_check').on('click', function() {
            $('#group_time').toggle()

        })

    </script>

    @endsection
