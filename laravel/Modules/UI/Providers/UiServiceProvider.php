<?php

declare(strict_types=1);

namespace Modules\UI\Providers;

use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;

class UiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerBladeIcons();
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'ui');
    }

    /**
     * Register custom Blade icons for UI module
     */
    protected function registerBladeIcons(): void
    {
        // Register brands icons directory
        Blade::anonymousComponentPath(
            __DIR__.'/../../resources/svg/brands',
            'ui-brands'
        );
        
        // Register icon alias for Filament way
        FilamentAsset::register([
            // Social brands
            Asset::svg(__DIR__.'/../../resources/svg/brands/facebook.svg', 'ui-brands.facebook'),
            Asset::svg(__DIR__.'/../../resources/svg/brands/twitter.svg', 'ui-brands.twitter'),
            Asset::svg(__DIR__.'/../../resources/svg/brands/youtube.svg', 'ui-brands.youtube'),
            Asset::svg(__DIR__.'/../../resources/svg/brands/telegram.svg', 'ui-brands.telegram'),
            Asset::svg(__DIR__.'/../../resources/svg/brands/whatsapp.svg', 'ui-brands.whatsapp'),
            Asset::svg(__DIR__.'/../../resources/svg/brands/rss.svg', 'ui-brands.rss'),
        ], 'ui-module');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
