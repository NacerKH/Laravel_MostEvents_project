@extends ('Layouts.template')
@section ('content')
<br> <br> <br> <br> <br> <br> <br> <br> <br>
<div class="container">
<form action="{{  route('Events.update',[ $event->id])  }}" method="POST" enctype="multipart/form-data" class="row">

@csrf
@method('PUT')
<div class="col-4">
        <input type="file" name="picture"  class="form-control mt-5 @error('picture') is-invalid @enderror" >
        @error('picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
    <div class="col-8">
         <div class="form-group form-row mt-5">
            <div class="col">
                <input class="form-control" name="name" type="text" placeholder="Product name" value="{{$event-> name}}" required>
            </div>
            
            <div class="col">
                <input class="form-control" name="price" type="text" placeholder="Price" value="{{$event-> price}}">
            </div>
        </div>
        <div class="form-group">
            <textarea name="description" rows="5" class="form-control" placeholder="desciption">{{$event-> description}}</textarea>
        </div>
        <div class="form-group">
                        <label for="date">date</label>

                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                        <span class="invalid-feedback @error('from') is-invalid @enderror" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="with_time" type="checkbox" id='id_check' checked=""><span class="custom-control-indicator"></span><span class="custom-control-description">Check this custom checkbox</span>
                        </label>

                    </div>
                    <div class="form-group form-row " id="group_time">
                        <div class="col">

                            <input class="form-control @error('from') is-invalid @enderror" type="time" name="from" placeholder="heure d'arrive">
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input class="form-control @error('to') is-invalid @enderror" type="time" name="to" placeholder="heure de sortie">
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
        <div class="form-group">
           <select class="form-control"  name="active">
                <option value="true">enable</option>
                <option value="false">disbale</option>
           </select>
        </div>
        <div class="form-group float-right">
            <button type="submit" class="btn btn-outline-primary" >Save </button>
        </div>
    </div>

</form>
</div>
@endsection   
 @section('js')
    <script>
        $('#id_check').on('click', function() {
            $('#group_time').toggle()

        })

    </script>
    @endsection