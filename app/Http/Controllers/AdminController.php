<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Hardcoded credentials from legacy admin_login.php
    private $adminEmail = 'admin@travel.com';
    private $adminPassword = 'admin123';

    public function showLogin()
    {
        if (Session::get('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($request->email === $this->adminEmail && $request->password === $this->adminPassword) {
            Session::put('admin_logged_in', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid administrator email or password.');
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $bookings = Booking::orderBy('id', 'desc')->limit(10)->get();
        $inquiries = Contact::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get(); // Assuming User model exists and table migrated

        return view('admin.dashboard', compact('bookings', 'inquiries', 'users'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = $request->input('new_status');
            $booking->save();
        }

        return redirect()->route('admin.dashboard');
    }
}

