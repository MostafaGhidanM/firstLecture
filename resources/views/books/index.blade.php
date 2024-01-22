@extends('layout')
@section('title')
Library
@endsection
@section('content')
<h1>
    Books
</h1>
<div class="row">
    @foreach ($books as $book)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="{{ asset('uploads/books/'.$book->img) }}" alt="{{ $book->name }}" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('books.show', $book->id) }}">
                            <h3 class="card-title">{{ $book->title }}</h3>
                        </a>
                        <p class="card-text">{{ $book->desc }}</p>
                    </div>
                </div>
                <div class="row mt-auto">
                    <div class="col-6">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-block">Edit This Book</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')">Delete This Book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="form-group mb-3">
    <a class="btn btn-primary" href="{{ route('books.create') }}">Create A Book</a>
</div>
<div class="d-flex justify-content-center">
    {{ $books->links('pagination::bootstrap-4') }}
</div>
@endsection