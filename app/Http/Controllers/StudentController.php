<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // MOCK DATA: Pretend this is coming from the database
        $surplusItems = [
            [
                'id' => 1,
                'cafe_name' => 'Mahallah Ali Cafe',
                'food_name' => 'Nasi Lemak Ayam',
                'original_price' => 6.00,
                'discounted_price' => 3.00,
                'quantity_left' => 5,
                'closing_time' => '10:30 PM'
            ],
            [
                'id' => 2,
                'cafe_name' => 'Mahallah Faruq Kiosk',
                'food_name' => 'Chicken Chop',
                'original_price' => 8.50,
                'discounted_price' => 4.50,
                'quantity_left' => 2,
                'closing_time' => '11:00 PM'
            ]
        ];

        return view('student.dashboard', compact('surplusItems'));
    }
}