<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Resend\Laravel\Facades\Resend;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Send email using Resend
            Resend::emails()->send([
                'from' => config('mail.from.address'),
                'to' => 'info@gastouderopvangkiki.nl',
                'subject' => 'Nieuw contactformulier bericht van ' . $request->name,
                'html' => view('emails.contact', [
                    'contactName' => $request->name,
                    'contactEmail' => $request->email,
                    'contactPhone' => $request->phone,
                    'contactMessage' => $request->message,
                ])->render(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Bedankt voor uw bericht! We nemen zo spoedig mogelijk contact met u op.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Contact form submission failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Er is een fout opgetreden bij het versturen van uw bericht. Probeer het later opnieuw.'
            ], 500);
        }
    }
}