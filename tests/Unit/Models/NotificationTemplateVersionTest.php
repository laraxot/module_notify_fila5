<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;
<<<<<<< HEAD
=======

uses(TestCase::class);

>>>>>>> 929ed821d (.)
use Modules\Notify\Models\BaseModel;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotificationTemplateVersion;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======
>>>>>>> 929ed821d (.)

it('extends base model', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
    Assert::assertInstanceOf(BaseModel::class, $version);
=======
    expect($version)->toBeInstanceOf(BaseModel::class);
>>>>>>> 929ed821d (.)
});

it('uses updater trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

<<<<<<< HEAD
    Assert::assertContains('Modules\\Xot\\Traits\\Updater', $traits);
=======
    expect($traits)->toContain('Modules\\Xot\\Traits\\Updater');
>>>>>>> 929ed821d (.)
});

it('has correct fillable attributes', function (): void {
    $expectedFillable = [
        'template_id',
        'subject',
        'body_html',
        'body_text',
        'channels',
        'variables',
        'conditions',
        'version',
        'created_by',
        'change_notes',
    ];

    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $fillableProperty = $reflection->getProperty('fillable');
    $fillableProperty->setAccessible(true);
    $fillable = $fillableProperty->getValue($instance);

<<<<<<< HEAD
    Assert::assertSame($expectedFillable, $fillable);
=======
    expect($fillable)->toBe($expectedFillable);
>>>>>>> 929ed821d (.)
});

it('has correct casts', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $castsMethod = $reflection->getMethod('casts');
    $castsMethod->setAccessible(true);
<<<<<<< HEAD
    $casts = \assertNotifyArray($castsMethod->invoke($instance));
    Assert::assertSame('array', $casts['channels'] ?? null);
    Assert::assertSame('array', $casts['variables'] ?? null);
    Assert::assertSame('array', $casts['conditions'] ?? null);
=======
    $casts = $castsMethod->invoke($instance);

    expect($casts)->toBeArray();
    expect($casts['channels'] ?? null)->toBe('array');
    expect($casts['variables'] ?? null)->toBe('array');
    expect($casts['conditions'] ?? null)->toBe('array');
>>>>>>> 929ed821d (.)
});

it('has template relationship method', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
    });
=======
    expect(method_exists($version, 'template'))->toBeTrue();
});
>>>>>>> 929ed821d (.)

it('has restore method', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
    });
=======
    expect(method_exists($version, 'restore'))->toBeTrue();
});
>>>>>>> 929ed821d (.)

it('restore method returns NotificationTemplate', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
        $method = new \ReflectionMethod($version, 'restore');
    $returnType = $method->getReturnType();

    Assert::assertNotNull($returnType);
    \assertReflectionTypeName($returnType, NotificationTemplate::class);
=======
    expect(method_exists($version, 'restore'))->toBeTrue();

    $method = new \ReflectionMethod($version, 'restore');
    $returnType = $method->getReturnType();

    expect($returnType)->not->toBeNull();
    expect($returnType?->getName())->toBe(NotificationTemplate::class);
>>>>>>> 929ed821d (.)
});

it('has expected table name', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
    Assert::assertSame('notification_template_versions', $version->getTable());
=======
    expect($version->getTable())->toBe('notification_template_versions');
>>>>>>> 929ed821d (.)
});

it('has expected primary key', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
    Assert::assertSame('id', $version->getKeyName());
=======
    expect($version->getKeyName())->toBe('id');
>>>>>>> 929ed821d (.)
});

it('uses timestamps', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< HEAD
    Assert::assertTrue($version->usesTimestamps());
=======
    expect($version->usesTimestamps())->toBeTrue();
>>>>>>> 929ed821d (.)
});

it('has uuids trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

<<<<<<< HEAD
    Assert::assertContains('Illuminate\\Database\\Eloquent\\Concerns\\HasUuids', $traits);
=======
    expect($traits)->toContain('Illuminate\\Database\\Eloquent\\Concerns\\HasUuids');
>>>>>>> 929ed821d (.)
});

it('has factory trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

<<<<<<< HEAD
    Assert::assertContains('Modules\\Xot\\Traits\\HasFactory', $traits);
=======
    expect($traits)->toContain('Modules\\Xot\\Traits\\HasFactory');
>>>>>>> 929ed821d (.)
});

it('has media trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

<<<<<<< HEAD
    Assert::assertContains('Spatie\\MediaLibrary\\HasMedia', $traits);
=======
    expect($traits)->toContain('Spatie\\MediaLibrary\\HasMedia');
>>>>>>> 929ed821d (.)
});

it('has creator and updater relationships', function (): void {
    $version = new NotificationTemplateVersion;

<<<<<<< HEAD
        });
=======
    expect(method_exists($version, 'creator'))->toBeTrue();
    expect(method_exists($version, 'updater'))->toBeTrue();
});
>>>>>>> 929ed821d (.)

it('has media relationship', function (): void {
    $version = new NotificationTemplateVersion;

<<<<<<< HEAD
    });
=======
    expect(method_exists($version, 'media'))->toBeTrue();
});
>>>>>>> 929ed821d (.)
