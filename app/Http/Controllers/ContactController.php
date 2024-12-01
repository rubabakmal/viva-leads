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
        $emailEntry = Email::create($request->only(['first_name', 'last_name', 'email', 'phone', 'message']));

        try {
            Log::info('Attempting to send email to: ' . $emailEntry->email);
            Mail::to('your_mailtrap_test_email@example.com')
                ->send(new ContactFormSubmitted($request->all()));
            Log::info('Email sent successfully to: ' . $emailEntry->email);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            dd('Error: ' . $e->getMessage());
        }

        return back()->with('success', 'Message submitted successfully and email sent.');
    }
}
