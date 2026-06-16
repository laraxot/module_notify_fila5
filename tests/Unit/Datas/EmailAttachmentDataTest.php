<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;
<<<<<<< HEAD
use Modules\Notify\Datas\EmailAttachmentData;
use PHPUnit\Framework\Assert;
=======

use Modules\Notify\Datas\EmailAttachmentData;
>>>>>>> 929ed821d (.)
use Spatie\LaravelData\Data;

describe('EmailAttachmentData', function () {
    it('can be referenced via reflection without instantiation', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has correct namespace', function () {
        Assert::assertStringStartsWith('Modules\Notify\Datas', (string) EmailAttachmentData::class);
=======
        expect($reflection->isInstantiable())->toBeTrue();
    });

    it('has correct namespace', function () {
        expect(EmailAttachmentData::class)->toStartWith('Modules\Notify\Datas');
>>>>>>> 929ed821d (.)
    });

    it('extends Spatie Data', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isSubclassOf(Data::class));
=======
        expect($reflection->isSubclassOf(Data::class))->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);
        $properties = $reflection->getProperties();

        $propertyNames = array_map(fn ($p) => $p->getName(), $properties);

<<<<<<< HEAD
        \assertListContains('name', $propertyNames);
        \assertListContains('contentType', $propertyNames);
    });

    it('has getContent method', function () {
            });
=======
        expect($propertyNames)->toContain('name');
        expect($propertyNames)->toContain('contentType');
    });

    it('has getContent method', function () {
        expect(method_exists(EmailAttachmentData::class, 'getContent'))->toBeTrue();
    });
>>>>>>> 929ed821d (.)

    it('has constructor with required parameters', function () {
        $reflection = new \ReflectionClass(EmailAttachmentData::class);
        $constructor = $reflection->getConstructor();

<<<<<<< HEAD
        Assert::assertNotNull($constructor);
        $params = $constructor->getParameters();
        Assert::assertCount(3, $params);
=======
        expect($constructor)->not->toBeNull();

        $params = $constructor->getParameters();
        expect($params)->toHaveCount(3);
>>>>>>> 929ed821d (.)
    });
});
