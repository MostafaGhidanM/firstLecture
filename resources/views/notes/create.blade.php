@extends('layout')
@section('title')
@endsection
@section('content')
    @include('inc.errors')
    <form method="POST" action="{{ route('notes.store') }}">
        @csrf
        <div class="form-group mb-1">
            <textarea class="form-control" rows="3" placeholder="Note Content" name="content">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
