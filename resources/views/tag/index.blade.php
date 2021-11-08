@extends('layouts.app')
@section('content')
<div class="card">
   
  <table class="table table-hover">
  <tr >tag</tr>

      <thead>
  <th>
    Tag Name
  </th>
  <th>
       Editing
  </th>
  <th>
      Deleting
  </th>
      </thead>
      <tbody>
      @if($tags->count()>0)
      @foreach($tags as $tag)
          <tr>
              <td>
              {{$tag->tag}}
              </td>
              <td>
              <a href="{{route('tag.edit',$tag->id)}}"  class="btn btn-xs btn-info"> Edit</a>
              </td>
              <td>
              <a href=" {{route('tag.destroy', $tag->id)}}"  class="btn btn-xs btn-danger"> Deleting</a>

              </td>
            </tr>
          @endforeach
          @else
                  <tr>
                    <th class="text-center"> No tags </th>
                  </tr>
            @endif

      </tbody>
  </table>
  </div>
@endsection 