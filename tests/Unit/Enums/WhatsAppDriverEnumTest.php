<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use PHPUnit\Framework\Assert;
use Modules\Notify\Enums\WhatsAppDriverEnum;
use PHPUnit\Framework\TestCase;

class WhatsAppDriverEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        Assert::assertCount(4, WhatsAppDriverEnum::cases());

        Assert::assertEquals('twilio', WhatsAppDriverEnum::TWILIO->value);
        Assert::assertEquals('messagebird', WhatsAppDriverEnum::MESSAGEBIRD->value);
        Assert::assertEquals('vonage', WhatsAppDriverEnum::VONAGE->value);
        Assert::assertEquals('infobip', WhatsAppDriverEnum::INFOBIP->value);
    }

    /** @test */
    public function options_returns_correct_array(): void
    {
        $options = WhatsAppDriverEnum::options();
        Assert::assertCount(4, $options);
        Assert::assertEquals('Twilio', $options['twilio']);
        Assert::assertEquals('MessageBird', $options['messagebird']);
        Assert::assertEquals('Vonage', $options['vonage']);
        Assert::assertEquals('Infobip', $options['infobip']);
    }

    /** @test */
    public function labels_returns_localized_array(): void
    {
        $labels = WhatsAppDriverEnum::labels();
        Assert::assertCount(4, $labels);
        Assert::assertArrayHasKey('twilio', $labels);
        Assert::assertArrayHasKey('messagebird', $labels);
        Assert::assertArrayHasKey('vonage', $labels);
        Assert::assertArrayHasKey('infobip', $labels);
    }

    /** @test */
    public function is_supported_returns_true_for_valid_drivers(): void
    {
        Assert::assertTrue(WhatsAppDriverEnum::isSupported('twilio'));
        Assert::assertTrue(WhatsAppDriverEnum::isSupported('messagebird'));
        Assert::assertTrue(WhatsAppDriverEnum::isSupported('vonage'));
        Assert::assertTrue(WhatsAppDriverEnum::isSupported('infobip'));
    }

    /** @test */
    public function is_supported_returns_false_for_invalid_drivers(): void
    {
        Assert::assertFalse(WhatsAppDriverEnum::isSupported('invalid'));
        Assert::assertFalse(WhatsAppDriverEnum::isSupported(''));
        Assert::assertFalse(WhatsAppDriverEnum::isSupported('TWILIO'));
        Assert::assertFalse(WhatsAppDriverEnum::isSupported('Twilio'));
    }

    /** @test */
    public function get_default_returns_default_driver(): void
    {
        $default = WhatsAppDriverEnum::getDefault();

        Assert::assertInstanceOf(WhatsAppDriverEnum::class, $default);
        Assert::assertContains($default, WhatsAppDriverEnum::cases());
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, WhatsAppDriverEnum::cases());
        $uniqueValues = array_unique($values);

        Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = WhatsAppDriverEnum::cases();
        Assert::assertCount(4, $cases);

        foreach ($cases as $case) {
            Assert::assertInstanceOf(WhatsAppDriverEnum::class, $case);
        }
    }

    /** @test */
    public function all_cases_have_required_methods(): void
    {
        foreach (WhatsAppDriverEnum::cases() as $case) {
        }
    }
}
