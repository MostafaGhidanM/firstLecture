@extends('layout')
@section('title')
Create Book
@endsection
@section('content')
@include('inc.errors')
<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <div class="form-group mb-3">
      <input type="text" class="form-control" placeholder="Book Title" name="title" value="{{ old('title') }}">
    </div>
    <div class="form-group mb-3">
      <textarea class="form-control" rows="3" placeholder="Book Description" name="desc">{{ old('desc') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add The Book to The Library</button>
</form>
@endsection