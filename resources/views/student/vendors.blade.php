@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold">🏪 Vendor Portal</h2>
        <p class="text-muted">Browse all vendors and their surplus food offerings</p>
    </div>
</div>

<div class="row">
    @forelse($vendors as $vendor)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">{{ $vendor->name }}</h5>
                </div>
                
                {{-- UPDATED VENDOR INFO --}}
                <div class="card-body">
                    <p class="text-muted mb-2">
                        <strong>Operation Time:</strong> {{ $vendor->operation_time ?? '07:00 AM - 11:00 PM' }}
                    </p>
                    <p class="text-muted mb-0">
                        <strong>Location:</strong> {{ $vendor->location ?? 'IIUM GOMBAK' }}
                    </p>
                </div>
                
                {{-- The card footer with the 'View Listings' button has been removed completely --}}
                
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                No vendors available at the moment. Check back soon!
            </div>
        </div>
    @endforelse
</div>

<div class="row mt-4">
    <div class="col-12">
        <a href="{{ route('student.dashboard') }}" class="btn btn-outline-secondary">
            ← Back to Dashboard
        </a>
    </div>
</div>
@endsection