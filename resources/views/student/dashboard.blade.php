@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Active Flash Sales 🍔</h2>
        <p class="text-muted">Grab these discounted meals before the cafes close!</p>
    </div>
</div>

<div class="row">
    @foreach($surplusItems as $item)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <span class="badge bg-danger mb-2">Only {{ $item['quantity_left'] }} left!</span>
                <h5 class="card-title fw-bold">{{ $item['food_name'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">📍 {{ $item['cafe_name'] }}</h6>
                
                <div class="mt-3">
                    <span class="text-decoration-line-through text-muted">RM {{ number_format($item['original_price'], 2) }}</span>
                    <span class="fs-4 fw-bold text-success ms-2">RM {{ number_format($item['discounted_price'], 2) }}</span>
                </div>
                <p class="small text-danger mt-2">🕒 Pickup before {{ $item['closing_time'] }}</p>
            </div>
            <div class="card-footer bg-white border-0 pb-3">
                <button class="btn btn-success w-100" onclick="alert('Mock: Item Reserved! Your code is ECO-992')">Reserve Now</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection