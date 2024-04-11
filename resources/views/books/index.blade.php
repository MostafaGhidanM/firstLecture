@extends('layout')
@section('title')
    Library
@endsection
@section('content')
    {{-- <input type="text" id="keyword">
    <br>
    <br> --}}
    @auth
        <div class="container">
            @if (!Auth::user()->notes->isEmpty())
                <div>
                    <h2>Your Note</h2>
                </div>
            @endif
            <div>
                @foreach (Auth::user()->notes as $note)
                    <p>{{ $note->content }} from <span>{{ Auth::user()->name }}</span></p>
                @endforeach
            </div>
            <div>
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Add a Note</a>
            </div>
        </div>
        <br>
    @endauth
    @if ($books->isEmpty())
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center">
                    <p class="text-muted">There are currently no books in the library</p>
                </div>
            </div>
        </div>
    @else
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
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-block">Edit
                                            This
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
    @endif
    @auth
        <div class="form-group mb-3">
            <a class="btn btn-primary" href="{{ route('books.create') }}">Create A Book</a>
        </div>
    @endauth
    <div class="d-flex justify-content-center">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>

@endsection
{{-- @section('scripts')
    <script>
        $('#keyword').keyup(function() {
            let keyword = $(this).val()
            let url = "{{ route('books.search') }}" + "?keyword=" + keyword

            $.ajax({
                type: "GET",
                url: url,
                contentType: false,
                processData: false,
                success: function(data) {
                    for (book of data) {

                    }
                }
            })
        })
    </script>
@endsection --}}
