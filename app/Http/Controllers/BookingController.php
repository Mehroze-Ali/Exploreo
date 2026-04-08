<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{


    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'travelers' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'special_requests' => 'nullable|string',
            'package_id' => 'required|string',
        ]);

        try {
            Booking::create([
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'travelers' => $validated['travelers'],
                'start_date' => $validated['start_date'],
                'special_requests' => $validated['special_requests'],
                'package_id' => $validated['package_id'],
                'status' => 'Pending',
            ]);

            return view('loading_booking', [
                'status' => 'success',
                'packageId' => $validated['package_id']
            ]);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Booking Error: ' . $e->getMessage());
            return view('loading_booking', [
                'status' => 'error',
                'packageId' => $request->package_id
            ]);
        }
    }

}
