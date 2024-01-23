@extends('layout')
@section('title')
Create A Category
@endsection
@section('content')
@include('inc.errors')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group mb-3 text-center">
              <input type="text" class="form-control text-center" placeholder="Category Name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group mb-3 text-center">
              <a href="{{ route('categories.index')}}" class="btn btn-primary">Back</a>
            </div>
            <div class="form-group mb-3 text-center">
              <button type="submit" class="btn btn-primary">Add New Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection