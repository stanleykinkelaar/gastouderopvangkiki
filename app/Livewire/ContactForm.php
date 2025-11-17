<?php

namespace App\Livewire;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $message = '';

    public string $turnstileResponse = '';

    public bool $success = false;

    public string $successMessage = '';

    public string $errorMessage = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
            'turnstileResponse' => ['required', new Turnstile],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Vul uw naam in.',
            'email.required' => 'Vul uw e-mailadres in.',
            'email.email' => 'Vul een geldig e-mailadres in.',
            'message.required' => 'Vul uw bericht in.',
            'turnstileResponse.required' => 'Verifieer dat u geen robot bent.',
        ];
    }

    public function send(): void
    {
        $this->validate();

        try {
            Mail::to('info@gastouderopvangkiki.nl')
                ->send(new ContactFormMail(
                    $this->name,
                    $this->email,
                    $this->phone,
                    $this->message
                ));

            $this->success = true;
            $this->successMessage = 'Bedankt voor uw bericht! We nemen zo spoedig mogelijk contact met u op.';
            $this->reset(['name', 'email', 'phone', 'message', 'turnstileResponse']);
            $this->dispatch('turnstile-reset');
        } catch (\Exception $e) {
            \Log::error('Contact form submission failed: '.$e->getMessage());
            $this->errorMessage = 'Er is een fout opgetreden bij het versturen van uw bericht. Probeer het later opnieuw.';
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
