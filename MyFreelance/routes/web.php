<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Auth;

//<--------------- Start of Navigation --------------->
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === \App\Models\User::ROLE_FREELANCER) {
            return redirect()->route('freelancer.home');
        } elseif (Auth::user()->role === \App\Models\User::ROLE_CLIENT) {
            return redirect()->route('client.home');
        }
    }
    return view('welcome'); // gosti vide samo welcome
});

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');
//<--------------- End of Navigation --------------->

//<--------------- Start Account of Freelancer --------------->
Route::middleware(['auth', CheckUserRole::class . ':freelancer'])->prefix('freelancer')->group(function () {
    Route::get('/home', function () {
        return view('freelancer.home');
    })->name('freelancer.home');

    Route::get('/projects', function () {
        return view('freelancer.browse-projects');
    })->name('freelancer.browse-projects');

    Route::get('/my-proposals', function () {
        return view('freelancer.my-proposals');
    })->name('freelancer.my-proposals');

    Route::get('/messages', function () {
        return view('freelancer.messages');
    })->name('freelancer.messages');

    Route::get('/dashboard', function () {
        return view('freelancer.dashboard.index');
    })->name('freelancer.dashboard');

    Route::get('/my-profile', function () {
        return view('freelancer.profile.index');
    })->name('freelancer.profile');

    Route::get('/settings', function () {
        return view('freelancer.settings.index');
    })->name('freelancer.settings');
});
//<--------------- End Account of Freelancer --------------->

//<--------------- Start Account of Client --------------->
Route::middleware(['auth', CheckUserRole::class . ':client'])->prefix('client')->group(function () {
    Route::get('/home', function () {
        return view('client.home');
    })->name('client.home');

    Route::get('/browse-freelancers', function () {
        return view('client.browse-freelancers');
    })->name('client.browse-freelancers');

    Route::get('/my-projects', function () {
        return view('client.my-projects');
    })->name('client.my-projects');

    Route::get('/messages', function () {
        return view('client.messages');
    })->name('client.messages');

    Route::get('/dashboard', function () {
        return view('client.dashboard.index');
    })->name('client.dashboard');

    Route::get('/my-profile', function () {
        return view('client.profile.index');
    })->name('client.profile');

    Route::get('/settings', function () {
        return view('client.settings.index');
    })->name('client.settings');
});
//<--------------- End Account of Client --------------->

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

/*
Route::middleware(['auth', CheckUserRole::class . ':administrator'])->group(function () {
    Route::get('/admin/dashboard', function () {
        // ...
    })->name('admin.dashboard');
});
*/

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';
