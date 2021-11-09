@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Your Profil </div>

                <div class="card-body">
                    <form method="POST" id="ClientFormUpdate" action=""  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
             <div class="col-3 p-2">
                 <img src="{{$users->avatar()}}" class="w-100 p-2">   
                     <input type="file" name="avatar"  class="form-control mt-5 @error('avatar') is-invalid @enderror" >
                     {{-- @error('avatar')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                          @enderror --}}

                </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('firstname') }}</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $users->firstname }}" required autocomplete="firstname" autofocus>
                                      <small id="firstname_error" class="form-text text-danger"></small>

                                    {{-- @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $users->lastname }} " required autocomplete="lastname" autofocus>
                                    <small id="lastname_error" class="form-text text-danger"></small>
                                    
                                    {{-- @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
            

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$users->email}}" required autocomplete="email">
                                <small id="email_error" class="form-text text-danger"></small>

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                            {{ __('Number Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone}}" required autocomplete="phone">
                            <small id="phone_error" class="form-text text-danger"></small>

                             
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>

                            <div class="col-md-6">
                                <input id="adress" type="a" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{$users->adress}}" required autocomplete="adress">
                            <small id="adress_error" class="form-text text-danger"></small>
                                
                            
                            </div>
                        </div>
              

                            
    
                        
                           
                                <button  id="update_client" class="btn btn-primary " style="float: right;" >
                                    Save
                                </button>
                           
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '#update_client', function (e) {
            e.preventDefault();
            var formData = new FormData($('#ClientFormUpdate')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('Clientsatuts.update',$users->id)}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if(data.status == true){
                        
                        // $('#success_msg').show();
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success("Creator Events update Profil successfully");
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                    }
              
            });
        });
    </script>
@stop
