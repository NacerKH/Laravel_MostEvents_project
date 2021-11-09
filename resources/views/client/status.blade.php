@extends('layouts.template')
@section('content')
<div class="jumbotron jumbotron-fluid bg-dark">

    
    <div class="jumbotron-background">
        <img src="{{asset('assets/img/events/ccc.jpg')}}" class="blur " width="100%" height="100%"  >
    </div>
 
    

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">

                    <h4 class="card-title float-left mt-2">Status booking</h4>
                   
                        
                   
                   
                </div>
                @if (count($bookts) >= 1)
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nomevent</th>
                            <th>Nb. Ticket</th>
                            <th>note</th>
                            <th>Total</th>
                            <th>reservation status</th>
                           
                            <th>LastStep</th>
                          
                          
                        </thead>
                        <tbody>


                           
                         <tr>
                            @foreach($bookts as $bookt)
                           
                                
                            
                                
                         
                                <td>{{$bookt->id}}</td>
                                <td>

                                    <img src="{{$bookt->eventpic()}}" alt="" class="avatar">
                                </td>
                                <td>{{$bookt->evename()}}</td>
                                <td>{{$bookt->nb_ticket}}</td>
                                <td>{{$bookt->note}}</td>
                                <td>{{$bookt->total}}</td>
                                <td>
                                    @if ($bookt->validate == 1)
                                    <span class='badge badge-pill badge-success'>Confirmed</span>
                                    @else
                                    <span class='badge badge-pill badge-danger'>not confirm</span>
                                    @endif
                                </td>
                               
                                
                                <td>
                                @if ($bookt->validate == 1)
                                <a class="btn btn-primary" href="{{route('pay',[ $bookt->user_id ])}}" role="button">LastStep</a>
                                @else
                                <span class='badge badge-pill badge-danger'>Wait Confirmation</span>
                                @endif
                                   </td>

                                  
                              
                           
                        </tbody>
                        @endforeach
                        
                        
                    </table>
                    @else
                    <div class="card-body table-responsive">
                    <p class="text-center fw-bolder ">there is no reservation to show</p>
                    </div>
                      
                        @endif
                    {{ $bookts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>



@stop
