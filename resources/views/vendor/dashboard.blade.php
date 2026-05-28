@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-bold">
                Post Surplus Item
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Food Item Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Nasi Goreng">
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Normal Price (RM)</label>
                            <input type="number" step="0.10" class="form-control" placeholder="0.00">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Discount Price</label>
                            <input type="number" step="0.10" class="form-control" placeholder="0.00">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" placeholder="e.g. 5">
                    </div>
                    <button type="button" class="btn btn-warning w-100 fw-bold" onclick="alert('Mock: Item Added to Flash Sale!')">Post Flash Sale</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <h3 class="fw-bold mb-3">My Active Listings</h3>
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Item</th>
                            <th>Original</th>
                            <th>Discount</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myListings as $listing)
                        <tr>
                            <td class="fw-bold">{{ $listing['food_name'] }}</td>
                            <td>RM {{ number_format($listing['original_price'], 2) }}</td>
                            <td class="text-success fw-bold">RM {{ number_format($listing['discounted_price'], 2) }}</td>
                            <td>{{ $listing['quantity'] }}</td>
                            <td><span class="badge bg-success">{{ $listing['status'] }}</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger" onclick="alert('Mock: Item Removed')">Remove</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection