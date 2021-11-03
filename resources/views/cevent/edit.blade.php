@extends ('Layouts.template')
@section ('content')
<br><br><br><br><br>
<div class="container mt-5">
<form action="{{ route('CreatorEvents.update',$cevent->id) }}" method="POST" enctype="multipart/form-data" class="row">

@csrf
@method('PUT')
<div class="col-3 p-2">
        <img src="{{$cevent->picture()}}" class="w-100 p-2">   
        <input type="file" name="picture"  class="form-control mt-5 @error('picture') is-invalid @enderror" >
        @error('picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

    </div>
    <div class="offset-1 col-6 p-3">
         <div class="form-group form-row mt-5">
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="name CreatorEvents" value="{{auth()->user()->firstname}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" name="namee" type="text" placeholder="name CreatorEvents" value="{{auth()->user()->lastname}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
      </div>
      <div class="form-group">
            <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="Adress E-mail" value="{{auth()->user()->email}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control @error('adress') is-invalid @enderror" name="adress" type="text" placeholder="Adress" value="{{auth()->user()->adress}}">
            @error('adress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="tel" placeholder="phone" value="{{auth()->user()->phone}}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
                    
        <div class="form-group">
        
             <input class="form-control @error('ticket') is-invalid @enderror" name="ticket"  placeholder="Nb tickect " type="number" value="{{$cevent->ticket}}" min="0">
            @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      <div class="form-group float-right">
            <button type="submit" class="btn btn-outline-primary" >Update </button>
        </div>
    </div>

</form>
</div>
@endsection