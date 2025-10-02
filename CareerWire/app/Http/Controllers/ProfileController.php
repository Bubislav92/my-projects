<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // ******************************************************
    //              НОВЕ МЕТОДЕ ЗА SIDEBAR ЛИНКОВЕ
    // ******************************************************
    
    /**
     * Display the form to manage user's work experiences.
     */
    public function editExperience(Request $request): View
    {
        // Враћа view који ће се учитати у десној колони Dashboard-а.
        // Овај view ће садржати форме за додавање/уређивање Experience модела.
        return view('profile.experience', [
            'user' => $request->user(),
            // Морамо преузети сва искуства корисника да бисмо их приказали
            'experiences' => $request->user()->experiences, 
        ]);
    }

    /**
     * Display the form to manage user's privacy settings.
     */
    public function editPrivacy(Request $request): View
    {
        // Враћа view за управљање приватности
        return view('profile.privacy', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the main user settings dashboard (used for the /dashboard route).
     */
    public function showDashboard(Request $request): View
    {
        // Предајемо аутентификованог корисника (Auth::user()) view-у.
        // Ово ће решити грешку 'Undefined variable $user' у парцијалним view-овима.
        return view('dashboard', [
            'user' => $request->user(),
        ]);
    }
    
    // ******************************************************
    //              Напомена: За Jobs.manage треба нови JobController
    // ******************************************************
    
}
