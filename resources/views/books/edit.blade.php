@extends('layout')
@section('title')
Edit Book
@endsection


@section('content')

<form method="POST" action="{{ route('books.update') }}">
    @csrf
    <div class="form-group mb-3">
      <input type="text" class="form-control" placeholder="Book Title" name="title" value="{{ $book->title }}">
    </div>
    <div class="form-group mb-3">
      <textarea class="form-control" rows="3" placeholder="Book Description" name="desc">{{ $book->desc }}</textarea>
    </div>
    <input type="text" name="id" value="{{$book->id}}" hidden>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection