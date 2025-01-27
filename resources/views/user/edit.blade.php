@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Edit Profile</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Back to Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Edit Your Profile</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 profile-card">
                <form action="{{ route('updateProfile', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" name="name" class="form-control" id="editName" value="{{ auth()->user()->name }}" required>
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email address</label>
                        <input type="email" name="email" class="form-control" id="editEmail" value="{{ auth()->user()->email }}" required>
                        @error('email')<span>{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="editAvatar">Upload New Avatar</label>
                        <input type="file" name="image" class="form-control-file" id="editAvatar">
                        @error('image')<span class="image">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
