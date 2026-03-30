<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Themes\Sixteen\Providers\ThemeServiceProvider;

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
        // Register Sixteen theme service provider
        $this->app->register(ThemeServiceProvider::class);
    }
}
