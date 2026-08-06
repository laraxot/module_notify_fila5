<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Notify\Database\Factories\MailTemplateFactory;
use Modules\Notify\Database\Factories\NotificationFactory;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Models\NotifyThemeable;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

/*
 * Bootstrap Pest — modulo Notify.
 * Ogni file test dichiara uses(\Modules\Notify\Tests\TestCase::class).
 * Vietato pest()->extend() e expect()->extend() qui (PHPStan method.internalClass).
 *
 * Gli helper generici (tabelle, reflection, throws, narrowing) vivono in
 * XotBasePest e qui restano solo delegazioni con il nome storico, per non
 * toccare le centinaia di call site esistenti. Sotto, solo ciò che è davvero
 * specifico di Notify: factory e helper di dominio.
 */

require_once __DIR__.'/../../Xot/tests/XotBasePest.php';

require_once __DIR__.'/../../Xot/tests/XotBasePest.php';

/**
 * @param  array<string, mixed>  $where
 */
function assertNotifyTableHas(string $table, array $where): void
{
    xotAssertTableHas('notify', $table, $where);
}

/**
 * @param  array<string, mixed>  $where
 */
function assertNotifyTableMissing(string $table, array $where): void
{
    xotAssertTableMissing('notify', $table, $where);
}

/**
 * @template T of Model
 *
 * @param  T  $model
 * @param  class-string<T>  $class
 * @return T
 */
function assertFreshModel(Model $model, string $class)
{
    return xotAssertFreshModel($model, $class);
}

/**
 * @template T of Model
 *
 * @param  EloquentCollection<int, T>|Collection<int, T>  $collection
 * @param  class-string<T>  $class
 * @return T
 */
function assertFirstModel(EloquentCollection|Collection $collection, string $class)
{
    return xotAssertFirstModel($collection, $class);
}

/**
 * @return array<string, mixed>
 */
function assertNotifyArray(mixed $value): array
{
    return xotAssertArray($value);
}

function assertReflectionNamedType(?\ReflectionType $type): \ReflectionNamedType
{
    return xotAssertReflectionNamedType($type);
}

function assertReflectionTypeName(?\ReflectionType $type, string $expected): void
{
    xotAssertReflectionTypeName($type, $expected);
}

/**
 * @param  list<string>|array<int, string>  $haystack
 */
function assertListContains(string $needle, array $haystack): void
{
    xotAssertListContains($needle, $haystack);
}

/**
 * @param  class-string<\Throwable>  $exceptionClass
 */
function assertNotifyThrows(callable $callback, string $exceptionClass): void
{
    xotAssertThrows($callback, $exceptionClass);
}

/**
 * @template T of object
 *
 * @param  ReflectionClass<T>  $reflection
 *
 * @return list<string>
 */
function notifyReflectionPropertyNames(\ReflectionClass $reflection): array
{
    return array_map(
        static fn (\ReflectionProperty $property): string => $property->getName(),
        $reflection->getProperties(),
    );
}

/**
 * @template T of object
 *
 * @param  ReflectionClass<T>  $reflection
 */
function assertReflectionFilename(\ReflectionClass $reflection): string
{
    $filename = $reflection->getFileName();
    Assert::assertNotFalse($filename);

    return $filename;
}

/**
 * @template T of object
 *
 * @param  ReflectionClass<T>  $reflection
 */
function notifyReflectionSource(\ReflectionClass $reflection): string
{
    return file_get_contents(assertReflectionFilename($reflection));
}

/**
 * @param  array<mixed, mixed>|null  $array
 */
function notifyArrayGet(?array $array, int|string ...$keys): mixed
{
    Assert::assertIsArray($array);

    /** @var array<mixed, mixed> $current */
    $current = $array;

    if ($keys === []) {
        return $current;
    }

    $lastKey = array_pop($keys);

    foreach ($keys as $key) {
        Assert::assertArrayHasKey($key, $current);
        $nested = $current[$key];
        Assert::assertIsArray($nested);
        /** @var array<mixed, mixed> $nested */
        $current = $nested;
    }

    Assert::assertArrayHasKey($lastKey, $current);

    return $current[$lastKey];
}

/**
 * @return array<string, array<string, mixed>>
 */
function notifyFreshTypeChannels(\Modules\Notify\Models\NotificationType $type): array
{
    $channels = assertFreshModel($type, \Modules\Notify\Models\NotificationType::class)->channels;
    /** @var array<string, array<string, mixed>> $channels */
    return $channels;
}

/**
 * @return array<string, mixed>
 */
function notifyFreshTypeSettings(\Modules\Notify\Models\NotificationType $type): array
{
    $settings = assertFreshModel($type, \Modules\Notify\Models\NotificationType::class)->settings;
    /** @var array<string, mixed> $settings */
    return $settings;
}

/**
 * @param  array<string, mixed>  $attributes
 */
function createNotification(array $attributes = []): Notification
{
    return NotificationFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function makeNotification(array $attributes = []): Notification
{
    return NotificationFactory::new()->makeOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function createMailTemplate(array $attributes = []): MailTemplate
{
    return MailTemplateFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function makeMailTemplate(array $attributes = []): MailTemplate
{
    return MailTemplateFactory::new()->makeOne($attributes);
}

function notifyThemeForThemeable(NotifyThemeable $themeable): NotifyTheme
{
    $themeId = $themeable->notify_theme_id;
    Assert::assertNotNull($themeId);
    $theme = NotifyTheme::query()->find($themeId);
    Assert::assertInstanceOf(NotifyTheme::class, $theme);

    return $theme;
}
