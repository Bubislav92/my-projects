<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail; // Obavezno importuj
use Illuminate\Support\Facades\Validator; // Import Validator
use Illuminate\Support\Facades\Log; // Za logovanje grešaka pri slanju emaila


use Illuminate\Http\Request;

class ContactFormController extends Controller
{

    public function show()
    {
        return view('contact');
    }
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255', // Subject može biti opcionalan
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator) // Vraća greške validacije nazad na formu
                        ->withInput() // Vraća prethodno unete podatke nazad na formu
                        ->with('error', 'Molimo Vas proverite unete podatke.'); // Opšta poruka o grešci
        }

        // Ako validacija prođe, podaci su u $validatedData
        $validatedData = $validator->validated();

        try {
            // Email adresa na koju se šalje poruka (tvoja administrativna adresa)
            $recipientEmail = 'tvoja.admin.email@example.com'; // *** PROMENI OVO ***

            Mail::to($recipientEmail)->send(new ContactFormMail($validatedData));

            return back()->with('success', 'Poruka je uspešno poslata!');

        } catch (\Exception $e) {
            // Loguj grešku
            Log::error('Greška prilikom slanja kontakt emaila: ' . $e->getMessage());

            // Vrati korisnika sa porukom o grešci
            return back()
                        ->withInput() // Sačuvaj unete podatke
                        ->with('error', 'Došlo je do greške prilikom slanja poruke. Molimo pokušajte kasnije.');
        }

        // Privremeno
        // return 'Validacija je prošla! Podaci: ' . print_r($validatedData, true);

        // Zamenićemo ovo sa slanjem emaila i redirectom
        return back()->with('success', 'Poruka je privremeno primljena (još uvek ne šaljemo email).');
    }
}
