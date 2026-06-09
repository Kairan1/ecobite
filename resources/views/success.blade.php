@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <div class="mb-4">
        <h1 class="text-success fw-bold mb-3">🎉 Reservation Successful!</h1>
        
        @if(session('food_name'))
            <p class="text-muted fs-5">You have successfully reserved: <strong class="text-dark">{{ session('food_name') }}</strong></p>
        @else
            <p class="text-muted fs-5">Your reservation has been confirmed.</p>
        @endif
    </div>

    <div class="card shadow-sm mx-auto border-0 mb-5" style="max-width: 400px; background-color: #f8f9fa;">
        <div class="card-body py-4">
            <p class="text-muted mb-2 text-uppercase fw-bold" style="letter-spacing: 1px;">Your Pick-up Code</p>
            
            <h2 class="fw-bold text-success mb-3" style="font-size: 2.5rem; letter-spacing: 2px;">
                {{ session('reservation_code', 'ECO-XXXXXX') }}
            </h2>
            
            <p class="text-muted small mb-0">Please show this code to the vendor when collecting your food to verify your reservation.</p>
        </div>
    </div>

    <div>
        <a href="{{ route('student.dashboard') }}" class="btn btn-success px-5 py-3 fw-bold rounded-pill shadow-sm">
            ← Back to Dashboard
        </a>
    </div>
</div>
@endsection