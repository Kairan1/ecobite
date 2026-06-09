<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurplusItem;

class VendorController extends Controller
{
    public function index()
    {
        // Fetch ONLY the surplus items belonging to the currently logged-in vendor
        $myListings = SurplusItem::where('vendor_id', auth()->id())->get();
    
        // (If your variable is named $surplusItems in the controller, use that instead of $myListings)
    
        return view('vendor.dashboard', compact('myListings'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'food_name' => 'required|string|max:255',
            'original_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB limit we set earlier
        ]);

        // Handle the image upload if exists
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('surplus_images', 'public');
        }

        // CRITICAL: Attach the currently logged-in vendor's ID to the item
        $validated['vendor_id'] = auth()->id();
        $validated['status'] = 'Active';

        // Save to database
        SurplusItem::create($validated);

        return redirect()->route('vendor.dashboard')->with('success', 'Item posted successfully!');
    }      

    public function destroy($id)
    {
        $item = SurplusItem::findOrFail($id);
        $item->delete();

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Item deleted successfully');
    }
}