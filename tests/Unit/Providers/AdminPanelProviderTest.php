<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Providers;

use Filament\Panel;
use Modules\Notify\Providers\Filament\AdminPanelProvider;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('admin panel provider returns a panel instance', function () {
    $provider = new AdminPanelProvider(app());

    $panel = $provider->panel(Panel::make());

<<<<<<< HEAD
    Assert::assertInstanceOf(Panel::class, $panel);
=======
    expect($panel)->toBeInstanceOf(Panel::class);
>>>>>>> 929ed821d (.)
});
