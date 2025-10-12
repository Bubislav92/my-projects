<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View Composer za prosljeđivanje globalnih varijabli u header
        View::composer('*', function ($view) {
            $view->with([
                'supportedLocales' => LaravelLocalization::getSupportedLocales(),
                'currentLocale' => LaravelLocalization::getCurrentLocale(),
            ]);
        });

         // Dodaj ovo da Laravel koristi public_html kao public path
         $this->app->bind('path.public', function() {
            return base_path('../public_html');
        });
    }
}
