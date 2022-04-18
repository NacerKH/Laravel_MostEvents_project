@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Creator Event : {{ $cevent->name }}</h4>
                    <p class="card-category"> {{ $cevent->managerFullName() }}</p>
                </div>
                <div class="card-body table-responsive">
                    <h4> Menu </h4>
                    <div class="row">
                        @foreach($ceventPost as $event)
                        <div class="card col-md-4">
                            <img class="card-img-top" src="{{ $event->picture() }}" alt="{{ $event->name }}">
                            <div class="card-body">
                                <h5> {{ $event->name }}</h5>
                                <p class="card-text"> {{ $event->description }}</p>
                                <p class="card-text text-success"> Prix : {{ $event->price }} DT</p>
                                 <form id="delete-form-{{ $event->id }}" action="{{ route('Events.destroy',$event->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-round" onclick="if(confirm('sure?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $event->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"> <span class="material-icons">delete_forever</span>Delete </button>

                            </div> 
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
