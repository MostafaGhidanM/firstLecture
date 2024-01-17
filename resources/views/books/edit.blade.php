@extends('layout')
@section('title')
Edit Book {{ $book->id }}
@endsection


@section('content')
@include('inc.errors')
<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    <div class="form-group mb-3">
      <input type="text" class="form-control" placeholder="Book Title" name="title" value="{{ $book->title }}">
    </div>
    <div class="form-group mb-3">
      <textarea class="form-control" rows="3" placeholder="Book Description" name="desc">{{ $book->desc }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection