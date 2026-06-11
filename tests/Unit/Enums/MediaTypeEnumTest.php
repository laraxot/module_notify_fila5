<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use PHPUnit\Framework\Assert;
use Modules\Notify\Enums\MediaTypeEnum;
use PHPUnit\Framework\TestCase;

class MediaTypeEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        Assert::assertCount(4, MediaTypeEnum::cases());

        Assert::assertEquals('image', MediaTypeEnum::IMAGE->value);
        Assert::assertEquals('video', MediaTypeEnum::VIDEO->value);
        Assert::assertEquals('document', MediaTypeEnum::DOCUMENT->value);
        Assert::assertEquals('audio', MediaTypeEnum::AUDIO->value);
    }

    /** @test */
    public function options_returns_correct_array(): void
    {
        $options = MediaTypeEnum::options();
        Assert::assertCount(4, $options);
        Assert::assertEquals('Image', $options['image']);
        Assert::assertEquals('Video', $options['video']);
        Assert::assertEquals('Document', $options['document']);
        Assert::assertEquals('Audio', $options['audio']);
    }

    /** @test */
    public function labels_returns_localized_array(): void
    {
        $labels = MediaTypeEnum::labels();
        Assert::assertCount(4, $labels);
        Assert::assertArrayHasKey('image', $labels);
        Assert::assertArrayHasKey('video', $labels);
        Assert::assertArrayHasKey('document', $labels);
        Assert::assertArrayHasKey('audio', $labels);
    }

    /** @test */
    public function is_supported_returns_true_for_valid_types(): void
    {
        Assert::assertTrue(MediaTypeEnum::isSupported('image'));
        Assert::assertTrue(MediaTypeEnum::isSupported('video'));
        Assert::assertTrue(MediaTypeEnum::isSupported('document'));
        Assert::assertTrue(MediaTypeEnum::isSupported('audio'));
    }

    /** @test */
    public function is_supported_returns_false_for_invalid_types(): void
    {
        Assert::assertFalse(MediaTypeEnum::isSupported('invalid'));
        Assert::assertFalse(MediaTypeEnum::isSupported(''));
        Assert::assertFalse(MediaTypeEnum::isSupported('IMAGE'));
        Assert::assertFalse(MediaTypeEnum::isSupported('Image'));
    }

    /** @test */
    public function get_default_returns_image(): void
    {
        $default = MediaTypeEnum::getDefault();

        Assert::assertInstanceOf(MediaTypeEnum::class, $default);
        Assert::assertEquals(MediaTypeEnum::IMAGE, $default);
        Assert::assertEquals('image', $default->value);
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, MediaTypeEnum::cases());
        $uniqueValues = array_unique($values);

        Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = MediaTypeEnum::cases();
        Assert::assertCount(4, $cases);

        foreach ($cases as $case) {
            Assert::assertInstanceOf(MediaTypeEnum::class, $case);
        }
    }
}
