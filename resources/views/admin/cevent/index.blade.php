@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">

                    <h4 class="card-title float-left mt-2">Creator Events</h4>
                    <a href=" {{ route('admin.CreatorEvents.create')}} " class="btn btn-sm btn-success float-right">Add</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nom</th>
                            <th>Nb. Tickect</th>
                            <th>Statut</th>
                           
                            <th>Actions</th>
                        </thead>
                        <tbody>


                            @foreach($cevents as $cevent)
                            <tr>
                                <td>{{$cevent->id}}</td>
                                <td>
                                    <img src="{{$cevent->picture()}}" alt="{{$cevent->name}}" class="avatar">
                                </td>
                                <td>{{$cevent->managerFullNamec()}}</td>
                                <td>{{$cevent->ticket}}</td>
                                <td>
                                    @if ($cevent->active == 1)
                                    <span class='badge badge-pill badge-success'>Actif</span>
                                    @else
                                    <span class='badge badge-pill badge-danger'>Inactif</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <div class="btn-group">
                                        @if($cevent->active == 0)
                                                        <form id="status-form-{{ $cevent->id }}" action="{{ route('admin.approve-cevent',$cevent->id) }}" style="display: none;" method="POST">
                                                            @csrf
                                                        </form>
                                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('allow ?')){
                                                                event.preventDefault();
                                                                document.getElementById('status-form-{{ $cevent->id }}').submit();
                                                                }else {
                                                                event.preventDefault();
                                                                }"><i class="material-icons">done</i></button>
                                        @endif
                                        <a href="{{ route('admin.CreatorEvents.show',$cevent->id)}}" class="btn btn-sm btn-primary">Show</a>
                                        <form id="delete-form-{{ $cevent->id }}" action="{{ route('admin.CreatorEvents.destroy',$cevent->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danfer" onclick="if(confirm('are u sure?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $cevent->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }">Delete </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@stop
