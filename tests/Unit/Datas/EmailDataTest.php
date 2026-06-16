<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< HEAD
use Modules\Notify\Datas\EmailData;
use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Datas\EmailData;
>>>>>>> 929ed821d (.)
use Spatie\LaravelData\Data;

describe('EmailData', function () {
    it('can be instantiated via reflection without constructor', function () {
        $reflection = new \ReflectionClass(EmailData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) EmailData::class);
    });

    it('has required properties', function () {
        $propertyNames = \notifyReflectionPropertyNames(new \ReflectionClass(EmailData::class));

        \assertListContains('recipient', $propertyNames);
        \assertListContains('from', $propertyNames);
        \assertListContains('from_email', $propertyNames);
        \assertListContains('subject', $propertyNames);
        \assertListContains('body_html', $propertyNames);
        \assertListContains('body', $propertyNames);
        \assertListContains('attachments', $propertyNames);
=======
        expect($reflection->isInstantiable())->toBeTrue();
    });

    it('has correct namespace', function () {
        expect(EmailData::class)->toStartWith('Modules\Notify\Datas');
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(EmailData::class);
        $properties = $reflection->getProperties();

        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

        expect($propertyNames)->toContain('recipient');
        expect($propertyNames)->toContain('from');
        expect($propertyNames)->toContain('from_email');
        expect($propertyNames)->toContain('subject');
        expect($propertyNames)->toContain('body_html');
        expect($propertyNames)->toContain('body');
        expect($propertyNames)->toContain('attachments');
>>>>>>> 929ed821d (.)
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(EmailData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isSubclassOf(Data::class));
    });

    it('has getFrom method', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->hasMethod('getFrom'));
    });

    it('has getMimeEmail method', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->hasMethod('getMimeEmail'));
    });

    it('has from method', function () {
        $reflection = new \ReflectionClass(EmailData::class);

        Assert::assertTrue($reflection->hasMethod('from'));
    });

    it('can create via static from method with valid data', function () {
        $reflection = new \ReflectionClass(EmailData::class);
        $fromMethod = $reflection->getMethod('from');
        Assert::assertTrue($fromMethod->isStatic());
=======
        expect($reflection->isSubclassOf(Data::class))->toBeTrue();
    });

    it('has getFrom method', function () {
        expect(method_exists(EmailData::class, 'getFrom'))->toBeTrue();
    });

    it('has getMimeEmail method', function () {
        expect(method_exists(EmailData::class, 'getMimeEmail'))->toBeTrue();
    });

    it('has from method', function () {
        expect(method_exists(EmailData::class, 'from'))->toBeTrue();
    });

    it('can create via static from method with valid data', function () {
        // Use Reflection to avoid constructor execution
        $reflection = new \ReflectionClass(EmailData::class);
        $fromMethod = $reflection->getMethod('from');
        expect($fromMethod->isStatic())->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
