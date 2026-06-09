@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Register</h4>
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

                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                   id="username" name="username" value="{{ old('username') }}" required>
                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Account Type</label>
                            <div class="form-check">
                                <input class="form-check-input @error('role') is-invalid @enderror" 
                                       type="radio" name="role" id="role_student" value="student" 
                                       {{ old('role') == 'student' || old('role') === null ? 'checked' : '' }} required>
                                <label class="form-check-label" for="role_student">
                                    Student (Browse and buy surplus food)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('role') is-invalid @enderror" 
                                       type="radio" name="role" id="role_vendor" value="vendor" 
                                       {{ old('role') == 'vendor' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="role_vendor">
                                    Vendor (Post surplus food sales)
                                </label>
                            </div>
                            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success w-100">Register</button>
                        </div>
                    </form>

                    <hr>

                    <p class="text-center">Already have an account? <a href="{{ route('auth.showLogin') }}">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
