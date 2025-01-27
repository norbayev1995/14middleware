@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Login</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">Email address</label>
                        <input type="email" name="email" class="form-control" id="loginEmail" required>
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword" required>
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                </form>
                <p class="text-center mt-2">Don't have an account? <a href="{{ route('registerPage') }}">Register</a></p>
            </div>
        </div>
    </div>
@endsection
