<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;
<<<<<<< HEAD
=======

uses(TestCase::class);

>>>>>>> 929ed821d (.)
use Filament\Forms\Components\TextInput;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Notify\Enums\ContactTypeEnum;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

it('has correct cases', function (): void {
    Assert::assertCount(6, ContactTypeEnum::cases());
    Assert::assertSame('phone', ContactTypeEnum::PHONE->value);
    Assert::assertSame('mobile', ContactTypeEnum::MOBILE->value);
    Assert::assertSame('email', ContactTypeEnum::EMAIL->value);
    Assert::assertSame('pec', ContactTypeEnum::PEC->value);
    Assert::assertSame('whatsapp', ContactTypeEnum::WHATSAPP->value);
    Assert::assertSame('fax', ContactTypeEnum::FAX->value);
});

it('implements filament contracts', function (): void {
    Assert::assertInstanceOf(HasLabel::class, ContactTypeEnum::PHONE);
    Assert::assertInstanceOf(HasIcon::class, ContactTypeEnum::PHONE);
    Assert::assertInstanceOf(HasColor::class, ContactTypeEnum::PHONE);
=======

it('has correct cases', function (): void {
    expect(ContactTypeEnum::cases())->toHaveCount(6);

    expect(ContactTypeEnum::PHONE->value)->toBe('phone');
    expect(ContactTypeEnum::MOBILE->value)->toBe('mobile');
    expect(ContactTypeEnum::EMAIL->value)->toBe('email');
    expect(ContactTypeEnum::PEC->value)->toBe('pec');
    expect(ContactTypeEnum::WHATSAPP->value)->toBe('whatsapp');
    expect(ContactTypeEnum::FAX->value)->toBe('fax');
});

it('implements filament contracts', function (): void {
    expect(ContactTypeEnum::PHONE)->toBeInstanceOf(HasLabel::class);
    expect(ContactTypeEnum::PHONE)->toBeInstanceOf(HasIcon::class);
    expect(ContactTypeEnum::PHONE)->toBeInstanceOf(HasColor::class);
>>>>>>> 929ed821d (.)
});

it('has trans trait', function (): void {
    $reflection = new \ReflectionClass(ContactTypeEnum::class);
    $traits = $reflection->getTraitNames();

<<<<<<< HEAD
    Assert::assertContains('Modules\\Xot\\Traits\\EnumTrait', $traits);
});

it('has required methods', function (): void {
    foreach (['getLabel', 'getIcon', 'getColor', 'getSearchable', 'getFormSchema'] as $method) {
        Assert::assertTrue(method_exists(ContactTypeEnum::PHONE, $method));
    }
=======
    expect($traits)->toContain('Modules\\Xot\\Filament\\Traits\\TransTrait');
});

it('has required methods', function (): void {
    expect(method_exists(ContactTypeEnum::class, 'getLabel'))->toBeTrue();
    expect(method_exists(ContactTypeEnum::class, 'getColor'))->toBeTrue();
    expect(method_exists(ContactTypeEnum::class, 'getIcon'))->toBeTrue();
    expect(method_exists(ContactTypeEnum::class, 'getDescription'))->toBeTrue();
    expect(method_exists(ContactTypeEnum::class, 'getSearchable'))->toBeTrue();
    expect(method_exists(ContactTypeEnum::class, 'getFormSchema'))->toBeTrue();
>>>>>>> 929ed821d (.)
});

it('getSearchable returns all values', function (): void {
    $searchable = ContactTypeEnum::getSearchable();
<<<<<<< HEAD
    Assert::assertCount(6, $searchable);

    foreach (['phone', 'mobile', 'email', 'pec', 'whatsapp', 'fax'] as $value) {
        Assert::assertContains($value, $searchable);
    }
=======

    expect($searchable)->toBeArray();
    expect($searchable)->toHaveCount(6);
    expect($searchable)->toContain('phone', 'mobile', 'email', 'pec', 'whatsapp', 'fax');
>>>>>>> 929ed821d (.)
});

it('getFormSchema returns TextInput components', function (): void {
    $schema = ContactTypeEnum::getFormSchema();
<<<<<<< HEAD
    Assert::assertCount(6, $schema);
    foreach ($schema as $component) {
        Assert::assertInstanceOf(TextInput::class, $component);
=======

    expect($schema)->toBeArray();
    expect($schema)->toHaveCount(6);

    foreach ($schema as $component) {
        expect($component)->toBeInstanceOf(TextInput::class);
>>>>>>> 929ed821d (.)
    }
});

it('each case has a unique value', function (): void {
    $values = array_map(static fn (ContactTypeEnum $case): string => $case->value, ContactTypeEnum::cases());
    $uniqueValues = array_unique($values);

<<<<<<< HEAD
    Assert::assertCount(count($values), $uniqueValues);
=======
    expect($uniqueValues)->toHaveCount(count($values));
>>>>>>> 929ed821d (.)
});
