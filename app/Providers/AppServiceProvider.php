<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Support;
use App\Models\Product;
use App\Policies\ProductPolicy;


class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void {}
    public function boot(): void
    {

        


        Gate::define('active-account', function ($user) {
            return !$user->isActive();
        });


        View::composer('dashboardComponents.navBar', function ($view) {
            $supports =Support::whereNull('response')->get();
            $pendingProducts =Product::where('check', 0)->get();
            
            $view->with([
                'supports' => $supports,
                'pendingProducts' => $pendingProducts
            ]);
        });



    }

}
