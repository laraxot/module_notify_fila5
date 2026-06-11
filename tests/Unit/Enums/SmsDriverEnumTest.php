<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use PHPUnit\Framework\Assert;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Notify\Enums\SmsDriverEnum;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class SmsDriverEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        Assert::assertCount(7, SmsDriverEnum::cases());

        Assert::assertEquals('smsfactor', SmsDriverEnum::SMSFACTOR->value);
        Assert::assertEquals('twilio', SmsDriverEnum::TWILIO->value);
        Assert::assertEquals('nexmo', SmsDriverEnum::NEXMO->value);
        Assert::assertEquals('plivo', SmsDriverEnum::PLIVO->value);
        Assert::assertEquals('gammu', SmsDriverEnum::GAMMU->value);
        Assert::assertEquals('netfun', SmsDriverEnum::NETFUN->value);
        Assert::assertEquals('agiletelecom', SmsDriverEnum::AGILETELECOM->value);
    }

    /** @test */
    public function it_implements_filament_contracts(): void
    {
        Assert::assertInstanceOf(HasLabel::class, SmsDriverEnum::SMSFACTOR);
        Assert::assertInstanceOf(HasIcon::class, SmsDriverEnum::SMSFACTOR);
        Assert::assertInstanceOf(HasColor::class, SmsDriverEnum::SMSFACTOR);
    }

    /** @test */
    public function it_has_trans_trait(): void
    {
        $reflection = new ReflectionClass(SmsDriverEnum::class);
        $traits = $reflection->getTraitNames();

        Assert::assertContains('Modules\Xot\Filament\Traits\TransTrait', $traits);
    }

    /** @test */
    public function it_has_required_methods(): void
    {
                                            }

    /** @test */
    public function get_default_returns_default_driver(): void
    {
        $default = SmsDriverEnum::getDefault();

        Assert::assertInstanceOf(SmsDriverEnum::class, $default);
        Assert::assertContains($default, SmsDriverEnum::cases());
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, SmsDriverEnum::cases());
        $uniqueValues = array_unique($values);

        Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = SmsDriverEnum::cases();
        Assert::assertCount(7, $cases);

        foreach ($cases as $case) {
            Assert::assertInstanceOf(SmsDriverEnum::class, $case);
        }
    }

    /** @test */
    public function all_cases_have_required_methods(): void
    {
        foreach (SmsDriverEnum::cases() as $case) {
            Assert::assertNotEmpty($case->getDescription());
        }
    }
}
