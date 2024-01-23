@extends('layout')
@section('title')
Show A Category
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h1>
              Category ID: {{ $category->id }}
            </h1>
            <h3>
              Category Name: {{ $category->name }}
            </h3>
            <hr>
            <div>
              <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection