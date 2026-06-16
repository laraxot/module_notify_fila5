<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use Modules\Notify\Enums\NotificationTypeEnum;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

it('has correct cases', function (): void {
    Assert::assertCount(3, NotificationTypeEnum::cases());

    Assert::assertSame('email', NotificationTypeEnum::EMAIL->value);
    Assert::assertSame('sms', NotificationTypeEnum::SMS->value);
    Assert::assertSame('push', NotificationTypeEnum::PUSH->value);
});

it('label returns localized string', function (): void {
    Assert::assertNotEmpty(NotificationTypeEnum::EMAIL->getLabel());
    Assert::assertNotEmpty(NotificationTypeEnum::SMS->getLabel());
    Assert::assertNotEmpty(NotificationTypeEnum::PUSH->getLabel());
});

it('icon returns non empty string', function (): void {
    Assert::assertNotEmpty(NotificationTypeEnum::EMAIL->getIcon());
    Assert::assertNotEmpty(NotificationTypeEnum::SMS->getIcon());
    Assert::assertNotEmpty(NotificationTypeEnum::PUSH->getIcon());
});

it('color returns non empty string', function (): void {
    Assert::assertNotEmpty(NotificationTypeEnum::EMAIL->getColor());
    Assert::assertNotEmpty(NotificationTypeEnum::SMS->getColor());
    Assert::assertNotEmpty(NotificationTypeEnum::PUSH->getColor());
});

it('each case has unique value', function (): void {
    $values = array_map(static fn ($case) => $case->value, NotificationTypeEnum::cases());
    $uniqueValues = array_unique($values);

    Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
});

it('cases returns all enum instances', function (): void {
    $cases = NotificationTypeEnum::cases();
    Assert::assertCount(3, $cases);

    foreach ($cases as $case) {
        Assert::assertInstanceOf(NotificationTypeEnum::class, $case);
    }
});

it('all cases have required methods', function (): void {
    foreach (NotificationTypeEnum::cases() as $case) {
        Assert::assertNotEmpty($case->getLabel());
        Assert::assertNotEmpty($case->getIcon());
        Assert::assertNotEmpty($case->getColor());
    }
});
=======
use PHPUnit\Framework\TestCase;

class NotificationTypeEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        $this->assertCount(3, NotificationTypeEnum::cases());

        $this->assertEquals('email', NotificationTypeEnum::EMAIL->value);
        $this->assertEquals('sms', NotificationTypeEnum::SMS->value);
        $this->assertEquals('push', NotificationTypeEnum::PUSH->value);
    }

    /** @test */
    public function label_returns_localized_string(): void
    {
        $this->assertIsString(NotificationTypeEnum::EMAIL->label());
        $this->assertIsString(NotificationTypeEnum::SMS->label());
        $this->assertIsString(NotificationTypeEnum::PUSH->label());
    }

    /** @test */
    public function icon_returns_heroicon_string(): void
    {
        $this->assertEquals('heroicon-o-envelope', NotificationTypeEnum::EMAIL->icon());
        $this->assertEquals('heroicon-o-device-phone-mobile', NotificationTypeEnum::SMS->icon());
        $this->assertEquals('heroicon-o-bell', NotificationTypeEnum::PUSH->icon());
    }

    /** @test */
    public function color_returns_correct_color(): void
    {
        $this->assertEquals('success', NotificationTypeEnum::EMAIL->color());
        $this->assertEquals('warning', NotificationTypeEnum::SMS->color());
        $this->assertEquals('info', NotificationTypeEnum::PUSH->color());
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, NotificationTypeEnum::cases());
        $uniqueValues = array_unique($values);

        $this->assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = NotificationTypeEnum::cases();

        $this->assertIsArray($cases);
        $this->assertCount(3, $cases);

        foreach ($cases as $case) {
            $this->assertInstanceOf(NotificationTypeEnum::class, $case);
        }
    }

    /** @test */
    public function all_cases_have_required_methods(): void
    {
        foreach (NotificationTypeEnum::cases() as $case) {
            $this->assertIsString($case->label());
            $this->assertIsString($case->icon());
            $this->assertIsString($case->color());
        }
    }
}
>>>>>>> 929ed821d (.)
