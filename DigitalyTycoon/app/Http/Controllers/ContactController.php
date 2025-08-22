<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail; // Ово недостаје
use App\Mail\ContactFormMail;      // Ово недостаје

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1. Валидација свих поља
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:255',
            'budget' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Чување података у бази
        ContactForm::create($validatedData);

        // 3. Слање имејла
        // Замените 'vas.email@primer.com' са вашом стварном адресом
        Mail::to('vas.email@primer.com')->send(new ContactFormMail($validatedData));

        // 4. Преусмеравање са поруком о успеху
        return back()->with('success', 'Vaša poruka je uspešno poslata!');
    }
}