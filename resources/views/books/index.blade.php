@extends('layout')
@section('title')
All Books
@endsection
@section('content')
<h1>
    All Books
</h1>
<hr>
@foreach ( $books as $book )
<a href="{{ route('books.show',$book->id) }}">
<h3>{{ $book->title }} </h3>  
</a> 
<p>{{ $book->desc }}</p>
<div>
    <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning">Edit The Book</a>
    <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">Delete The Book</a>
</div>
<hr>
@endforeach
<div class="form-group mb-3">
    <a class="btn btn-primary" href="{{ route('books.create') }}">Create A Book</a>
</div>
<div class="d-flex justify-content-center">
    {{ $books->links('pagination::bootstrap-4') }}
</div>
@endsection