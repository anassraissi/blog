@extends('layouts.app')
@section('content')
<div class="card">
   
  <table class="table table-hover">
  <tr >Category</tr>

      <thead>
  <th>
    Category Name
  </th>
  <th>
       Editing
  </th>
  <th>
      Deleting
  </th>
      </thead>
      <tbody>
      @if($categories->count()>0)
      @foreach($categories as $category)
          <tr>
              <td>
              {{$category->name}}
              </td>
              <td>
              <a href="{{route('Category.edit',$category->id)}}"  class="btn btn-xs btn-info"> Edit</a>
              </td>
              <td>
              <a href=" {{route('Category.destroy', $category->id)}}"  class="btn btn-xs btn-danger"> Deleting</a>

              </td>
            </tr>
          @endforeach
          @else
                  <tr>
                    <th class="text-center"> No categories </th>
                  </tr>
            @endif

      </tbody>
  </table>
  </div>
@endsection 