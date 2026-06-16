<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use Modules\Notify\Enums\NotificationLogStatusEnum;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('it exposes all expected statuses', function () {
    $values = array_map(static fn (NotificationLogStatusEnum $case): string => $case->value, NotificationLogStatusEnum::cases());

<<<<<<< HEAD
    Assert::assertSame([
=======
    expect($values)->toBe([
>>>>>>> 929ed821d (.)
        'pending',
        'sent',
        'delivered',
        'failed',
        'opened',
        'clicked',
<<<<<<< HEAD
    ], $values);
});

test('it returns expected label color and icon', function () {
    foreach (NotificationLogStatusEnum::cases() as $case) {
                            }
});

test('it reports completed pending and failed states correctly', function () {
    Assert::assertTrue(NotificationLogStatusEnum::DELIVERED->isCompleted());
    Assert::assertTrue(NotificationLogStatusEnum::OPENED->isCompleted());
    Assert::assertTrue(NotificationLogStatusEnum::CLICKED->isCompleted());
    Assert::assertFalse(NotificationLogStatusEnum::SENT->isCompleted());
    Assert::assertTrue(NotificationLogStatusEnum::PENDING->isPending());
    Assert::assertTrue(NotificationLogStatusEnum::FAILED->isFailed());
=======
    ]);
});

test('it returns expected label color and icon', function () {
    expect(NotificationLogStatusEnum::PENDING->label())->toBe('In attesa')
        ->and(NotificationLogStatusEnum::PENDING->color())->toBe('gray')
        ->and(NotificationLogStatusEnum::PENDING->icon())->toBe('heroicon-o-clock')
        ->and(NotificationLogStatusEnum::FAILED->label())->toBe('Fallito')
        ->and(NotificationLogStatusEnum::FAILED->color())->toBe('red')
        ->and(NotificationLogStatusEnum::FAILED->icon())->toBe('heroicon-o-x-circle');
});

test('it reports completed pending and failed states correctly', function () {
    expect(NotificationLogStatusEnum::DELIVERED->isCompleted())->toBeTrue()
        ->and(NotificationLogStatusEnum::OPENED->isCompleted())->toBeTrue()
        ->and(NotificationLogStatusEnum::CLICKED->isCompleted())->toBeTrue()
        ->and(NotificationLogStatusEnum::SENT->isCompleted())->toBeFalse()
        ->and(NotificationLogStatusEnum::PENDING->isPending())->toBeTrue()
        ->and(NotificationLogStatusEnum::FAILED->isFailed())->toBeTrue();
>>>>>>> 929ed821d (.)
});
