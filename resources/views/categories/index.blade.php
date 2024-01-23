@extends('layout')
@section('title')
Library
@endsection
@section('content')
<h1>
    Categories
</h1>
<div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <h3 class="card-title">{{ $category->name }}</h3>
                        </a>
                    </div>
                </div>
                <div class="row mt-auto">
                    <div class="col-6">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-block">Edit This Category</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')">Delete This Category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="form-group mb-3">
    <a class="btn btn-primary" href="{{ route('categories.create') }}">Create A Category</a>
</div>
<div class="d-flex justify-content-center">
    {{ $categories->links('pagination::bootstrap-4') }}
</div>
@endsection