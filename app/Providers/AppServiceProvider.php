<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\User;

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
    public function boot()
    {
        Carbon::setLocale('id');

        Gate::define('admin-gate', function(User $user){
            return $user->jenis_user_id == 2 || !auth()->check();
        });
    }
}
