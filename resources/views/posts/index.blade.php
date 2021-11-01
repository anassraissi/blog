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
      Deleting
  </th>
  <th>
      Editing
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
                 Edit
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