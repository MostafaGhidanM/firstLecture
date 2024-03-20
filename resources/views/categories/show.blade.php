@extends('layout')
@section('title')
Show A Category
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h1>
              Category ID: {{ $category->id }}
            </h1>
            <h3>
              Category Name: {{ $category->name }}
            </h3>
            <hr>
            <h3>Books: </h3>
            <ul>
              @foreach ($category->books as $book )
              <li>
                {{ $book->title }}
              </li>
                
              @endforeach
            </ul>
            <div>
              <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection