<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Http;
use Modules\Notify\Actions\Push\SendPushToTopicAction;
use Modules\Notify\Datas\NotifyConfigData;
use Modules\Notify\Datas\PushNotificationData;
use Modules\Notify\Filament\Pages\SettingPage;
use Modules\Notify\Tests\Support\FakeTenantNotifyConfig;
use Modules\Notify\Tests\Unit\Traits\NotifyRateLimitDummy;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;

/**
 * @return list<string>
 */
function notifyConfigPropertyNames(): array
{
    return array_map(
        static fn (ReflectionProperty $property): string => $property->getName(),
        (new ReflectionClass(NotifyConfigData::class))->getProperties(ReflectionProperty::IS_PUBLIC),
    );
}

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('notify')
        ->and(SettingPage::getConfigDataClass())->toBe(NotifyConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(NotifyConfigData::tenantConfigName())->toBe('notify');
});

test('defaults equal what the readers did before the settings existed', function (): void {
    FakeTenantNotifyConfig::bind([]);

    $data = NotifyConfigData::make();

    expect($data->rate_limiting_enabled)->toBeFalse()
        ->and($data->rate_limiting_max_attempts)->toBe(5)
        ->and($data->rate_limiting_decay_minutes)->toBe(1)
        ->and($data->cleanup_enabled)->toBeFalse()
        ->and($data->cleanup_older_than_days)->toBe(30)
        ->and($data->cleanup_batch_size)->toBe(1000)
        ->and($data->cleanup_keep_failed)->toBeTrue()
        ->and($data->fcm_url)->toBe('https://fcm.googleapis.com/fcm/send');
});

test('a tenant array overrides the defaults', function (): void {
    FakeTenantNotifyConfig::bind([
        'rate_limiting_enabled' => true,
        'rate_limiting_max_attempts' => 2,
        'rate_limiting_decay_minutes' => 10,
        'cleanup_enabled' => true,
        'cleanup_older_than_days' => 90,
        'cleanup_batch_size' => 200,
        'cleanup_keep_failed' => false,
        'fcm_url' => 'https://push.example.test/send',
    ]);

    $data = NotifyConfigData::make();

    expect($data->rate_limiting_enabled)->toBeTrue()
        ->and($data->rate_limiting_max_attempts)->toBe(2)
        ->and($data->rate_limiting_decay_minutes)->toBe(10)
        ->and($data->cleanup_enabled)->toBeTrue()
        ->and($data->cleanup_older_than_days)->toBe(90)
        ->and($data->cleanup_batch_size)->toBe(200)
        ->and($data->cleanup_keep_failed)->toBeFalse()
        ->and($data->fcm_url)->toBe('https://push.example.test/send');
});

test('a missing tenant file gives the defaults', function (): void {
    if (is_file(app(GetTenantFilePathAction::class)->execute('notify.php'))) {
        test()->markTestSkipped('Il tenant corrente ha un file notify.php: i default non sono osservabili.');
    }

    expect(NotifyConfigData::make()->toArray())->toBe(NotifyConfigData::from([])->toArray())
        ->and(NotifyConfigData::make()->cleanup_older_than_days)->toBe(30);
});

test('the secret fcm server key is never a property', function (): void {
    foreach (notifyConfigPropertyNames() as $name) {
        expect($name)->not->toContain('server_key')
            ->and($name)->not->toContain('token')
            ->and($name)->not->toContain('password');
    }
});

test('rate limiting follows the saved tenant setting', function (): void {
    config()->set('cache.default', 'array');
    $dummy = new NotifyRateLimitDummy;
    $key = $dummy->key('mail', 'rl-'.uniqid());

    FakeTenantNotifyConfig::bind([]);
    expect($dummy->shouldSend($key))->toBeTrue()
        ->and($dummy->shouldSend($key))->toBeTrue();

    FakeTenantNotifyConfig::bind(['rate_limiting_enabled' => true, 'rate_limiting_max_attempts' => 2]);
    $dummy->reset($key);
    expect($dummy->shouldSend($key))->toBeTrue()
        ->and($dummy->shouldSend($key))->toBeTrue()
        ->and($dummy->shouldSend($key))->toBeFalse()
        ->and($dummy->remaining($key))->toBe(0);
    $dummy->reset($key);
});

test('the push actions post to the fcm url saved for the tenant', function (): void {
    config(['notify.fcm.server_key' => 'test-key']);
    FakeTenantNotifyConfig::bind(['fcm_url' => 'https://push.example.test/send']);
    Http::fake(['push.example.test/*' => Http::response(['message_id' => 'mid-1'], 200)]);

    $result = (new SendPushToTopicAction)->execute('news', PushNotificationData::from(['title' => 'Ciao', 'body' => 'Test']));

    expect($result)->toHaveKey('fcm');
    Http::assertSent(fn ($request): bool => $request->url() === 'https://push.example.test/send');
});

test('the cleanup command refuses to run until the tenant enables it', function (): void {
    FakeTenantNotifyConfig::bind([]);

    $this->artisan('notify:cleanup-logs')
        ->expectsOutputToContain('disabilitata')
        ->assertExitCode(1);
});

test('the cleanup command takes days and batch from the tenant setting when no option is given', function (): void {
    FakeTenantNotifyConfig::bind(['cleanup_enabled' => true, 'cleanup_older_than_days' => 7]);

    $this->artisan('notify:cleanup-logs')
        ->expectsOutputToContain('più vecchi di 7 giorni')
        ->assertExitCode(0);
});

test('the cleanup command option wins over the tenant setting', function (): void {
    FakeTenantNotifyConfig::bind(['cleanup_enabled' => true, 'cleanup_older_than_days' => 7]);

    $this->artisan('notify:cleanup-logs', ['--days' => 3])
        ->expectsOutputToContain('più vecchi di 3 giorni')
        ->assertExitCode(0);
});

test('setting page form keys equal the public properties of the data', function (): void {
    $schema = (new ReflectionMethod(SettingPage::class, 'getFormSchema'))->invoke(new SettingPage);
    $keys = array_keys(is_array($schema) ? $schema : []);
    $properties = notifyConfigPropertyNames();
    sort($keys);
    sort($properties);

    expect($keys)->not->toBe([])
        ->and($keys)->toBe($properties);
});

test('every setting field has a label in it and en', function (): void {
    foreach (['it', 'en'] as $locale) {
        $lang = require dirname(__DIR__, 3).'/lang/'.$locale.'/setting.php';

        foreach (notifyConfigPropertyNames() as $property) {
            expect(data_get($lang, 'fields.'.$property.'.label', ''))->not->toBe('');
        }
    }
});
