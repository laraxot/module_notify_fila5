<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Pages;

<<<<<<< HEAD
use Modules\Notify\Filament\Pages\SettingPage;
use Modules\Notify\Tests\TestCase;

uses(\Modules\Notify\Tests\TestCase::class);
=======
use Filament\Widgets\WidgetConfiguration;
use Modules\Notify\Filament\Pages\SettingPage;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('setting page returns env widget in header', function () {
    $page = new SettingPage;

    $widgets = $page->getHeaderWidgets();

<<<<<<< HEAD
=======
    expect($widgets)->toBeArray()->toHaveCount(1)
        ->and($widgets[0])->toBeInstanceOf(WidgetConfiguration::class);
>>>>>>> 929ed821d (.)
});
