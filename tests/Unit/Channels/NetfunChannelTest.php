<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Channels;
<<<<<<< HEAD
use function Safe\file_get_contents;
use Modules\Notify\Channels\NetfunChannel;

use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Channels\NetfunChannel;

>>>>>>> 929ed821d (.)
describe('NetfunChannel', function () {
    it('can be instantiated', function () {
        // NetfunChannel requires SendNetfunSMSAction in constructor
        // but we can test structure via reflection
        $reflection = new \ReflectionClass(NetfunChannel::class);
<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
=======
        expect($reflection->isInstantiable())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has send method', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
        $method = $reflection->getMethod('send');

<<<<<<< HEAD
        Assert::assertTrue($method->isPublic());
=======
        expect($method->isPublic())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);

<<<<<<< HEAD
        Assert::assertSame('Modules\Notify\Channels', $reflection->getNamespaceName());
=======
        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Channels');
>>>>>>> 929ed821d (.)
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
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

    it('has protected sendSMSAction property', function () {
        $reflection = new \ReflectionClass(NetfunChannel::class);
        $property = $reflection->getProperty('sendSMSAction');

<<<<<<< HEAD
        Assert::assertTrue($property->isProtected());
=======
        expect($property->isProtected())->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
