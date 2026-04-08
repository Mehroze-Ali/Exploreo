<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contactName' => 'required|string|max:255',
            'contactEmail' => 'required|email|max:255',
            'contactPhone' => 'nullable|string|max:20',
            'contactSubject' => 'nullable|string|max:255',
            'contactMessage' => 'required|string',
        ]);

        try {
            Contact::create([
                'name' => $validated['contactName'],
                'email' => $validated['contactEmail'],
                'phone' => $validated['contactPhone'],
                'subject' => $validated['contactSubject'],
                'message' => $validated['contactMessage'],
            ]);

            return view('loading_contact', ['status' => 'success']);

        } catch (\Exception $e) {
            return view('loading_contact', ['status' => 'error']);
        }
    }
}
