<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        Gate::define('active-account', function ($user) {
            return !$user->isActive();
        });


        \Illuminate\Support\Facades\View::composer('dashboardComponents.navBar', function ($view) {
            $supports = \App\Models\Support::whereNull('response')->get();
            $pendingProducts = \App\Models\Product::where('check', 0)->get();
            
            $view->with([
                'supports' => $supports,
                'pendingProducts' => $pendingProducts
            ]);
        });
    }
}
