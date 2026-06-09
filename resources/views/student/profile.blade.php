@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">👤 My Profile</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('student.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Profile Picture Section -->
                        <div class="text-center mb-4">
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" 
                                     alt="Profile Picture" 
                                     class="rounded-circle shadow-sm"
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto shadow-sm"
                                     style="width: 150px; height: 150px; font-size: 60px;">
                                    👤
                                </div>
                            @endif
                        </div>

                        <!-- Profile Picture Upload -->
                        <div class="form-group mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" 
                                   id="profile_picture" name="profile_picture" accept="image/*">
                            <small class="text-muted">Max 2MB. JPG, PNG, GIF</small>
                            @error('profile_picture')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Full Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                   id="username" name="username" value="{{ old('username', $user->username) }}" required>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email (Read-only) -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" 
                                   id="email" value="{{ $user->email }}" disabled>
                            <small class="text-muted">Email cannot be changed</small>
                        </div>

                        <!-- Role (Read-only) -->
                        <div class="form-group mb-4">
                            <label for="role" class="form-label">Account Type</label>
                            <input type="text" class="form-control" 
                                   id="role" value="{{ ucfirst($user->role) }}" disabled>
                            <small class="text-muted">Account type cannot be changed</small>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                💾 Save Changes
                            </button>
                            <a href="{{ route('student.dashboard') }}" class="btn btn-outline-secondary btn-lg">
                                ← Back to Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
