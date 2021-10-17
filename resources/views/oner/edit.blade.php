@extends ('Layouts.template')
@section ('content')
<div class="container">
<form action="{{ route('oner.update',$oner->id) }}" method="POST" enctype="multipart/form-data" class="row">

@csrf
@method('PUT')
<div class="col-3 p-2">
        <img src="{{$oner->logo()}}" class="w-100 p-2">   
        <input type="file" name="logo"  class="form-control mt-5 @error('logo') is-invalid @enderror" >
        @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

    </div>
    <div class="offset-1 col-6 p-3">
         <div class="form-group form-row mt-5">
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="name Oner" value="{{$oner->name}}">
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
        
             <input class="form-control @error('places') is-invalid @enderror" name="places"  placeholder="Nb de personnes " type="number" value="{{$oner->places}}" min="0">
            @error('places')
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