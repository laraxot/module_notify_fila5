<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Console\Commands;

use Illuminate\Console\Command;
use Modules\Notify\Console\Commands\SendMailCommand;

<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> 929ed821d (.)
describe('SendMailCommand', function () {
    it('has correct signature', function () {
        $command = new SendMailCommand;

<<<<<<< HEAD
        Assert::assertSame('notify:send-mail', $command->getName());
=======
        expect($command->getName())->toBe('notify:send-mail');
>>>>>>> 929ed821d (.)
    });

    it('has description', function () {
        $command = new SendMailCommand;

        $description = $command->getDescription();

<<<<<<< HEAD
        Assert::assertNotEmpty($description);
=======
        expect($description)->not->toBeEmpty();
        expect($description)->toBeString();
>>>>>>> 929ed821d (.)
    });

    it('extends command', function () {
        $command = new SendMailCommand;

<<<<<<< HEAD
        Assert::assertInstanceOf(Command::class, $command);
=======
        expect($command)->toBeInstanceOf(Command::class);
>>>>>>> 929ed821d (.)
    });

    it('has handle method', function () {
        $command = new SendMailCommand;

<<<<<<< HEAD
            });
=======
        expect(method_exists($command, 'handle'))->toBeTrue();
    });
>>>>>>> 929ed821d (.)
});
