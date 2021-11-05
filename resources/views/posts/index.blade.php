@extends('layouts.app')
@section('content')
<div class="card">
   
  <table class="table table-hover">
      <thead>
  <th>
     image
  </th>
  <th>
       title
  </th>
  <th>
  Editing
  </th>
  <th>
      delete
  </th>
      </thead>
      <tbody>
          @foreach($posts as $post)
          <tr>
              <td>
               <img src="{{$post->featured}}" alt="{{$post->title}}" width="100px" height="50px">
              </td>
              <td>
                 {{$post->title}}
              </td> 
              <td>
              <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
               <a href="{{route('post.destroy',$post->id)}}" class="btn btn-danger">Trash</a>
              </td>
            </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection 