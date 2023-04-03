<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // kita beri penjagaan (gerbang) untuk yang memiliki otorisasi username mhdryan09
        // nama gate nya adalah admin
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
    }
}
