@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">

                    <h4 class="card-title float-left mt-2">Space Oners</h4>
                    <a href=" {{ route('admin.Oners.create')}} " class="btn btn-sm btn-success float-right">Add</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nom</th>
                            <th>Nb. Places</th>
                            <th>Statut</th>
                            <th>Gérant</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>


                            @foreach($oners as $oner)
                            <tr>
                                <td>{{$oner->id}}</td>
                                <td>
                                    <img src="{{$oner->logo()}}" alt="{{$oner->name}}" class="avatar">
                                </td>
                                <td>{{$oner->name}}</td>
                                <td>{{$oner->places}}</td>
                                <td>
                                    @if ($oner->active == 1)
                                    <span class='badge badge-pill badge-success'>Actif</span>
                                    @else
                                    <span class='badge badge-pill badge-danger'>Inactif</span>
                                    @endif
                                </td>
                                <td>{{$oner->managerFullName()}}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($oner->active == 0)
                                                        <form id="status-form-{{ $oner->id }}" action="{{ route('admin.approve-oner',$oner->id) }}" style="display: none;" method="POST">
                                                            @csrf
                                                        </form>
                                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('allow ?')){
                                                                event.preventDefault();
                                                                document.getElementById('status-form-{{ $oner->id }}').submit();
                                                                }else {
                                                                event.preventDefault();
                                                                }"><i class="material-icons">done</i></button>
                                        @endif
                                        <a href="{{ route('admin.Oners.show',$oner->id)}}" class="btn btn-sm btn-primary">Show</a>
                                        <form id="delete-form-{{ $oner->id }}" action="{{ route('admin.Oners.destroy',$oner->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danfer" onclick="if(confirm('are u sure?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $oner->id }}').submit();
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
