@extends('layouts.admin')
@section('content')
<div>
<div class="row mt-5">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-reserve-tab" data-toggle="pill" href="#v-pills-reserve" role="tab" aria-controls="v-pills-reserve" aria-selected="false"><i class="fas fa-handshake mr-2"></i> Manage booking Customer</a>
            </div>
        </div>

        <div class="col-md-9">
         
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-reserve" role="tabpanel" aria-labelledby="v-pills-reserve-tab"> 
                     <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">fullname</th>
                            <th scope="col">name event</th>
                            <th scope="col">Number of tickect</th>
                            <th scope="col">Notice</th>
                            <th scope="col">Status</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                       
                          @foreach($bookac as $item)
                         
                            <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->user()->fullname()}}</td>
                            <td>{{$item->nameevent}}</td>
                            <td>{{$item->nb_ticket}}</td>
                            <td>{{$item->note}}</td>
                            <td>
                                    @if ($item->validate == 1)
                                    <span class='badge badge-pill badge-success'>Confirmed</span>
                                    @else
                                    <span class='badge badge-pill badge-danger'>not confirm</span>
                                    @endif
                                </td>
                         
                            </tr>
                           @endforeach
                        </tbody>
                        </table>
                </div>
                </div>
                
@endsection