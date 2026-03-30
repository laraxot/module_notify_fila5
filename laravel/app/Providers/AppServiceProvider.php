<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * AppServiceProvider.
 *
 * NOTE: Theme registration is handled dynamically by the Xot module
 * based on configuration in config/{environment}/{domain}/xra.php
 * 
 * The theme is a "vestito" (outfit) - configurable and swappable!
 * 
 * Configuration example:
 * - config/localhost/fixcity/xra.php: 'pub_theme' => 'Sixteen'
 * - config/localhost/fixcity/xra.php: 'register_pub_theme' => true
 * 
 * The Xot module reads this config and automatically registers
 * the appropriate ThemeServiceProvider at runtime.
 * 
 * DO NOT hardcode theme registration here!
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Theme registration is handled dynamically by Xot module
        // No hardcoded theme registration here!
    }
}
