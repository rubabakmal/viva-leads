<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save to database
        $emailEntry = Email::create($validated);

        try {
            // Send email using recipient email from .env
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactFormSubmitted($validated));
            return back()->with('success', 'Message submitted successfully and email sent.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to send email. Please try again later.']);
        }
    }
}
