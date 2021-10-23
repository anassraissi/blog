@extends('layouts.app')
@section('content')
@include('includes.errors')
      <br>
<div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Update {{$category->name}} Category</li>
      <li class="list-group-item">
          <form action="{{route('Category.update',$category->id)}}" method="Post">
          @csrf
        
          <div class="form-group">
            <label for="name">Name</label>
            <input type="textbox" class="text" value="{{$category->name}}" name="name">
        </div>
        <div class="form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
        </form>
      </li>
     
    </ul>
  </div>
@endsection 