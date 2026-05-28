<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        // MOCK DATA: Pretend the vendor is logged in and these are their items
        $myListings = [
            [
                'id' => 1,
                'food_name' => 'Nasi Lemak Ayam',
                'original_price' => 6.00,
                'discounted_price' => 3.00,
                'quantity' => 5,
                'status' => 'Active'
            ]
        ];

        return view('vendor.dashboard', compact('myListings'));
    }
}