<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Notify\Models\BaseModel;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotificationTemplateVersion;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Tests\XotBasePest;
use Modules\Xot\Traits\Updater;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_5vVzcS

it('extends base model', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertInstanceOf(BaseModel::class, $version);
});

it('uses updater trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Modules\\Xot\\Traits\\Updater', $traits);
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
        'change_notes'];

    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $fillableProperty = $reflection->getProperty('fillable');
    $fillableProperty->setAccessible(true);
    $fillable = $fillableProperty->getValue($instance);

    Assert::assertSame($expectedFillable, $fillable);
});

it('has correct casts', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $castsMethod = $reflection->getMethod('casts');
    $castsMethod->setAccessible(true);
    $casts = XotBasePest::assertArray($castsMethod->invoke($instance));
    Assert::assertSame('array', $casts['channels'] ?? null);
    Assert::assertSame('array', $casts['variables'] ?? null);
    Assert::assertSame('array', $casts['conditions'] ?? null);
});

it('has template relationship method', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    Assert::assertTrue($reflection->hasMethod('template'));
});

it('has restore method', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    Assert::assertTrue($reflection->hasMethod('restoreTemplate'));
});

it('restore method returns NotificationTemplate', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    $method = new \ReflectionMethod($version, 'restoreTemplate');
    $returnType = $method->getReturnType();

    Assert::assertNotNull($returnType);
    XotBasePest::assertReflectionTypeName($returnType, NotificationTemplate::class);
});

it('has expected table name', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertSame('notification_template_versions', $version->getTable());
});

it('has expected primary key', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertSame('id', $version->getKeyName());
});

it('uses timestamps', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertTrue($version->usesTimestamps());
});

it('has uuids trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Illuminate\\Database\\Eloquent\\Concerns\\HasUuids', $traits);
});

it('has factory trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Modules\\Xot\\Traits\\HasFactory', $traits);
});

it('has media trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Spatie\\MediaLibrary\\HasMedia', $traits);
});

it('has creator and updater relationships', function (): void {
    Assert::assertInstanceOf(NotificationTemplateVersion::class, new NotificationTemplateVersion);
});

it('has media relationship', function (): void {
    Assert::assertInstanceOf(NotificationTemplateVersion::class, new NotificationTemplateVersion);
=======
use ReflectionClass;
use ReflectionMethod;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use function Safe\class_implements;

/*
 * Scopo: ogni versione salvata di un NotificationTemplate e' un modello Notify con tracking
 * creator/updater e media, che sa ripristinare il template d'origine con restoreTemplate().
 * Allineato al model reale: il ripristino e' restoreTemplate() (non restore()), la factory e'
 * HasXotFactory (non Modules\Xot\Traits\HasFactory), HasMedia e' un'interfaccia, nessun HasUuids.
 */
describe('Notification Template Version', function (): void {
    test('extends base model', function (): void {
        $parent = (new ReflectionClass(NotificationTemplateVersion::class))->getParentClass();

        Assert::assertNotFalse($parent);
        Assert::assertSame(BaseModel::class, $parent->getName());
    });

    test('uses updater, xot factory and media traits', function (): void {
        $traits = class_uses_recursive(NotificationTemplateVersion::class);

        Assert::assertContains(Updater::class, $traits);
        Assert::assertContains(HasXotFactory::class, $traits);
        Assert::assertContains(InteractsWithMedia::class, $traits);
        Assert::assertContains(HasMedia::class, class_implements(NotificationTemplateVersion::class));
    });

    test('has correct fillable attributes', function (): void {
        Assert::assertSame([
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
        ], (new NotificationTemplateVersion)->getFillable());
    });

    test('casts channels, variables and conditions to array', function (): void {
        $casts = (new NotificationTemplateVersion)->getCasts();

        Assert::assertSame('array', $casts['channels']);
        Assert::assertSame('array', $casts['variables']);
        Assert::assertSame('array', $casts['conditions']);
    });

    test('belongs to a notification template through template_id', function (): void {
        $relation = (new NotificationTemplateVersion)->template();

        Assert::assertSame(NotificationTemplate::class, $relation->getRelated()::class);
        Assert::assertSame('template_id', $relation->getForeignKeyName());
    });

    test('restoreTemplate returns the notification template', function (): void {
        $method = new ReflectionMethod(NotificationTemplateVersion::class, 'restoreTemplate');

        XotBasePest::assertReflectionTypeName($method->getReturnType(), NotificationTemplate::class);
    });

    test('exposes creator, updater and media relationships', function (): void {
        $reflection = new ReflectionClass(NotificationTemplateVersion::class);

        foreach (['creator', 'updater', 'media'] as $relation) {
            Assert::assertTrue($reflection->hasMethod($relation), $relation);
        }
    });

    test('has expected table name, primary key and timestamps', function (): void {
        $version = new NotificationTemplateVersion;

        Assert::assertSame('notification_template_versions', $version->getTable());
        Assert::assertSame('id', $version->getKeyName());
        Assert::assertTrue($version->usesTimestamps());
    });
>>>>>>> .merge_file_ePVAUl
});
