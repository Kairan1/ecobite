@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <a href="{{ route('student.vendors') }}" class="btn btn-outline-secondary mb-3">
            ← Back to Vendors
        </a>
        <h2 class="fw-bold">{{ $vendor->name }}'s Listings</h2>
        <p class="text-muted">Available surplus food from {{ $vendor->name }}</p>
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
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Vendor Info</h5>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $vendor->name }}</p>
                <p><strong>Username:</strong> {{ $vendor->username }}</p>
                <p><strong>Email:</strong> {{ $vendor->email }}</p>
                <p>
                    <strong>Role:</strong>
                    <span class="badge bg-success">Vendor</span>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <h4 class="fw-bold mb-3">🍽️ Current Offerings</h4>

        <div class="row">
            @forelse($items as $item)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 food-card">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="w-full h-48 object-cover rounded mb-4">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-500 italic">
                                No Image Available
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $item->food_name }}</h5>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Original Price</small>
                                    <span class="text-muted text-decoration-line-through">
                                        RM {{ number_format($item->original_price, 2) }}
                                    </span>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Flash Sale Price</small>
                                    <h6 class="text-success fw-bold">
                                        RM {{ number_format($item->discounted_price, 2) }}
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Quantity Available</small>
                                    <span class="fw-bold">{{ $item->quantity }} units</span>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Status</small>
                                    <span class="badge bg-{{ $item->status === 'Active' ? 'success' : 'danger' }}">
                                        {{ $item->status }}
                                    </span>
                                </div>
                            </div>

                            {{-- UPDATED BUTTON / RESERVATION FORM --}}
                            <div class="d-grid gap-2 mt-3">
                                @if($item->quantity > 0)
                                    <form action="{{ route('student.reserve', $item->id) }}" method="POST" class="d-grid gap-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to reserve 1 unit of this meal?')">
                                            Reserve Meal
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Out of Stock</button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        This vendor has no current listings.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection