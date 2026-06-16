<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< HEAD
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Datas\SmsData;
>>>>>>> 929ed821d (.)

describe('SmsData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(SmsData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) SmsData::class);
=======
        expect($reflection->isInstantiable())->toBeTrue();
    });

    it('has correct namespace', function () {
        expect(SmsData::class)->toStartWith('Modules\Notify\Datas');
>>>>>>> 929ed821d (.)
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(SmsData::class);
        $properties = $reflection->getProperties();

        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

<<<<<<< HEAD
        \assertListContains('from', $propertyNames);
        \assertListContains('recipient', $propertyNames);
        \assertListContains('body', $propertyNames);
    });

    it('has from method', function () {
            });
=======
        expect($propertyNames)->toContain('from');
        expect($propertyNames)->toContain('recipient');
        expect($propertyNames)->toContain('body');
    });

    it('has from method', function () {
        expect(method_exists(SmsData::class, 'from'))->toBeTrue();
    });
>>>>>>> 929ed821d (.)

    it('from method is static', function () {
        $reflection = new \ReflectionClass(SmsData::class);
        $fromMethod = $reflection->getMethod('from');

<<<<<<< HEAD
        Assert::assertTrue($fromMethod->isStatic());
=======
        expect($fromMethod->isStatic())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has constructor', function () {
        $reflection = new \ReflectionClass(SmsData::class);

<<<<<<< HEAD
        Assert::assertNotNull($reflection->getConstructor());
=======
        expect($reflection->getConstructor())->not->toBeNull();
>>>>>>> 929ed821d (.)
    });

    it('constructor accepts array parameter', function () {
        $reflection = new \ReflectionClass(SmsData::class);
        $constructor = $reflection->getConstructor();
<<<<<<< HEAD
        Assert::assertNotNull($constructor);
        $params = $constructor->getParameters();

        Assert::assertCount(1, $params);
        Assert::assertSame('data', $params[0]->getName());
        Assert::assertTrue($params[0]->isArray());
=======
        $params = $constructor->getParameters();

        expect($params)->toHaveCount(1);
        expect($params[0]->getName())->toBe('data');
        expect($params[0]->isArray())->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
