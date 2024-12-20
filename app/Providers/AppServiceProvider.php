<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
use Livewire\Livewire;
use App\http\Middleware\CheckRole;
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
        $this->app['router']->aliasMiddleware('admin', Admin::class);
        \Carbon\Carbon::setLocale('id');
    }
}
