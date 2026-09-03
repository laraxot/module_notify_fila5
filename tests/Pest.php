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
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

/*
 * Bootstrap Pest — modulo Notify.
 * Ogni file test dichiara uses(\Modules\Notify\Tests\TestCase::class).
 * Per estendere si usa l'API idiomatica di Pest — `pest()->extend(...)`, in fondo
 * a questo file — senza nessuna annotazione di soppressione: con
 * `pestphp/pest-plugin-phpstan 5.2.0` installato, `method.internalClass` non
 * viene piu' segnalato. Misurato il 2026-08-25 su tutti i bootstrap dei moduli:
 * `phpstan analyse Modules/<Modulo>/tests/Pest.php` = 0 errori.
 * Se ricomparisse, verificare che il plugin sia ancora caricato da
 * `phpstan/extension-installer`, non reintrodurre il divieto.
 * Vedi story XOT-5.41 e ROOT-17.6.
 *
 * Gli helper generici (tabelle, reflection, throws, narrowing) vivono nella
 * classe Modules\Xot\Tests\XotBasePest, risolta dall'autoload PSR-4: qui
 * restano solo delegazioni con il nome storico, per non toccare le centinaia
 * di call site esistenti. Sotto, solo ciò che è davvero specifico di Notify:
 * factory e helper di dominio.
 */


/**
 * @param  array<string, mixed>  $where
 */
function assertNotifyTableHas(string $table, array $where): void
{
    XotBasePest::assertTableHas('notify', $table, $where);
}

/**
 * @param  array<string, mixed>  $where
 */
function assertNotifyTableMissing(string $table, array $where): void
{
    XotBasePest::assertTableMissing('notify', $table, $where);
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
    return XotBasePest::assertFreshModel($model, $class);
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
    return XotBasePest::assertFirstModel($collection, $class);
}

/**
 * @return array<string, mixed>
 */
function assertNotifyArray(mixed $value): array
{
    return XotBasePest::assertArray($value);
}

function assertReflectionNamedType(?\ReflectionType $type): \ReflectionNamedType
{
    return XotBasePest::assertReflectionNamedType($type);
}

function assertReflectionTypeName(?\ReflectionType $type, string $expected): void
{
    XotBasePest::assertReflectionTypeName($type, $expected);
}

/**
 * @param  list<string>|array<int, string>  $haystack
 */
function assertListContains(string $needle, array $haystack): void
{
    XotBasePest::assertListContains($needle, $haystack);
}

/**
 * @param  class-string<\Throwable>  $exceptionClass
 */
function assertNotifyThrows(callable $callback, string $exceptionClass): void
{
    XotBasePest::assertThrows($callback, $exceptionClass);
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

pest()->extend(\Modules\Notify\Tests\TestCase::class)->in(__DIR__.'/Unit', __DIR__.'/Feature');
