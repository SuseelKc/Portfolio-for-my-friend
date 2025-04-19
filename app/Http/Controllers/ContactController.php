<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\PortfolioSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();
        return view('portfolio.contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = ContactMessage::create($validated);

        // Send email notification
        Mail::raw("New Contact Message\n\nName: {$message->name}\nEmail: {$message->email}\nSubject: {$message->subject}\nMessage: {$message->message}", 
            function($mail) use ($message) {
                $mail->to(config('mail.from.address'))
                    ->subject('New Contact Message: ' . $message->subject);
            }
        );

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
} 