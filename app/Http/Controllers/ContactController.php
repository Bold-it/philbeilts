<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactNotification;
use App\Mail\ContactAutoReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // 1. Save message to database
        $messageRecord = ContactMessage::create($validated);

        // 2. Dispatch live emails (Notification + Auto-Reply)
        $emailSent = false;
        try {
            $companyEmail = config('mail.from.address', 'Philbeiltsindustrialgroup@gmail.com');
            
            // Send notification to company
            Mail::to($companyEmail)->send(new ContactNotification($messageRecord));

            // Send confirmation auto-reply to user
            Mail::to($messageRecord->email)->send(new ContactAutoReply($messageRecord));

            $emailSent = true;
            $messageRecord->update(['email_sent' => true]);
        } catch (\Throwable $e) {
            Log::warning('Email delivery deferred: ' . $e->getMessage());
        }

        return redirect()->route('contact')->with(
            'success',
            'Thank you for reaching out, ' . e($request->name) . '! Your message (Ref #' . str_pad($messageRecord->id, 5, '0', STR_PAD_LEFT) . ') has been received and our team will respond within 1–2 business days.'
        );
    }
}
