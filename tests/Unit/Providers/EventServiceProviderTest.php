<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Providers;
<<<<<<< HEAD
use Modules\Notify\Providers\EventServiceProvider;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

use Modules\Notify\Providers\EventServiceProvider;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('event service provider has empty listen map', function () {
    $provider = new EventServiceProvider(app());

    $reflection = new \ReflectionClass($provider);
    $property = $reflection->getProperty('listen');
    $property->setAccessible(true);

<<<<<<< HEAD
    Assert::assertSame([], $property->getValue($provider));
=======
    expect($property->getValue($provider))->toBe([]);
>>>>>>> 929ed821d (.)
});

test('event discovery is enabled', function () {
    $reflection = new \ReflectionClass(EventServiceProvider::class);
    $property = $reflection->getProperty('shouldDiscoverEvents');
    $property->setAccessible(true);

<<<<<<< HEAD
    Assert::assertTrue($property->getValue());
=======
    expect($property->getValue())->toBeTrue();
>>>>>>> 929ed821d (.)
});
