@extends('layouts.app')
@section('content')
      @if(count($errors)> 0)
              <ul class="list-group">
                  @foreach($errors->all() as $error)
                      <li class="list-group-item text-danger">
                         {{$error}} 
                      </li>
                  @endforeach

              </ul>
      @endif
      <br>
<div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">create a Category</li>
      <li class="list-group-item">
          <form action="{{route('Category.store')}}" method="Post">
          @csrf
        
         
          <div class="form-group">
            <label for="name">Name</label>
            <input type="textbox" class="text" name="name">
        </div>
        <div class="form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-success">Store</button>
            </div>
        </div>
        </form>
      </li>
     
    </ul>
  </div>
@endsection 