<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Providers;

use Filament\Panel;
use Modules\Notify\Providers\Filament\AdminPanelProvider;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

=======
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');

>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
test('admin panel provider returns a panel instance', function () {
    $provider = new AdminPanelProvider(app());

    $panel = $provider->panel(Panel::make());

    Assert::assertInstanceOf(Panel::class, $panel);
});
