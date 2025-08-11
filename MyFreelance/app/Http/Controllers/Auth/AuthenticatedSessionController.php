<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
      // Autentifikacija korisnika
      $request->authenticate();

      $request->session()->regenerate();

      // Dohvatanje autentifikovanog korisnika
      $user = Auth::user();

      // Redirekcija na osnovu uloge korisnika
      if ($user->role === User::ROLE_FREELANCER) {
          // Redirektuj freelancera na njegovu početnu stranicu
          return redirect()->intended(route('freelancer.home'));
      } elseif ($user->role === User::ROLE_CLIENT) {
          // Redirektuj klijenta na njegovu početnu stranicu
          return redirect()->intended(route('client.home'));
      }

      // Podrazumevana redirekcija za ostale uloge (npr. administrator)
      return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
