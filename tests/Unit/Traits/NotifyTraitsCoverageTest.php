<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Traits;

<<<<<<< HEAD
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 929ed821d (.)
use Modules\Notify\Tests\TestCase;
use Modules\Notify\Traits\HasNotificationRateLimiting;
use Modules\Notify\Traits\HasNotificationTracking;
use Modules\Notify\Traits\HasTenantNotifications;
<<<<<<< HEAD
use Modules\Tenant\Models\Tenant;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

final class NotifyRateLimitDummy
{
    use HasNotificationRateLimiting;

    public function key(string $type, mixed $identifier): string
    {
        return $this->getNotificationRateLimitKey($type, $identifier);
    }

    public function reset(string $key): void
    {
        $this->resetNotificationRateLimit($key);
    }

    public function shouldSend(string $key): bool
    {
        return $this->shouldSendNotification($key);
    }

    public function remaining(string $key): int
    {
        return $this->getNotificationRateLimitRemainingAttempts($key);
    }

    public function retryAfter(string $key): int
    {
        return $this->getNotificationRateLimitRetryAfter($key);
    }
}

final class NotifyTrackingDummy
{
    use HasNotificationTracking;

    public function addTrackingPublic(string $html, string $trackingId): string
    {
        return $this->addTracking($html, $trackingId);
    }

    public function trackingId(): string
    {
        return $this->generateTrackingId();
    }

    public function trackingEnabled(): bool
    {
        return $this->isTrackingEnabled();
    }
}

final class NotifyTenantDummyModel extends Model
{
    use HasTenantNotifications;

    public ?string $tenant_id = null;

    public function getTable(): string
    {
        return 'notify_tenant_dummy_models';
    }
}

describe('Notify Traits Coverage', function (): void {
    test('_notification_rate_limiting_helpers_work_with_limiter', function (): void {
config()->set('notify.rate_limiting.enabled', true);
        config()->set('notify.rate_limiting.max_attempts', 1);
        config()->set('notify.rate_limiting.decay_minutes', 1);

        $dummy = new NotifyRateLimitDummy();
        $key = $dummy->key('mail', 'id-'.uniqid());
        $dummy->reset($key);

        Assert::assertTrue($dummy->shouldSend($key));
        Assert::assertFalse($dummy->shouldSend($key));
        Assert::assertLessThanOrEqual(0, $dummy->remaining($key));
        Assert::assertGreaterThanOrEqual(0, $dummy->retryAfter($key));

        $dummy->reset($key);
        Assert::assertTrue($dummy->shouldSend($key));
    });

    test('_notification_tracking_returns_original_html_when_tracking_is_disabled', function (): void {
config()->set('notify.tracking.enabled', false);
        config()->set('notify.tracking.pixel.enabled', false);
        config()->set('notify.tracking.links.enabled', false);

        $dummy = new NotifyTrackingDummy();
        $html = '<a href="https://example.com/path">click</a>';

        $tracked = $dummy->addTrackingPublic($html, 'track-1');

        Assert::assertSame($html, $tracked);
        Assert::assertNotSame('', $dummy->trackingId());
        Assert::assertFalse($dummy->trackingEnabled());
    });

    test('_tenant_notification_helpers_check_tenant_ownership', function (): void {
$tenant = new Tenant;
        $tenant->setAttribute('id', 'tenant-42');
        Filament::setTenant($tenant, isQuiet: true);

        $dummy = new NotifyTenantDummyModel();
        $dummy->tenant_id = 'tenant-42';

        Assert::assertTrue($dummy->belongsToTenant('tenant-42'));
        Assert::assertTrue($dummy->belongsToCurrentTenant());
        Assert::assertFalse($dummy->belongsToTenant('other-tenant'));
        Filament::setTenant(null, isQuiet: true);
    });
=======
use Modules\Tenant\Services\TenantManager;

uses(TestCase::class);

function makeNotifyRateLimitDummy(): object
{
    return new class
    {
        use HasNotificationRateLimiting;

        public function shouldSend(string $key): bool
        {
            return $this->shouldSendNotification($key);
        }

        public function retryAfter(string $key): int
        {
            return $this->getNotificationRateLimitRetryAfter($key);
        }

        public function remaining(string $key): int
        {
            return $this->getNotificationRateLimitRemainingAttempts($key);
        }

        public function reset(string $key): void
        {
            $this->resetNotificationRateLimit($key);
        }

        public function key(string $type, mixed $identifier): string
        {
            return $this->getNotificationRateLimitKey($type, $identifier);
        }
    };
}

function makeNotifyTrackingDummy(): object
{
    return new class
    {
        use HasNotificationTracking;

        public function addTrackingPublic(string $html, string $id): string
        {
            return $this->addTracking($html, $id);
        }

        public function trackingId(): string
        {
            return $this->generateTrackingId();
        }

        public function trackingEnabled(): bool
        {
            return $this->isTrackingEnabled();
        }
    };
}

function makeNotifyTenantDummy(): object
{
    return new class
    {
        use HasTenantNotifications;

        public ?string $tenant_id = null;
    };
}

test('notification rate limiting helpers work with limiter', function () {
    config()->set('notify.rate_limiting.enabled', true);
    config()->set('notify.rate_limiting.max_attempts', 1);
    config()->set('notify.rate_limiting.decay_minutes', 1);

    $dummy = makeNotifyRateLimitDummy();
    $key = $dummy->key('mail', 'id-'.uniqid());
    $dummy->reset($key);

    expect($dummy->shouldSend($key))->toBeTrue()
        ->and($dummy->shouldSend($key))->toBeFalse()
        ->and($dummy->remaining($key))->toBeLessThanOrEqual(0)
        ->and($dummy->retryAfter($key))->toBeInt();

    $dummy->reset($key);
    expect($dummy->shouldSend($key))->toBeTrue();
});

test('notification tracking returns original html when tracking is disabled', function () {
    config()->set('notify.tracking.enabled', false);
    config()->set('notify.tracking.pixel.enabled', false);
    config()->set('notify.tracking.links.enabled', false);

    $dummy = makeNotifyTrackingDummy();
    $html = '<a href="https://example.com/path">click</a>';

    $tracked = $dummy->addTrackingPublic($html, 'track-1');

    expect($tracked)->toBe($html)
        ->and($dummy->trackingId())->toBeString()
        ->and($dummy->trackingEnabled())->toBeFalse();
});

test('tenant notification helpers check tenant ownership', function () {
    app()->instance(TenantManager::class, new class
    {
        public function getTenantId(): string
        {
            return 'tenant-42';
        }
    });

    $dummy = makeNotifyTenantDummy();
    $dummy->tenant_id = 'tenant-42';

    expect($dummy->belongsToTenant('tenant-42'))->toBeTrue()
        ->and($dummy->belongsToCurrentTenant())->toBeTrue()
        ->and($dummy->belongsToTenant('other-tenant'))->toBeFalse();
>>>>>>> 929ed821d (.)
});
