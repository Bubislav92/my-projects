<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\WishListController;
use App\Models\User; // Ukljucite User model da koristite konstante
use Illuminate\Support\Facades\Auth; // Za Auth::user() i Auth::check()
use App\Http\Controllers\PayPalController; // Dodajte ovaj use iskaz
use App\Http\Controllers\StripeController; // Dodajte ovaj use iskaz
use App\Http\Controllers\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ProductReviewController;


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('/', [HomeController::class, 'index'])->name('welcome');






    //Route::get('/', [ProductController::class, 'welcome'])->name('welcome'); // Prikaz početne sa test podacima

    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

    // <-------------------- Start Routes of Products-------------------->
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/products/{product}/reviews', [ProductReviewController::class, 'store'])->name('products.reviews.store');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    // <-------------------- End Routes of Products -------------------->

    Route::get('/faqs', [FAQsController::class, 'index'])->name('faqs');
    Route::get('/privacy_policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');

    Route::middleware(['auth', 'role:' . User::ROLE_USER])->group(function () {

        // <-------------------- Start Routes of Dashboard -------------------->
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
        Route::get('/dashboard/wishlist', [DashboardController::class, 'wishlist'])->name('dashboard.wishlist');
        Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
        Route::get('/dashboard/orders/{order}/details', [DashboardController::class, 'showOrderJson'])->name('dashboard.orders.details');
        // <-------------------- End Routes of Dashboard -------------------->

        // <-------------------- Start Routes of WishlistCart -------------------->
        Route::get('/wishlist', [WishListController::class, 'index'])->name('components.wishlist');
        Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.store'); // Ruta za dodavanje
        Route::delete('/wishlist/remove/{wishlistItem}', [WishlistController::class, 'destroy'])->name('wishlist.destroy'); // Ruta za brisanje
        // <-------------------- End Routes of Wishlist -------------------->

        // <-------------------- Start Routes of Cart -------------------->
        Route::post('/cart/store', [CartController::class, 'store'])->middleware(['auth'])->name('cart.store'); // Ovo bi trebalo da je ruta za dodavanje
        Route::get('/cart', [CartController::class, 'index'])->middleware(['auth'])->name('components.cart');
        Route::patch('/cart/update/{cartItem}', [CartController::class, 'update'])->middleware(['auth'])->name('cart.update');
        Route::delete('/cart/remove/{cartItem}', [CartController::class, 'destroy'])->middleware(['auth'])->name('cart.destroy');
        Route::post('/cart/clear', [CartController::class, 'clearCart'])->middleware(['auth'])->name('cart.clear');
        // <-------------------- End Routes of Cart -------------------->

        // <-------------------- Start Routes of Checkout -------------------->
        Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/process', [CheckOutController::class, 'processOrder'])->name('checkout.process_order');
        Route::get('/checkout/success', function() { return view('checkout.success'); })->name('checkout.success');
        Route::get('/checkout/cancel', function() { return view('checkout.cancel'); })->name('checkout.cancel');
        Route::get('/checkout/pay-pending/{order}', [CheckOutController::class, 'payPending'])
                ->name('checkout.pay_pending')
                ->middleware('signed');
        // <-------------------- End Routes of Checkout -------------------->

        // <-------------------- Start Routes of PayPal -------------------->
        Route::post('/paypal/payment', [PayPalController::class, 'processPayment'])->name('paypal.process');
        Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
        Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
        // <-------------------- End Routes of PayPal -------------------->

        // <-------------------- Start Routes of Stripe -------------------->
        Route::post('/stripe/payment', [StripeController::class, 'processPayment'])->name('stripe.process');
        Route::get('/stripe/success/{order}', [StripeController::class, 'success'])->name('stripe.success');
        Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
        // <-------------------- End Routes of Stripe -------------------->                                                                                            // (razmotrite da ga dodate u cancel_url)
    });

    Route::get('/refund-policy', function () {
        return view('refund_policy'); // Moraš kreirati ovaj blade fajl
    })->name('refund-policy');

    require __DIR__.'/auth.php';

});

/*
Route::get('/dashboard/orders', function() { return view('dashboard'); })->name('dashboard.orders');
Route::get('/dashboard/wishlist', function() { return view('dashboard'); })->name('dashboard.wishlist'); // Ovo će biti tvoja komponenta wishlist ako želiš
Route::get('/dashboard/profile', function() { return view('dashboard'); })->name('dashboard.profile');
*/

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

// Dashboard ruta: Dinamicki preusmerava na osnovu uloge
    // Ovo je standardna Breeze dashboard ruta
    // Dashboard ruta: Dinamicki preusmerava na osnovu uloge
    // OBAVEZNO: Dodajte DocBlock da Intephense prepozna isAdmin()
/*
    Route::get('/dashboard', function () { 
  //       @var \App\Models\User $user  // Ova linija je kljucna!
        $user = Auth::user();

        if ($user->isAdmin()) {
            // Administratori se preusmeravaju na Filament panel
            return redirect()->to('/admin');
        } else {
            // Obicni korisnici ostaju na svom standardnom dashboardu
            return view('dashboard');
        }
    })->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


