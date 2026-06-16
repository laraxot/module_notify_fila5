<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< HEAD
use Modules\Notify\Datas\NotificationData;
use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Datas\NotificationData;
>>>>>>> 929ed821d (.)
use Spatie\LaravelData\Data;

describe('NotificationData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) NotificationData::class);
=======
        expect($reflection->isInstantiable())->toBeTrue();
    });

    it('has correct namespace', function () {
        expect(NotificationData::class)->toStartWith('Modules\Notify\Datas');
>>>>>>> 929ed821d (.)
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(NotificationData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isSubclassOf(Data::class));
=======
        expect($reflection->isSubclassOf(Data::class))->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(NotificationData::class);
        $properties = $reflection->getProperties();

        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

<<<<<<< HEAD
        \assertListContains('from', $propertyNames);
        \assertListContains('recipient', $propertyNames);
        \assertListContains('body', $propertyNames);
        \assertListContains('channels', $propertyNames);
    });

    it('has getSmsData method', function () {
            });

    it('has routeNotificationFor method', function () {
            });

    it('has from method', function () {
            });
=======
        expect($propertyNames)->toContain('from');
        expect($propertyNames)->toContain('recipient');
        expect($propertyNames)->toContain('body');
        expect($propertyNames)->toContain('channels');
    });

    it('has getSmsData method', function () {
        expect(method_exists(NotificationData::class, 'getSmsData'))->toBeTrue();
    });

    it('has routeNotificationFor method', function () {
        expect(method_exists(NotificationData::class, 'routeNotificationFor'))->toBeTrue();
    });

    it('has from method', function () {
        expect(method_exists(NotificationData::class, 'from'))->toBeTrue();
    });
>>>>>>> 929ed821d (.)
});
