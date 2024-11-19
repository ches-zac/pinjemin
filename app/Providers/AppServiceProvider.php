<?php

namespace App\Providers;

use Livewire\Livewire;
use App\http\Middleware\CheckRole;
use Illuminate\Support\ServiceProvider;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\User\Dashboard as UserDashboard;


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
        $this->app['router']->aliasMiddleware('role', CheckRole::class);
        Livewire::component('admin.dashboard', AdminDashboard::class);
        Livewire::component('user.dashboard', UserDashboard::class);
    }
}
