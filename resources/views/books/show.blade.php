@extends('layout')
@section('title')
Show A Book
@endsection
@section('content')
<h1>
    Chosen Book ID : {{$book->id}}
</h1>
<h3>{{ $book->title }}</h3>
<p>{{ $book->desc }}</p>
<hr>
<div>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to All Books</a>
    <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning">Edit The Book</a>
    <a href="" class="btn btn-danger">Delete The Book</a>
</div>
@endsection