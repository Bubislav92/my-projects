<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\UserConfirmationMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1. Validacija svih polja
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:255',
            'budget' => 'nullable|string|max:255',
            'message' => 'required|string',
            // Promenjeno iz 'captcha' u 'recaptcha'
            'g-recaptcha-response' => 'recaptcha',
        ]);

        // 2. Ukloni g-recaptcha-response pre čuvanja u bazi
        $dataToSave = $validatedData;
        unset($dataToSave['g-recaptcha-response']);

        ContactForm::create($dataToSave);

        // 3. Slanje email-a adminu
        try {
            Mail::to('youremail@example.com') 
                ->send(new ContactFormMail($dataToSave));
        } catch (\Exception $e) {
            Log::error('Error sending message to admin: ' . $e->getMessage());
        }

        // 4. Slanje automatske potvrde korisniku
        try {
            Mail::to($validatedData['email'])
                ->send(new UserConfirmationMail($dataToSave));
        } catch (\Exception $e) {
            Log::error('Error sending confirmation to user: ' . $e->getMessage());
        }

        // 5. Redirect sa porukom o uspehu
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
