<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use Modules\Notify\Enums\MediaTypeEnum;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

it('has correct cases', function (): void {
    Assert::assertCount(4, MediaTypeEnum::cases());

    Assert::assertSame('image', MediaTypeEnum::IMAGE->value);
    Assert::assertSame('video', MediaTypeEnum::VIDEO->value);
    Assert::assertSame('document', MediaTypeEnum::DOCUMENT->value);
    Assert::assertSame('audio', MediaTypeEnum::AUDIO->value);
});

it('options returns correct array', function (): void {
    $options = MediaTypeEnum::options();
    Assert::assertCount(4, $options);
    Assert::assertSame('Image', $options['image']);
    Assert::assertSame('Video', $options['video']);
    Assert::assertSame('Document', $options['document']);
    Assert::assertSame('Audio', $options['audio']);
});

it('labels returns localized array', function (): void {
    $labels = MediaTypeEnum::labels();
    Assert::assertCount(4, $labels);
    Assert::assertArrayHasKey('image', $labels);
    Assert::assertArrayHasKey('video', $labels);
    Assert::assertArrayHasKey('document', $labels);
    Assert::assertArrayHasKey('audio', $labels);
});

it('is supported returns true for valid types', function (): void {
    Assert::assertTrue(MediaTypeEnum::isSupported('image'));
    Assert::assertTrue(MediaTypeEnum::isSupported('video'));
    Assert::assertTrue(MediaTypeEnum::isSupported('document'));
    Assert::assertTrue(MediaTypeEnum::isSupported('audio'));
});

it('is supported returns false for invalid types', function (): void {
    Assert::assertFalse(MediaTypeEnum::isSupported('invalid'));
    Assert::assertFalse(MediaTypeEnum::isSupported(''));
    Assert::assertFalse(MediaTypeEnum::isSupported('IMAGE'));
    Assert::assertFalse(MediaTypeEnum::isSupported('Image'));
});

it('get default returns image', function (): void {
    $default = MediaTypeEnum::getDefault();

    Assert::assertInstanceOf(MediaTypeEnum::class, $default);
    Assert::assertSame(MediaTypeEnum::IMAGE, $default);
    Assert::assertSame('image', $default->value);
});

it('each case has unique value', function (): void {
    $values = array_map(static fn ($case) => $case->value, MediaTypeEnum::cases());
    $uniqueValues = array_unique($values);

    Assert::assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
});

it('cases returns all enum instances', function (): void {
    $cases = MediaTypeEnum::cases();
    Assert::assertCount(4, $cases);

    foreach ($cases as $case) {
        Assert::assertInstanceOf(MediaTypeEnum::class, $case);
    }
});
=======
use PHPUnit\Framework\TestCase;

class MediaTypeEnumTest extends TestCase
{
    /** @test */
    public function it_has_correct_cases(): void
    {
        $this->assertCount(4, MediaTypeEnum::cases());

        $this->assertEquals('image', MediaTypeEnum::IMAGE->value);
        $this->assertEquals('video', MediaTypeEnum::VIDEO->value);
        $this->assertEquals('document', MediaTypeEnum::DOCUMENT->value);
        $this->assertEquals('audio', MediaTypeEnum::AUDIO->value);
    }

    /** @test */
    public function options_returns_correct_array(): void
    {
        $options = MediaTypeEnum::options();

        $this->assertIsArray($options);
        $this->assertCount(4, $options);
        $this->assertEquals('Image', $options['image']);
        $this->assertEquals('Video', $options['video']);
        $this->assertEquals('Document', $options['document']);
        $this->assertEquals('Audio', $options['audio']);
    }

    /** @test */
    public function labels_returns_localized_array(): void
    {
        $labels = MediaTypeEnum::labels();

        $this->assertIsArray($labels);
        $this->assertCount(4, $labels);
        $this->assertArrayHasKey('image', $labels);
        $this->assertArrayHasKey('video', $labels);
        $this->assertArrayHasKey('document', $labels);
        $this->assertArrayHasKey('audio', $labels);
    }

    /** @test */
    public function is_supported_returns_true_for_valid_types(): void
    {
        $this->assertTrue(MediaTypeEnum::isSupported('image'));
        $this->assertTrue(MediaTypeEnum::isSupported('video'));
        $this->assertTrue(MediaTypeEnum::isSupported('document'));
        $this->assertTrue(MediaTypeEnum::isSupported('audio'));
    }

    /** @test */
    public function is_supported_returns_false_for_invalid_types(): void
    {
        $this->assertFalse(MediaTypeEnum::isSupported('invalid'));
        $this->assertFalse(MediaTypeEnum::isSupported(''));
        $this->assertFalse(MediaTypeEnum::isSupported('IMAGE'));
        $this->assertFalse(MediaTypeEnum::isSupported('Image'));
    }

    /** @test */
    public function get_default_returns_image(): void
    {
        $default = MediaTypeEnum::getDefault();

        $this->assertInstanceOf(MediaTypeEnum::class, $default);
        $this->assertEquals(MediaTypeEnum::IMAGE, $default);
        $this->assertEquals('image', $default->value);
    }

    /** @test */
    public function each_case_has_unique_value(): void
    {
        $values = array_map(fn ($case) => $case->value, MediaTypeEnum::cases());
        $uniqueValues = array_unique($values);

        $this->assertCount(count($values), $uniqueValues, 'All enum cases should have unique values');
    }

    /** @test */
    public function cases_returns_all_enum_instances(): void
    {
        $cases = MediaTypeEnum::cases();

        $this->assertIsArray($cases);
        $this->assertCount(4, $cases);

        foreach ($cases as $case) {
            $this->assertInstanceOf(MediaTypeEnum::class, $case);
        }
    }
}
>>>>>>> 929ed821d (.)
