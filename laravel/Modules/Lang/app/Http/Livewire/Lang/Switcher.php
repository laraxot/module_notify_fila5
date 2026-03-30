<?php

/**
 * @see https://github.com/laravel/framework/discussions/49574
 */

declare(strict_types=1);

namespace Modules\Lang\Http\Livewire\Lang;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('{path}', RedirectToPreferredLanguage::class)
// ->where('path', '^(?!(en|de)).*');

class Switcher extends Component
{
    public string $lang;

    public array $langs;

    public function mount(): void
    {
        $this->lang = app()->getLocale();
        $langs = LaravelLocalization::getSupportedLocales();
        unset($langs[$this->lang]);

        $currentUrl = request()->getRequestUri();

        $langs = Arr::map($langs, function (array $item, string $key) use ($currentUrl): array {
            // @phpstan-ignore staticMethod.notFound
            $url = LaravelLocalization::getLocalizedURL($key, $currentUrl, [], true);

            if (false !== $url) {
                if (! is_string($url)) {
                    $url = '/'.$key;
                } else {
                    $url = Str::of($url)->replace(url(''), '')->toString();
                }
            } else {
                $url = '/'.$key;
            }

            $item['url'] = $url;

            return $item;
        });

        $this->langs = $langs;
    }

    public function render(): View
    {
        $view = 'lang::livewire.lang.change';
        $viewParams = [
            'view' => $view,
        ];

        return view($view, $viewParams);
    }
}
