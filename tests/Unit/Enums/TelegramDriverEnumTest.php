<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use PHPUnit\Framework\Assert;
use Modules\Notify\Enums\TelegramDriverEnum;
use PHPUnit\Framework\TestCase;

class TelegramDriverEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        Assert::assertCount(3, TelegramDriverEnum::cases());

        Assert::assertEquals('telegram', TelegramDriverEnum::TELEGRAM->value);
        Assert::assertEquals('botapi', TelegramDriverEnum::BOTAPI->value);
        Assert::assertEquals('laravel-telegram', TelegramDriverEnum::LARAVEL_TELEGRAM->value);
    }

    /** @test */
    public function options_returns_correct_array(): void
    {
        $options = TelegramDriverEnum::options();
        Assert::assertCount(3, $options);
        Assert::assertEquals('Telegram', $options['telegram']);
        Assert::assertEquals('Bot API', $options['botapi']);
        Assert::assertEquals('Laravel Telegram', $options['laravel-telegram']);
    }

    /** @test */
    public function labels_returns_localized_array(): void
    {
        $labels = TelegramDriverEnum::labels();
        Assert::assertCount(3, $labels);
        Assert::assertArrayHasKey('telegram', $labels);
        Assert::assertArrayHasKey('botapi', $labels);
        Assert::assertArrayHasKey('laravel-telegram', $labels);
    }

    /** @test */
    public function is_supported_returns_true_for_valid_drivers(): void
    {
        Assert::assertTrue(TelegramDriverEnum::isSupported('telegram'));
        Assert::assertTrue(TelegramDriverEnum::isSupported('botapi'));
        Assert::assertTrue(TelegramDriverEnum::isSupported('laravel-telegram'));
    }

    /** @test */
    public function is_supported_returns_false_for_invalid_drivers(): void
    {
        Assert::assertFalse(TelegramDriverEnum::isSupported('invalid'));
        Assert::assertFalse(TelegramDriverEnum::isSupported(''));
        Assert::assertFalse(TelegramDriverEnum::isSupported('TELEGRAM'));
        Assert::assertFalse(TelegramDriverEnum::isSupported('Telegram'));
    }

    /** @test */
    public function get_default_returns_default_driver(): void
    {
        $default = TelegramDriverEnum::getDefault();

        Assert::assertInstanceOf(TelegramDriverEnum::class, $default);
        Assert::assertContains($default, TelegramDriverEnum::cases());
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, TelegramDriverEnum::cases());
        $uniqueValues = array_unique($values);

        Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = TelegramDriverEnum::cases();
        Assert::assertCount(3, $cases);

        foreach ($cases as $case) {
            Assert::assertInstanceOf(TelegramDriverEnum::class, $case);
        }
    }

    /** @test */
    public function all_cases_have_required_methods(): void
    {
        foreach (TelegramDriverEnum::cases() as $case) {
        }
    }
}
