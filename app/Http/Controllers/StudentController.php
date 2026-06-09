<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SurplusItem;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch all surplus items from the database
        $surplusItems = SurplusItem::with('vendor')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'cafe_name' => $item->vendor->name ?? 'Unknown Vendor',
                'food_name' => $item->food_name,
                'original_price' => $item->original_price,
                'discounted_price' => $item->discounted_price,
                'quantity_left' => $item->quantity,
                'status' => $item->status,
                'image' => $item->image,
                'vendor_id' => $item->vendor_id,
                'closing_time' => $item->created_at->addHours(2)->format('h:i A') // Example: 2 hours after creation
            ];
        });

        return view('student.dashboard', compact('surplusItems'));
    }

    public function vendors()
    {
        // Get all vendors from the database
        $vendors = User::where('role', 'vendor')->get();

        return view('student.vendors', compact('vendors'));
    }

    public function vendorDetails($id)
    {
        // Get specific vendor details
        $vendor = User::findOrFail($id);

        // Get ONLY the surplus items belonging to THIS vendor
        $items = SurplusItem::where('vendor_id', $id)->get(); 

        return view('student.vendor-details', compact('vendor', 'items'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('student.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $picturePath = $request->file('profile_picture')->store('profile-pictures', 'public');
            $validated['profile_picture'] = $picturePath;
        }

        $user->update($validated);

        return redirect()->route('student.profile')
            ->with('success', 'Profile updated successfully!');
    }

    public function reserve(Request $request, $id)
    {
        $item = SurplusItem::findOrFail($id);

        // Check if there is stock available
        if ($item->quantity > 0) {
            // Decrease quantity by 1
            $item->quantity -= 1;
            
            // Change status to 'Sold Out' if quantity reaches 0
            if ($item->quantity == 0) {
                $item->status = 'Sold Out';
            }
            
            $item->save();
            
            // Generate a random 6-digit pick-up code (e.g., ECO-482910)
            $reservationCode = 'ECO-' . rand(100000, 999999);

            // Redirect to the success page and pass the code and food name
            return redirect()->route('success')->with([
                'reservation_code' => $reservationCode,
                'food_name' => $item->food_name
            ]);
        }

        return back()->with('error', 'Sorry, this item is out of stock.');
    }
}