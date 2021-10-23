@extends('layouts.app')
@section('content')
   @include('includes.errors')
      <br>
<div class="card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">create a post</li>
      <li class="list-group-item">
          <form action="{{route('post.store')}}" method="Post" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control"> 
            
          </div>
          <div class="form-group">
              <label for="featured_image">featured</label>
              <input type="file" name="featured_image" class="form-control">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
             <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
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