<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Console;

use Modules\Notify\Console\Commands\TelegramWebhook;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('telegram webhook command has expected signature and handle returns void', function () {
    $command = new TelegramWebhook;

<<<<<<< HEAD
    Assert::assertSame('telegram:set-webhook', $command->getName());
    $command->handle();
=======
    expect($command->getName())->toBe('telegram:set-webhook');

    $result = $command->handle();
    expect($result)->toBeNull();
>>>>>>> 929ed821d (.)
});
