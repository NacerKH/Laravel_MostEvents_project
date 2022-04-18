@extends('layouts.template')

@section('content')
    <br><br><br><br>
    <div class="container mt-5">
    {{-- ---------------------Simple alert------------------------- --}}
    {{-- 
        <div class="alert alert-success" id="success_msg" style="display: none;">
            تم الحفظ بنجاح
        </div> --}}
        {{-- ------------------------------------------------------- --}}
        <form action="" id="eventForm" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-4">
                <input type="file" name="picture" class="form-control mt-5" required>
                <small id="picture_error" class="form-text text-danger"></small>

            </div>
            <div class="col-8">
                <div class="form-group form-row mt-5">
                    <div class="col">
                        <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                            placeholder="Event name" value="{{ old('name') }}">
                        <small id="name_error" class="form-text text-danger"></small>

                        {{-- @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>


                    <div class="col">
                        <input class="form-control @error('price') is-invalid @enderror" name="price" type="text"
                            placeholder="Price" value="{{ old('price') }}">
                            <small id="price_error" class="form-text text-danger"></small>
                        {{-- @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="description" rows="5" class="form-control" placeholder="desciption"></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="active">
                        <option value="true">enable</option>
                        <option value="false">disbale</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">date</label>

                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date') }}">
                        <small id="date_error" class="form-text text-danger"></small>
                    {{-- @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="with_time" type="checkbox" id='id_check' checked=""><span
                            class="custom-control-indicator"></span><span class="custom-control-description">Check this
                            custom checkbox</span>
                    </label>

                </div>
                <div class="form-group form-row " id="group_time">
                    <div class="col">

                        <input class="form-control @error('from') is-invalid @enderror" type="time" name="from"
                            placeholder="heure d'arrive" value="{{ old('from') }}">
                            <small id="from_error" class="form-text text-danger"></small>
                        {{-- @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} </strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="col">
                        <input class="form-control @error('to') is-invalid @enderror" type="time" name="to"
                            placeholder="heure de sortie" value="{{ old('to') }}">
                            <small id="to_error" class="form-text text-danger"></small>
                        {{-- @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    
                </div>
                <div class="form-group float-right">
                    <button id="save_event" class="btn btn-outline-primary">Add Events</button>
                </div>
            </div>


        </form>

    </div>
@endsection

@section('scripts')
    <script>
        $('#id_check').on('click', function() {
            $('#group_time').toggle()

        })
    </script>

    <script>
        $(document).on('click', '#save_event', function(e) {
            e.preventDefault();
            
            var formData = new FormData($('#eventForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('Events.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status == true) {
                        // $('#success_msg').show();-------For AlertBootstrap
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success("Events Added successfully");
                    }
                    window.location.replace('{{route('CreatorEvents.show',auth()->user()->cevent()->id)}}');
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>

@endsection
