<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request): JsonResponse
    {
        try {
            Mail::to('info@gastouderopvangkiki.nl')
                ->send(new ContactFormMail(
                    $request->name,
                    $request->email,
                    $request->phone,
                    $request->message
                ));

            return response()->json([
                'success' => true,
                'message' => 'Bedankt voor uw bericht! We nemen zo spoedig mogelijk contact met u op.',
            ]);
        } catch (\Exception $e) {
            \Log::error('Contact form submission failed: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Er is een fout opgetreden bij het versturen van uw bericht. Probeer het later opnieuw.',
            ], 500);
        }
    }
}
