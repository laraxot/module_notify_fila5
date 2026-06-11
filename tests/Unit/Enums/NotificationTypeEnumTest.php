<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use PHPUnit\Framework\Assert;
use Modules\Notify\Enums\NotificationTypeEnum;
use PHPUnit\Framework\TestCase;

class NotificationTypeEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        Assert::assertCount(3, NotificationTypeEnum::cases());

        Assert::assertEquals('email', NotificationTypeEnum::EMAIL->value);
        Assert::assertEquals('sms', NotificationTypeEnum::SMS->value);
        Assert::assertEquals('push', NotificationTypeEnum::PUSH->value);
    }

    /** @test */
    public function label_returns_localized_string(): void
    {
        Assert::assertNotEmpty(NotificationTypeEnum::EMAIL->getLabel());
        Assert::assertNotEmpty(NotificationTypeEnum::SMS->getLabel());
        Assert::assertNotEmpty(NotificationTypeEnum::PUSH->getLabel());
    }

    /** @test */
    public function icon_returns_heroicon_string(): void
    {
        Assert::assertEquals('heroicon-o-envelope', NotificationTypeEnum::EMAIL->getIcon());
        Assert::assertEquals('heroicon-o-device-phone-mobile', NotificationTypeEnum::SMS->getIcon());
        Assert::assertEquals('heroicon-o-bell', NotificationTypeEnum::PUSH->getIcon());
    }

    /** @test */
    public function color_returns_correct_color(): void
    {
        Assert::assertEquals('success', NotificationTypeEnum::EMAIL->getColor());
        Assert::assertEquals('warning', NotificationTypeEnum::SMS->getColor());
        Assert::assertEquals('info', NotificationTypeEnum::PUSH->getColor());
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, NotificationTypeEnum::cases());
        $uniqueValues = array_unique($values);

        Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = NotificationTypeEnum::cases();
        Assert::assertCount(3, $cases);

        foreach ($cases as $case) {
            Assert::assertInstanceOf(NotificationTypeEnum::class, $case);
        }
    }

    /** @test */
    public function all_cases_have_required_methods(): void
    {
        foreach (NotificationTypeEnum::cases() as $case) {
            Assert::assertNotEmpty($case->getLabel());
            Assert::assertNotEmpty($case->getIcon());
            Assert::assertNotEmpty($case->getColor());
        }
    }
}
