<h1>
    All Books
</h1>
<hr>
@foreach ( $books as $book )
<h3>{{ $book->title }} </h3>   
<p>{{ $book->desc }}</p>
<hr>
@endforeach