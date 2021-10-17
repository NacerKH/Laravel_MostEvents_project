@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Space Oner: {{ $oner->name }}</h4>
                    <p class="card-category">Gérant : {{ $oner->managerFullName() }}</p>
                    <img src="{{$oner->logo()}}" alt="{{$oner->name}}" class="avatar">
                </div>
               

                </div>
            </div>
        </div>
    </div>
</div>
@stop
