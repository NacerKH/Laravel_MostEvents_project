@extends('layouts.template')
@section('content')





    @if(auth()->user()->role === "oner")
<div class="jumbotron jumbotron-fluid bg-dark">

    
    <div class="jumbotron-background">
        <img src="{{asset('assets/img/events/CC1.jpg')}}" class="blur " width="100%" height="100%"  >
    </div>


    <div class="container text-white">

        <h1 class="display-4">Commercial spaces </h1>
        <p class="lead">Find Your Commercial spaces for Your best event </p>
        <hr class="my-4">
        <h5 class="mr-3">  </h5>
           
</div>
<div class="container">
    <div class="card-body text-primary">
        <h4 class="card-title">
        Commercial spaces
        </h4>
    </div> <center>
    <form action="{{ route('search') }}" method="GET">
            <div class="input-group mt-5 mb-3 col-md-5">
                <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary" type="button">Search</button>
                </div>
            </div>
        </form>
        </center>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach ($list as $item)
                <div class="card col-md-4">
                    <a href="#" title="{{$item->name}}">
                        <img class="card-img-top" src="{{$item->logo()}}" title="{{$item->name}}">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{$item->name}}</h4>
                        <a href="{{route('oner.show',$item->id)}}" title="{{$item->name}}">Afficher</a>
                    </div>
                </div>
                @endforeach
            </div>
            {!! $list->render() !!}
            </div>
            </div>
           @endif

            @if(auth()->user()->role === "cevent")
   
            <div class="jumbotron jumbotron-fluid bg-dark">

    
    <div class="jumbotron-background">
        <img src="{{asset('assets/img/events/CC1.jpg')}}" class="blur " width="100%" height="100%"  >
    </div>


    <div class="container text-white">

        <h1 class="display-4">space for CreatorEvents </h1>
        <p class="lead">Find Your best event </p>
        <hr class="my-4">
        <h5 class="mr-3">
           
        </h5>
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group mb-3 col-md-5">
                <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary" type="button">Search</button>
                </div>
            </div>
        </form>
    </div>


</div>
<div class="container">
    <div class="card-body text-primary">
        <h4 class="card-title">
        Creator event 
        </h4>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
            @foreach ($list as $item)
                <div class="card col-md-4">
                    <a href="#" title="{{$item->name}}">
                        <img style="border-radius: 50%;"class="card-img-top" src="{{$item->logo()}}" title="{{$item->name}}">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{$item->name}}</h4>
                        <a href="{{route('oner.show',$item->id)}}" title="{{$item->name}}">Show Local</a>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            </div>
            <hr>
            <div class="card-body text-primary">
        <h4 class="card-title">
             Events 
        </h4>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach ($liste as $item)
                <div class="card col-md-4 ">
                    <a href="#" title="#">
                        <img class="card-img-top" src="{{$item->picture()}}" title="{{$item->id}}">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{$item->name}}</h4>
                        <a href="{{route('CreatorEvents.show',$item->event_id)}}" title="{{$item->event_id}}">Show Event</a>
                    </div>
                </div>
                @endforeach
                
            </div>
            {!! $liste->render() !!}
            </div>
            </div>
            @endif

        
            @if(auth()->user()->role === "user")
 

            <section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="{{asset('assets/img/bg/bg-img.png')}}">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h3>
                       Events
                    </h3>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <ul>
                
                <li><span>Events</span></li>
            </ul>
        </div>
    </div>
</section>
<center>
<form action="{{ route('search') }}" method="GET">
            <div class="input-group mt-5  mb-3 col-md-5">
                <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary" type="button">Search</button>
                </div>
            </div>
        </form>
        </center>
    </div>

<section class="pt100 pb100">
    <div class="container">

        <div class="event_box">
        @foreach ($liste as $item)
            <img  src="{{$item->picture()}}" alt="event">
                <div class="event_info">
                        <div class="event_title">
                        {{$item->name}}
                        </div>
                <div class="speakers">
                    <strong>speakers</strong>
                    <span>{{$item->name}}</span>
                </div>
                <div class="event_date">
                   @if(!empty($item->from))
                <p class="text-info"> {{$item->date}},from {{$item->from}}To{{$item->to}}</p>
                @endif
                <p class="text-info"> {{$item->date}}</p>
                </div>
            </div>
            <div class="event_word">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                    {{$item->description}}
                    </div>
                    <div class="row ">
                        <div class="col-6 col-12">
                        <p class="text-warning">Price of tickect:{{$item->price}}</p>        
                        </div>
                    
                    </div>
                </div>
                <div class="text-right">
                    <a href="{{route('CreatorEvents.show',$item->event_id)}}" title="{{$item->id}}" class="btn btn-outline-info">Book</a>
                    </div>
                    <br>
            </div>
       @endforeach
    

      
            
</div>
<div   text="center">
{!!
                $liste->render() !!}
</div>
     
    </div>
    <br />
    @endif
    @endsection
