@extends('layouts.template')

@section('content')
    <br><br><br>
    <div class="container mt-5">

        <div class="row bg-blur mt-5">
            <div class="col-3 px-5 pt-2">
                <img src="{{ $cevent->picture() }}" class="w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="float-right">
                    <a href="{{ route('CreatorEvents.edit', $cevent->id) }}" class="btn btn-light">
                        <i class="fas fa-cog mr-2"></i>edit
                    </a>

                </div>
                <h1 class="text-muted mt-5">{{ $cevent->name }}</h1>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-reserve-tab" data-toggle="pill" href="#v-pills-reserve"
                        role="tab" aria-controls="v-pills-reserve" aria-selected="false"><i
                            class="fas fa-handshake mr-2"></i> Manage booking Customer</a>

                    <a class="nav-link " id="v-pills-menu-tab" data-toggle="pill" href="#v-pills-menu" role="tab"
                        aria-controls="v-pills-menu" aria-selected="true"><i class="fas fa-list mr-2"></i> Events</a>
                    <a class="nav-link " id="v-pills-book-tab" data-toggle="pill" href="#v-pills-book" role="tab"
                        aria-controls="v-pills-book" aria-selected="true"><i class="fas fa-archive mr-2"></i> Reservations
                        of Spaces Commercial</a>

                    <a class="nav-link" id="v-pills-settings-tab"
                        href="{{ route('CreatorEvents.edit', $cevent->id) }}"><i class="fas fa-cog mr-2"></i> Settings</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" id="v-pills-reserve" role="tabpanel"
                        aria-labelledby="v-pills-reserve-tab">
                        <table class="table table-sm table-hover">
                            @if (count($cevent->bookingt()) >= 1)

                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">fullname</th>
                                        <th scope="col">name event</th>
                                        <th scope="col">Number of tickect</th>
                                        <th scope="col">Notice</th>
                                        <th scope="col">action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cevent->bookingt() as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->user()->fullname() }}</td>
                                            <td>{{ $item->nameevent }}</td>
                                            <td>{{ $item->nb_ticket }}</td>
                                            <td>{{ $item->note }}</td>
                                            <td>

                                                <div class="btn-group">
                                                    @if ($item->validate == 0)
                                                        <form id="status-form-{{ $item->id }}"
                                                            action="{{ route('approve-book', $item->id) }}"
                                                            style="display: none;" method="POST">
                                                            @csrf
                                                        </form>
                                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('allow ?')){
                                                                        event.preventDefault();
                                                                        document.getElementById('status-form-{{ $item->id }}').submit();
                                                                        }else {
                                                                        event.preventDefault();
                                                                        }"><i class="material-icons">done</i>
                                                        </button>

                                                    @endif

                                                    <form action="{{ route('bookingticket.destroy', [$item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>



                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <div class="card-body table-responsive">
                                    <p class="text-center fw-bolder ">No client send you a reservation for your events </p>
                                </div>
                            @endif
                        </table>
                    </div>

                    <div class="tab-pane fade " id="v-pills-menu" role="tabpanel" aria-labelledby="v-pills-menu-tab">

                        <div class="col-12 pb-5">
                            <a href="{{ route('Events.create') }}" class="btn btn-success float-right">
                                <i class="fas fa-plus"></i> Add Event
                            </a>
                        </div>
                        @if (count($cevent->post()) >= 1)
                            @foreach ($cevent->post() as $item)
                                <div class="eventRow{{ $item->id }}  col-12 row my-2"
                                    style="{{ $item->active ? '' : 'opacity: 0.5;' }}">
                                    <div class="col-3">
                                        <img src="{{ $item->picture() }}" class="w-100">
                                    </div>
                                    <div class="col-9">
                                        <span class="float-right text-success h3">{{ $item->price }}DT</span>
                                        <h3 class="text-primary">{{ $item->name }}</h3>
                                        <p>{{ $item->description }}</p>
                                        <p class="text-danger">Date Event</p>
                                        <p class="text-info">{{ $item->date }} From:{{ $item->from }}
                                            To:{{ $item->to }}</p>

                                        <hr>
                                        <div class="btn-group">
                                            <a href="{{ route('Events.edit', $item->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            @if ($item->active == false)
                                                <a href="{{ route('Events.edit', $item->id) }}?action=enable"
                                                    class="btn btn-sm btn-success">Enable</a>
                                            @else
                                                <a href="{{ route('Events.edit', $item->id) }}?action=disable"
                                                    class="btn btn-sm btn-light">Disable</a>
                                            @endif
                                            {{-- <form action="" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button event_id="{{$item->id}}" class="delete_btn btn-sm btn-danger">Delete</button>
                                   </form> --}}
                                            <a href="" event_id="{{ $item->id }}" class="delete_btn btn btn-danger">
                                                delete</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body table-responsive">
                                <p class="text-center fw-bolder ">there is no Event to show Add one </p>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade " id="v-pills-book" role="tabpanel" aria-labelledby="v-pills-book-tab">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header card-header-warning">

                                    <h4 class="card-title float-left mt-2">Status booking</h4>

                                </div>
                                @if (count($bookss) >= 1)
                                    <div class="card-body table-responsive">
                                        <table class="table table-hover">
                                            <thead class="text-warning">
                                                <th>ID</th>
                                                <th>Logo</th>
                                                <th>space Comercial</th>
                                                <th>Date</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Nb. Person</th>
                                                <th>note</th>
                                                <th>reservation status</th>

                                            </thead>
                                            <tbody>

                                                @foreach ($bookss as $book)

                                                    <tr>


                                                        <td>{{ $book->id }}</td>
                                                        <td>

                                                            <img src="{{ $book->namelogo() }}"
                                                                alt="{{ $book->namelogo() }}" class="avatar">
                                                        </td>
                                                        <td>{{ $book->nameoner() }}</td>
                                                        <td>{{ $book->date }}</td>
                                                        <td>{{ $book->from }}</td>
                                                        <td>{{ $book->to }}</td>

                                                        <td>{{ $book->nb_person }}</td>
                                                        <td>{{ $book->note }}</td>
                                                        <td>
                                                            @if ($book->validate == 1)
                                                                <span
                                                                    class='badge badge-pill badge-success'>Confirmed</span>
                                                            @else
                                                                <span class='badge badge-pill badge-danger'>not
                                                                    confirm</span>
                                                            @endif
                                                        </td>
                                                        <td></td>
                                                        <td>

                                            </tbody>
                                @endforeach

                                </table>
                            @else
                                <div class="card-body table-responsive">
                                    <p class="text-center fw-bolder ">there is no Reservation to show </p>
                                </div>
                                @endif

                                {{ $bookss->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        @endsection
        @section('scripts')
            <script>
                $(document).on('click', '.delete_btn', function(e) {
                    e.preventDefault();
                    var event_id = $(this).attr('event_id');
                    $.ajax({
                        type: 'post',
                        url: "{{ route('Event.delete') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': event_id
                        },
                        success: function(data) {
                            if (data.status == true) {
                                // $('#success_msg').show();



                            }
                            $('.eventRow' + data.id).remove();
                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true
                            }
                            toastr.success("Events Added successfully");
                        },
                        error: function(reject) {}
                    });
                });
            </script>
        @stop
