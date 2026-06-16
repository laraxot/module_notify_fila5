<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use Modules\Notify\Enums\TelegramDriverEnum;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

it('has correct cases', function (): void {
    Assert::assertCount(3, TelegramDriverEnum::cases());

    Assert::assertSame('telegram', TelegramDriverEnum::TELEGRAM->value);
    Assert::assertSame('botapi', TelegramDriverEnum::BOTAPI->value);
    Assert::assertSame('laravel-telegram', TelegramDriverEnum::LARAVEL_TELEGRAM->value);
});

it('options returns correct array', function (): void {
    $options = TelegramDriverEnum::options();
    Assert::assertCount(3, $options);
    Assert::assertSame('Telegram', $options['telegram']);
    Assert::assertSame('Bot API', $options['botapi']);
    Assert::assertSame('Laravel Telegram', $options['laravel-telegram']);
});

it('labels returns localized array', function (): void {
    $labels = TelegramDriverEnum::labels();
    Assert::assertCount(3, $labels);
    Assert::assertArrayHasKey('telegram', $labels);
    Assert::assertArrayHasKey('botapi', $labels);
    Assert::assertArrayHasKey('laravel-telegram', $labels);
});

it('is supported returns true for valid drivers', function (): void {
    Assert::assertTrue(TelegramDriverEnum::isSupported('telegram'));
    Assert::assertTrue(TelegramDriverEnum::isSupported('botapi'));
    Assert::assertTrue(TelegramDriverEnum::isSupported('laravel-telegram'));
});

it('is supported returns false for invalid drivers', function (): void {
    Assert::assertFalse(TelegramDriverEnum::isSupported('invalid'));
    Assert::assertFalse(TelegramDriverEnum::isSupported(''));
    Assert::assertFalse(TelegramDriverEnum::isSupported('TELEGRAM'));
    Assert::assertFalse(TelegramDriverEnum::isSupported('Telegram'));
});

it('get default returns default driver', function (): void {
    config(['telegram.default' => TelegramDriverEnum::TELEGRAM->value]);

    $default = TelegramDriverEnum::getDefault();

    Assert::assertInstanceOf(TelegramDriverEnum::class, $default);
    Assert::assertContains($default, TelegramDriverEnum::cases());
});

it('each case has unique value', function (): void {
    $values = array_map(static fn ($case) => $case->value, TelegramDriverEnum::cases());
    $uniqueValues = array_unique($values);

    Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
});

it('cases returns all enum instances', function (): void {
    $cases = TelegramDriverEnum::cases();
    Assert::assertCount(3, $cases);

    foreach ($cases as $case) {
        Assert::assertInstanceOf(TelegramDriverEnum::class, $case);
    }
});

it('all cases expose non empty description', function (): void {
    foreach (TelegramDriverEnum::cases() as $case) {
        Assert::assertNotEmpty($case->getDescription());
    }
});
=======
use PHPUnit\Framework\TestCase;

class TelegramDriverEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        $this->assertCount(3, TelegramDriverEnum::cases());

        $this->assertEquals('telegram', TelegramDriverEnum::TELEGRAM->value);
        $this->assertEquals('botapi', TelegramDriverEnum::BOTAPI->value);
        $this->assertEquals('laravel-telegram', TelegramDriverEnum::LARAVEL_TELEGRAM->value);
    }

    /** @test */
    public function options_returns_correct_array(): void
    {
        $options = TelegramDriverEnum::options();

        $this->assertIsArray($options);
        $this->assertCount(3, $options);
        $this->assertEquals('Telegram', $options['telegram']);
        $this->assertEquals('Bot API', $options['botapi']);
        $this->assertEquals('Laravel Telegram', $options['laravel-telegram']);
    }

    /** @test */
    public function labels_returns_localized_array(): void
    {
        $labels = TelegramDriverEnum::labels();

        $this->assertIsArray($labels);
        $this->assertCount(3, $labels);
        $this->assertArrayHasKey('telegram', $labels);
        $this->assertArrayHasKey('botapi', $labels);
        $this->assertArrayHasKey('laravel-telegram', $labels);
    }

    /** @test */
    public function is_supported_returns_true_for_valid_drivers(): void
    {
        $this->assertTrue(TelegramDriverEnum::isSupported('telegram'));
        $this->assertTrue(TelegramDriverEnum::isSupported('botapi'));
        $this->assertTrue(TelegramDriverEnum::isSupported('laravel-telegram'));
    }

    /** @test */
    public function is_supported_returns_false_for_invalid_drivers(): void
    {
        $this->assertFalse(TelegramDriverEnum::isSupported('invalid'));
        $this->assertFalse(TelegramDriverEnum::isSupported(''));
        $this->assertFalse(TelegramDriverEnum::isSupported('TELEGRAM'));
        $this->assertFalse(TelegramDriverEnum::isSupported('Telegram'));
    }

    /** @test */
    public function get_default_returns_default_driver(): void
    {
        $default = TelegramDriverEnum::getDefault();

        $this->assertInstanceOf(TelegramDriverEnum::class, $default);
        $this->assertContains($default, TelegramDriverEnum::cases());
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, TelegramDriverEnum::cases());
        $uniqueValues = array_unique($values);

        $this->assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = TelegramDriverEnum::cases();

        $this->assertIsArray($cases);
        $this->assertCount(3, $cases);

        foreach ($cases as $case) {
            $this->assertInstanceOf(TelegramDriverEnum::class, $case);
        }
    }

    /** @test */
    public function all_cases_have_required_methods(): void
    {
        foreach (TelegramDriverEnum::cases() as $case) {
            $this->assertIsString($case->value);
        }
    }
}
>>>>>>> 929ed821d (.)
