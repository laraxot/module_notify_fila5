<?php

declare(strict_types=1);

namespace Modules\Notify\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
<<<<<<< HEAD
use Modules\Notify\Providers\Concerns\MergesNotifyConfigFromEnv;
=======
>>>>>>> 929ed821d (.)
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Override;
use Webmozart\Assert\Assert;

class NotifyServiceProvider extends XotBaseServiceProvider
{
<<<<<<< HEAD
    use MergesNotifyConfigFromEnv;

=======
>>>>>>> 929ed821d (.)
    public string $name = 'Notify';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    #[Override]
<<<<<<< HEAD
    public function register(): void
    {
        parent::register();
        $this->mergeNotifyModuleConfigFromEnv();
    }

    #[Override]
=======
>>>>>>> 929ed821d (.)
    public function boot(): void
    {
        parent::boot();
        // if (! app()->environment('production')) {
        $mail = TenantService::config('mail');
        Assert::isArray($mail);
        $fallback_to = Arr::get($mail, 'fallback_to', null);
        if (is_string($fallback_to)) {
            Mail::alwaysTo($fallback_to);
        }

        // }
    }
}
