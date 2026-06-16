<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

describe('NotificationType Business Logic', function () {
    test('notification type extends eloquent model', function () {
            });
=======

uses(TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Tests\TestCase;

describe('NotificationType Business Logic', function () {
    test('notification type extends eloquent model', function () {
        expect(is_subclass_of(NotificationType::class, Model::class))->toBeTrue();
    });
>>>>>>> 929ed821d (.)

    test('notification type has expected fillable fields', function () {
        $reflection = new \ReflectionClass(NotificationType::class);
        $property = $reflection->getProperty('fillable');
        $property->setAccessible(true);

        $expectedFillable = [
            'name',
            'description',
            'template',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $property->getValue($reflection->newInstanceWithoutConstructor()));
=======
        expect($property->getValue($reflection->newInstanceWithoutConstructor()))->toEqual($expectedFillable);
>>>>>>> 929ed821d (.)
    });

    test('notification type model structure is correct', function () {
        // Verify class exists and extends Model
<<<<<<< HEAD
        Assert::assertTrue(class_exists(NotificationType::class));
            });
=======
        expect(class_exists(NotificationType::class))->toBeTrue();
        expect(is_subclass_of(NotificationType::class, Model::class))->toBeTrue();
    });
>>>>>>> 929ed821d (.)
});
