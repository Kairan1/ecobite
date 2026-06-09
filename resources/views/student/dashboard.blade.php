@extends('layouts.app')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="fw-bold">Active Flash Sales 🍔</h2>
                <p class="text-muted">Grab these discounted meals before they are gone!</p>
            </div>
            <a href="{{ route('student.vendors') }}" class="btn btn-primary fw-bold">
                🏪 Browse All Vendors
            </a>
        </div>
    </div>
</div>

{{-- SUCCESS & ERROR MESSAGES --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
@foreach($surplusItems as $item)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card food-card h-100 border-0">

            @if($item['image'])
                <img src="{{ asset('storage/' . $item['image']) }}"
                     class="card-img-top food-image"
                     alt="{{ $item['food_name'] }}" style="object-fit: cover; height: 200px;">
            @else
                <div class="card-img-top food-image bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif

            <div class="card-body">

                <div class="d-flex justify-content-between mb-2">
                    <span class="badge bg-{{ $item['quantity_left'] > 0 ? 'danger' : 'secondary' }}">
                        {{ $item['quantity_left'] }} Left
                    </span>

                    <span class="badge bg-success">
                        Flash Sale
                    </span>
                </div>

                <h5 class="fw-bold">{{ $item['food_name'] }}</h5>
                <p class="text-muted">📍 {{ $item['cafe_name'] }}</p>

                <div>
                    <del class="text-muted">RM {{ number_format($item['original_price'], 2) }}</del>
                    <span class="fs-5 fw-bold text-success ms-2">
                        RM {{ number_format($item['discounted_price'], 2) }}
                    </span>
                </div>

                <small class="text-danger">
                    🕒 {{ $item['closing_time'] }}
                </small>

            </div>

            <div class="card-footer bg-white border-0">
                {{-- REAL RESERVATION FORM --}}
                @if($item['quantity_left'] > 0)
                    <form action="{{ route('student.reserve', $item['id']) }}" method="POST" class="d-grid gap-2">
                        @csrf
                        <button type="submit" class="btn btn-success w-100" onclick="return confirm('Are you sure you want to reserve 1 unit of this meal?')">
                            Reserve Now
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100" disabled>Out of Stock</button>
                @endif
            </div>

        </div>
    </div>
@endforeach
</div>

@endsection