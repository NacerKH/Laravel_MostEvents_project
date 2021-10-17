@extends('layouts.template')
@section('content')

<div class="jumbotron jumbotron-fluid bg-dark">

    <div class="jumbotron-background">
        <img src="{{asset('assets\img\events\c2.jpg')}}" class="blur"  width="100%" height="100%">
    </div>

    <div class="container text-white">

        <h1 class="display-4">MostEvents</h1>
        <p class="lead">Find Your Favorite Events.</p>
        <hr class="my-4">
        <h5 class="mr-3">
            🔎 Search
        </h5>

        <form action="{{ route('search') }}">
            <div class="input-group mb-3 col-md-5">
                <input type="text" class="form-control" value="{{ request()->q ?? '' }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary" type="button">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container -->

</div>
<!-- /.jumbotron -->




<div class="container">

    <div class="card">
        <div class="card-header bg-success">
           🍴 Owner Space ({{ $oner->count() }})
        </div>
        <div class="card-body">
                <div class="row">
                @foreach ($oner as $item)
                <div class="card col-md-4">
                    <a href="{{route('oner.show',$item->id)}}" title="{{$item->name}}">
                        <img class="card-img-top" src="{{$item->logo()}}" title="{{$item->name}}">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{$item->name}}</h4>
                        <a href="{{route('oner.show',$item->id)}}" title="{{$item->name}}">Afficher</a>
                    </div>
                </div>
                @endforeach
            </div>
        


        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header bg-success">
           🍲 Events ({{ $items->count() }})
        </div>
        <div class="card-body">
        <ul class="list-group list-group-flush">

            @foreach ($items as $item )
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="image-parent">
              <img src="{{ $item->picture}}" class="img-fluid" style="max-width: 50px;" >
          </div>
                    <h4 class="pull-left">{{ $item->name }}</h4>
                    <h6 class="pull-right text-success">{{ $item->price }} DT</h6>
          
        </li>
            @endforeach
            
            
        </ul>


        </div>
    </div>



    @endsection
