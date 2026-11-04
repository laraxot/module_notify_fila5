<?php

declare(strict_types=1);

use Modules\Notify\Datas\NotifyConfigData;
use Modules\Notify\Filament\Pages\SettingPage;
use Tests\TestCase;

uses(TestCase::class)->group('no-notify-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('notify')
        ->and(SettingPage::getConfigDataClass())->toBe(NotifyConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(NotifyConfigData::tenantConfigName())->toBe('notify');
});
