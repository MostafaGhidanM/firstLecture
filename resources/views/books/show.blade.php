@extends('layout')
@section('title')
Show A Book
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h3>
                {{ $book->title }}
            </h3>
            <p>
                {{ $book->desc }}
            </p>
            <ul>
            @foreach ($book->categories as $category )
            <li>
                {{ $category->name }}
            </li>    
            @endforeach
          </ul>
            <hr>
            <div>
              <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection