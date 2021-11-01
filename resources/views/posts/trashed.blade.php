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
      restore
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
                 <a href=""class="btn btn-primary">Restore</a>
              </td>
              <td>
               <a href="{{route('post.kill',$post->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection 