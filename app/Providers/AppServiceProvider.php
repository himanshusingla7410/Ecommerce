<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\View ;
use Illuminate\Support\ServiceProvider;

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
        // Share cart count with all views which use nav-link 
        View::composer('components.nav-link', function($view){
            $view->with('cartCount', Cart::where('ip_address', request()->ip())->count());
        });



    }
}
