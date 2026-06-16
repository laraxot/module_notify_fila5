<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Channels;
<<<<<<< HEAD
use function Safe\file_get_contents;
use Modules\Notify\Channels\TelegramChannel;

use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Channels\TelegramChannel;

>>>>>>> 929ed821d (.)
describe('TelegramChannel', function () {
    it('can be instantiated', function () {
        // TelegramChannel requires TelegramActionFactory in constructor
        // but we can test structure via reflection
        $reflection = new \ReflectionClass(TelegramChannel::class);
<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
=======
        expect($reflection->isInstantiable())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has send method', function () {
        $reflection = new \ReflectionClass(TelegramChannel::class);
        $method = $reflection->getMethod('send');

<<<<<<< HEAD
        Assert::assertTrue($method->isPublic());
=======
        expect($method->isPublic())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(TelegramChannel::class);

<<<<<<< HEAD
        Assert::assertSame('Modules\Notify\Channels', $reflection->getNamespaceName());
=======
        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Channels');
>>>>>>> 929ed821d (.)
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(TelegramChannel::class);
<<<<<<< HEAD
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
=======
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
>>>>>>> 929ed821d (.)
    });

    it('has private factory property', function () {
        $reflection = new \ReflectionClass(TelegramChannel::class);
        $property = $reflection->getProperty('factory');

<<<<<<< HEAD
        Assert::assertTrue($property->isPrivate());
=======
        expect($property->isPrivate())->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
