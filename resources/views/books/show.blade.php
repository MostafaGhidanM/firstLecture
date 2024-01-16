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
<a href="{{ route('books.index') }}">Back to All Books</a>
@endsection