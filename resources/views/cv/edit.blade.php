@extends('layouts.app')


@section('content')

  
  
  @if(count($errors))
    <div class="alert alert-danger" role="alert">
      
      <ul>
      @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
    </div>

  @endif
 
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <form action="{{ url('cvs/'.$cv->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

          <div class="form-group">
          <label for="">Titel</label>
          <input type="text" name="titre" class="form-control" value="{{ $cv->titre }}">
          </div>

          <div class="form-group">
          <label for="">Präsentation</label>
          <textarea name="presentation" class="form-control">{{ $cv->presentation }}</textarea>
          </div>
           
            <div class="form-group">
              <label for="">Image</label>
              <img src="{{ asset('storage/'.$cv->photo) }}" alt="..." style="width:50px; height:50px;">
              <input class="form-control" type="file" name="photo">
            </div>

      

          <div class="form-group">
          
          <input type="submit" class="form-control btn btn-danger" value="Bearbeiten">
          </div>
        </form>

      </div>
    </div>
  </div>


@endsection