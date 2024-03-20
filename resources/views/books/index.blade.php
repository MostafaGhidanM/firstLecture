@extends('layout')
@section('title')
    Library
@endsection
@section('content')
    @auth
        <h2>Your Note</h2>
        @foreach (Auth::user()->notes as $note)
            <p>{{ $note->content }} from <span>{{ Auth::user()->name }}</span></p>
        @endforeach
        <a href="{{ route('notes.create') }}" class="btn btn-primary">Add a Note</a>
    @endauth
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
                                <img src="{{ asset('uploads/books/' . $book->img) }}" alt="{{ $book->name }}"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('books.show', $book->id) }}">
                                    <h3 class="card-title">{{ $book->title }}</h3>
                                </a>
                                <p class="card-text">{{ $book->desc }}</p>
                                @foreach ($book->categories as $category)
                                    <p class="card-text" style="color: red">
                                        {{ $category->name }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mt-auto">
                            @auth
                                <div class="col-6">
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-block">Edit This
                                        Book</a>
                                </div>
                            @endauth
                            @auth
                                @if (Auth::user()->is_admin == 1)
                                    <div class="col-6">
                                        <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger btn-block"
                                            onclick="return confirm('Are you sure?')">Delete This Book</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @auth
        <div class="form-group mb-3">
            <a class="btn btn-primary" href="{{ route('books.create') }}">Create A Book</a>
        </div>
    @endauth
    <div class="d-flex justify-content-center">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
@endsection
