<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Biar semua komponen anonim di folder components dikenali
        Blade::anonymousComponentPath(resource_path('views/components'), '');

        // Daftarin komponen manual dengan nama custom (camelCase)
        Blade::component('components.layoutAdmin', 'layoutAdmin');
        Blade::component('components.layoutUser', 'layoutUser');
        Blade::component('components.layoutAuth', 'layoutAuth');

        Blade::component('components.sidebarAdmin', 'sidebarAdmin');
        Blade::component('components.sidebarUser', 'sidebarUser');
        Blade::component('components.navbar', 'navbar');
    }
}
