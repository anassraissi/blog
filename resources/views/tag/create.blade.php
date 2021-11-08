@extends('layouts.app')
@section('content')
@include('includes.errors')
      <br>
<div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">create a tag</li>
      <li class="list-group-item">
          <form action="{{route('tag.store')}}" method="Post">
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