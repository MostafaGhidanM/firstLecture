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
<hr>
@endforeach
{{ $books->render() }}
@endsection