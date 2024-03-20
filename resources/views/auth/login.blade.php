@extends('layout')
@section('title')
Login
@endsection
@section('content')
@include('inc.errors')
<form method="POST" action="{{ route('auth.handleLogin') }}">
    @csrf
    <div class="form-group mb-1">
        <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
      </div>
      <div class="form-group mb-1">
        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{ old('pass') }}">
      </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection