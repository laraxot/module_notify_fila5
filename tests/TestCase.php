<?php

declare(strict_types=1);

namespace Modules\Notify\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Models\NotifyThemeable;
use Modules\Notify\Providers\NotifyServiceProvider;
use Modules\Xot\Tests\CreatesApplication;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use ReflectionProperty;

use function Safe\file_get_contents;

/**
 * Base test case for Notify module tests.
 *
 * Lo schema (migrate) e i seeder del DB di test si eseguono una volta dall'esterno
 * (`php artisan migrate --env=testing`): `loadLaravelMigrations()` e' di Testbench,
 * non di `Illuminate\Foundation\Testing\TestCase`, e non esiste qui.
 * Mai RefreshDatabase: wipea il MariaDB `*_test` condiviso con Fixcity.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = ['fixcity', 'mariadb', 'user', 'notify'];

    /**
     * Type-guard: accetta un valore arbitrario e asserisce che sia un array.
     *
     * @return array<string, mixed>
     */
    public static function assertNotifyArray(mixed $value): array
    {
        Assert::assertIsArray($value);

        /** @var array<string, mixed> $value */
        return $value;
    }

    /**
     * @template T of object
     *
     * @param  ReflectionClass<T>  $reflection
     * @return list<string>
     */
    public static function notifyReflectionPropertyNames(ReflectionClass $reflection): array
    {
        return array_map(
            static fn (ReflectionProperty $property): string => $property->getName(),
            $reflection->getProperties(),
        );
    }

    /**
     * Sorgente PHP della classe riflessa, per i test che ne ispezionano il codice.
     *
     * @template T of object
     *
     * @param  ReflectionClass<T>  $reflection
     */
    public static function notifyReflectionSource(ReflectionClass $reflection): string
    {
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);

        return file_get_contents($filename);
    }

    /**
     * Legge una catena di chiavi annidate, asserendo a ogni livello che esista.
     *
     * @param  array<mixed, mixed>|null  $array
     * @return mixed Il valore in fondo alla catena di chiavi e' eterogeneo per definizione
     */
    public static function notifyArrayGet(?array $array, int|string ...$keys): mixed
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
     * Impostazioni del tipo di notifica rilette dal DB (non quelle in memoria).
     *
     * @return array<string, mixed>
     */
    public static function notifyFreshTypeSettings(NotificationType $type): array
    {
        $settings = XotBasePest::assertFreshModel($type, NotificationType::class)->settings;
        Assert::assertIsArray($settings);

        return $settings;
    }

    /**
     * Tema collegato al themeable tramite `notify_theme_id`.
     */
    public static function notifyThemeForThemeable(NotifyThemeable $themeable): NotifyTheme
    {
        $themeId = $themeable->notify_theme_id;
        Assert::assertNotNull($themeId);
        $theme = NotifyTheme::query()->find($themeId);
        Assert::assertInstanceOf(NotifyTheme::class, $theme);

        return $theme;
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            NotifyServiceProvider::class,
        ];
    }
}
