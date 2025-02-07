<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        $this->app->singleton('hasPermission', function () {
            return function ($moduleId, $action) {
                $user = Auth::user();
                if (!$user || !isset($user->permissions)) {
                    return false;
                }
                // dd($user->role);
                $permission = collect($user->permissions)->firstWhere('module_id', $moduleId);
                return $permission ? $permission[$action] == 1 : false;
            };
        });
    }
}
