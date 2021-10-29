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
              image
              </td>
              <td>
                 {{$post->title}}
              </td>
              <td>
                 Edit
              </td>
              <td>
                  delete
              </td>
            </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection 