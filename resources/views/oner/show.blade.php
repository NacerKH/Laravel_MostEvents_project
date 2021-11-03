@extends('layouts.template')

@section('content')
<div class="jumbotron jumbotron-fluid bg-dark">

    
    <div class="jumbotron-background">
        <img src="{{asset('assets/img/events/CC1.jpg')}}" class="blur " width="100%" height="100%"  >
    </div>
<div class="container">
    <div class="row bg-blur">
        <div class="col-3 mt-5 px-5 pt-2">
            <img src="{{$oner->logo()}}" class="w-100">
        </div>
        <div class="col-6 pt-5">
            <h4 class="text-muted mt-5">{{$oner->name}}</h4>
        </div>
        
        <div class="col-2 pt-5">
        
      
            <h4 class="text-success mt-5">Phone:{{$oner->managerPHone()}}</h4>
        </div>
    </div>
        
    @if (auth()->user()->role ==="cevent")
        @if($oner->places>0)
        <div class="col mt-5">
            <div class="btn btn-block btn-light py-5 text-center" data-toggle="modal" data-target="#Reservation-modal">
                <i class="fas fa-handshake fa-2x w-100"></i>
                <h2 class="h4">Book Now</h2>
            </div>
        </div>
        @endif
        @endif
    </div>
    


 


    @if($oner->places>0)
    <form action="{{route('booking.store')}}" method="POST" class="modal fade " id="Reservation-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        @csrf
        <input type="hidden" name="user_id" value="{{$oner->id}}">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleSelect1">Nb des personnes</label>
                        <select class="form-control" id="exampleSelect1" name="nb_person">
                            @for($i=1;$i<=$oner->places;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @error('nb_person')
                        <span class="invalid-feedback @error('nb_person') is-invalid @enderror" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date">date</label>

                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                        @error('date')
                        <span class="invalid-feedback @error('from') is-invalid @enderror" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="with_time" type="checkbox" id='id_check' checked=""><span class="custom-control-indicator"></span><span class="custom-control-description">Check this custom checkbox</span>
                        </label>

                    </div>
                    <div class="form-group form-row " id="group_time">
                        <div class="col">

                            <input class="form-control @error('from') is-invalid @enderror" type="time" name="from" placeholder="heure d'arrive">
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input class="form-control @error('to') is-invalid @enderror" type="time" name="to" placeholder="heure de sortie">
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Save</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>


                    </div>
                </div>
            </div>

        </div>

    </form>
    @endif
        
    @endsection
    @section('js')
    <script>
        $('#id_check').on('click', function() {
            $('#group_time').toggle()

        })

    </script>
    @endsection
