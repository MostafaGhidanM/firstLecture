@extends('layout')
@section('title')
    Create Book
@endsection
@section('content')
    @include('inc.errors')
    <form method="POST" action="{{ route('auth.handleRegister') }}">
        @csrf
        <div class="form-group mb-1">
            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group mb-1">
            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group mb-1">
            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <br>
    <a href="{{ route('auth.github.redirect') }}" class="btn btn-primary">Sign up with Github</a>
@endsection
