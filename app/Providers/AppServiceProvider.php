<?php

namespace App\Providers;

use App\Models\Listing;
use App\Models\User;
use App\Policies\ListingPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('update', [ListingPolicy::class, 'update']);
        Gate::define('delete', [ListingPolicy::class, 'delete']);
        Gate::define('restore', [ListingPolicy::class, 'restore']);
        Gate::define('forceDelete', [ListingPolicy::class, 'forceDelete']);
    }
}
