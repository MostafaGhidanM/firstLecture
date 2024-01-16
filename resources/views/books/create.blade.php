@extends('layout')
@section('title')
Create Book
@endsection


@section('content')

<form>
    <div class="form-group mb-3">
      <input type="text" class="form-control" placeholder="Book Title">
    </div>
    <div class="form-group mb-3">
      <textarea class="form-control" rows="3" placeholder="Book Description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection