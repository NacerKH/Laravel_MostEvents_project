@extends ('Layouts.template')
@section ('content')
<br><br><br><br><br>
<div class="container mt-5">
<form action=""  id="CeventFormUpdate" method="POST" enctype="multipart/form-data" class="row">

@csrf
 @method('PUT') 
<div class="col-3 p-2">
        <img src="{{$cevent->picture()}}" class="w-100 p-2">   
        <input type="file" name="picture"  class="form-control mt-5 @error('picture') is-invalid @enderror" >
        <small id="picture_error" class="form-text text-danger"></small>

        {{-- @error('picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}

    </div>
    <div class="offset-1 col-6 p-3">
         <div class="form-group form-row mt-5">
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="name CreatorEvents" value="{{auth()->user()->firstname}}">
                <small id="name_error" class="form-text text-danger"></small>

                {{-- @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            <input type="text" style="display: none;" class="form-control" value="{{auth()->user()-> id}}" name="cevent_id">
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" name="namee" type="text" placeholder="name CreatorEvents" value="{{auth()->user()->lastname}}">
                <small id="namee_error" class="form-text text-danger"></small>

                {{-- @error('name')F
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            
      </div>
      <div class="form-group">
            <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="Adress E-mail" value="{{auth()->user()->email}}">
            <small id="email_error" class="form-text text-danger"></small>

            {{-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="form-group">
            <input class="form-control @error('adress') is-invalid @enderror" id="adress" name="adress" type="text" placeholder="Adress" value="{{auth()->user()->adress}}">
            <small id="adress_error" class="form-text text-danger"></small>
        
            {{-- @error('adress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="form-group">
            <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="tel" placeholder="phone" value="{{auth()->user()->phone}}">
            <small id="phone_error" class="form-text text-danger"></small>
            {{-- @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
        </div>
        
                    
        <div class="form-group">
        
             <input class="form-control @error('ticket') is-invalid @enderror" name="ticket"  placeholder="Nb tickect " type="number" value="{{$cevent->ticket}}" min="0">
             <small id="ticket_error" class="form-text text-danger"></small>

             {{-- @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
        </div>
      <div class="form-group float-right">
            <button id="update_cevent" class="btn btn-outline-primary" >Update </button>
        </div>
    </div>

</form>
</div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '#update_cevent', function (e) {
            e.preventDefault();
            var formData = new FormData($('#CeventFormUpdate')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('CreatorEvents.update',auth()->user()->cevent()->id)}}",
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