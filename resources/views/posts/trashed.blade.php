@extends('layouts.app')
@section('content')
<div class="card">
   
  <table class="table table-hover">
      <tr >Trashed posts</tr>
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
      Delete
  </th>
      </thead>
      <tbody>
        @if($posts->count()>0)
        @foreach($posts as $post)
          <tr>
              <td>
               <img src="{{$post->featured}}" alt="{{$post->title}}" width="100px" height="50px">
              </td>
              <td>
                 {{$post->title}}
              </td>
            
              <td>
                 <a href="{{route('post.restore',$post->id)}}"class="btn btn-primary">Restore</a>
              </td>
              <td>
               <a href="{{route('post.kill',$post->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          @endforeach
          @else
          <tr>
                    <th class="text-center"> No posts trashed </th>
                  </tr>
          @endif
      </tbody>
  </table>
  </div>
@endsection 