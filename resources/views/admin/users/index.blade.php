@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title float-left mt-2">Users</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>


                            @foreach($users as $key=>$user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->fullname()}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if ($user->role == "admin")
                                    <span class='badge badge-pill badge-default'>Admin</span>
                                    @elseif ($user->haveOner() == "oner")
                                    <span class='badge badge-pill badge-info'>Oner</span>
                                    @elseif ($user->haveEvent() == "cevent")
                                    <span class='badge badge-pill badge-info'>Creator Events</span>
                                    @else
                                    <span class='badge badge-pill badge-warning'>Client</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {{-- <a href="" class="btn btn-sm btn-primary">Show</a> --}}
                                        <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{route('admin.users.destroy',$user->id)}}" class="btn btn-sm btn-danfer">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
