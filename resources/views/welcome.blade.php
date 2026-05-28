@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1 class="display-4 fw-bold text-success">Welcome to EcoBite</h1>
    <p class="lead text-muted">Rescue surplus foods, save money, and build a greener campus.</p>
    <div class="mt-4">
        <a href="{{ route('student.dashboard') }}" class="btn btn-success btn-lg mx-2">I am a Student</a>
        <a href="{{ route('vendor.dashboard') }}" class="btn btn-outline-success btn-lg mx-2">I am a Vendor</a>
    </div>
</div>
@endsection