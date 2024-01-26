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
            @foreach ($book->categories as $category )
            <h4>
                {{ $category->name }}
            </h4>    
            @endforeach
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