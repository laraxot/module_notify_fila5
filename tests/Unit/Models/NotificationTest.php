<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use function Safe\json_encode;
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\Notification;
use Modules\Notify\Tests\TestCase;
use Modules\Notify\Database\Factories\NotificationFactory;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Notification', function (): void {
    test('_can_create_notification', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$notification = NotificationFactory::new()->createOne([
=======
use Modules\Notify\Models\Notification;
use Modules\Notify\Tests\TestCase;

class NotificationTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_notification(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Test notification message',
            'type' => 'info',
            'tenant_id' => 1,
            'user_id' => 123,
            'subject_type' => 'App\Models\User',
            'subject_id' => 456,
            'channels' => ['mail', 'database'],
            'status' => 'pending',
            'sent_at' => now(),
            'data' => [
                'title' => 'Test Title',
                'body' => 'Test Body',
                'action_url' => 'https://example.com',
                'priority' => 'high',
            ],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notifications', [
=======

        $this->assertDatabaseHas('notifications', [
>>>>>>> 929ed821d (.)
            'id' => $notification->id,
            'message' => 'Test notification message',
            'type' => 'info',
            'tenant_id' => 1,
            'user_id' => 123,
            'subject_type' => 'App\Models\User',
            'subject_id' => 456,
            'status' => 'pending',
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(Notification::class, $notification);
    });

    test('_has_correct_fillable_fields', function (): void {
$notification = new Notification;
=======
        $this->assertInstanceOf(Notification::class, $notification);
    }

    /** @test */
    public function it_has_correct_fillable_fields(): void
    {
        $notification = new Notification;
>>>>>>> 929ed821d (.)

        $expectedFillable = [
            'message',
            'type',
            'read_at',
            'tenant_id',
            'user_id',
            'subject_type',
            'subject_id',
            'channels',
            'status',
            'sent_at',
            'data',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $notification->getFillable());
    });

    test('_has_correct_casts', function (): void {
$notification = new Notification;
=======
        $this->assertEquals($expectedFillable, $notification->getFillable());
    }

    /** @test */
    public function it_has_correct_casts(): void
    {
        $notification = new Notification;
>>>>>>> 929ed821d (.)

        $expectedCasts = [
            'read_at' => 'datetime',
            'sent_at' => 'datetime',
            'data' => 'array',
            'channels' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedCasts, $notification->getCasts());
    });

    test('_can_store_json_data', function (): void {
$data = [
=======
        $this->assertEquals($expectedCasts, $notification->casts());
    }

    /** @test */
    public function it_can_store_json_data(): void
    {
        $data = [
>>>>>>> 929ed821d (.)
            'title' => 'Welcome to our platform',
            'body' => 'Thank you for joining us!',
            'action_url' => 'https://example.com/welcome',
            'priority' => 'high',
            'category' => 'welcome',
            'metadata' => [
                'source' => 'registration',
                'campaign' => 'new_users_2024',
                'tags' => ['welcome', 'onboarding'],
            ],
        ];

<<<<<<< HEAD
        $notification = NotificationFactory::new()->createOne([
=======
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Welcome notification',
            'type' => 'welcome',
            'data' => $data,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notifications', [
            'id' => $notification->id,
            'data' => json_encode($data),
        ]);
        Assert::assertEquals('Welcome to our platform', $notification->data['title']);
        Assert::assertEquals('Thank you for joining us!', $notification->data['body']);
        Assert::assertEquals('high', $notification->data['priority']);
        Assert::assertEquals('registration', \notifyArrayGet($notification->data, 'metadata', 'source'));
        Assert::assertEquals(['welcome', 'onboarding'], \notifyArrayGet($notification->data, 'metadata', 'tags'));
    });

    test('_can_store_channels_array', function (): void {
$channels = ['mail', 'database', 'sms', 'push'];

        $notification = NotificationFactory::new()->createOne([
=======

        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'data' => json_encode($data),
        ]);

        $this->assertIsArray($notification->data);
        $this->assertEquals('Welcome to our platform', $notification->data['title']);
        $this->assertEquals('Thank you for joining us!', $notification->data['body']);
        $this->assertEquals('high', $notification->data['priority']);
        $this->assertEquals('registration', $notification->data['metadata']['source']);
        $this->assertEquals(['welcome', 'onboarding'], $notification->data['metadata']['tags']);
    }

    /** @test */
    public function it_can_store_channels_array(): void
    {
        $channels = ['mail', 'database', 'sms', 'push'];

        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Multi-channel notification',
            'type' => 'alert',
            'channels' => $channels,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notifications', [
            'id' => $notification->id,
            'channels' => json_encode($channels),
        ]);
        $storedChannels = \assertNotifyArray($notification->channels);
        Assert::assertCount(4, $storedChannels);
        Assert::assertContains('mail', $storedChannels);
        Assert::assertContains('database', $storedChannels);
        Assert::assertContains('sms', $storedChannels);
        Assert::assertContains('push', $storedChannels);
    });

    test('_can_mark_as_read', function (): void {
$notification = NotificationFactory::new()->createOne([
=======

        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'channels' => json_encode($channels),
        ]);

        $this->assertIsArray($notification->channels);
        $this->assertCount(4, $notification->channels);
        $this->assertContains('mail', $notification->channels);
        $this->assertContains('database', $notification->channels);
        $this->assertContains('sms', $notification->channels);
        $this->assertContains('push', $notification->channels);
    }

    /** @test */
    public function it_can_mark_as_read(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Unread notification',
            'type' => 'info',
        ]);

<<<<<<< HEAD
        Assert::assertNull($notification->read_at);

        $notification->update(['read_at' => now()]);

        Assert::assertNotNull(\assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->read_at);
        \assertNotifyTableHas('notifications', [
            'id' => $notification->id,
            'read_at' => \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->read_at,
        ]);
    });

    test('_can_mark_as_sent', function (): void {
$notification = NotificationFactory::new()->createOne([
=======
        $this->assertNull($notification->read_at);

        $notification->update(['read_at' => now()]);

        $this->assertNotNull($notification->fresh()->read_at);
        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'read_at' => $notification->fresh()->read_at,
        ]);
    }

    /** @test */
    public function it_can_mark_as_sent(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Pending notification',
            'type' => 'info',
            'status' => 'pending',
        ]);

<<<<<<< HEAD
        Assert::assertNull($notification->sent_at);
=======
        $this->assertNull($notification->sent_at);
>>>>>>> 929ed821d (.)

        $notification->update([
            'sent_at' => now(),
            'status' => 'sent',
        ]);

<<<<<<< HEAD
        Assert::assertNotNull(\assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->sent_at);
        Assert::assertEquals('sent', \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->status);
        \assertNotifyTableHas('notifications', [
            'id' => $notification->id,
            'sent_at' => \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->sent_at,
            'status' => 'sent',
        ]);
    });

    test('_can_update_notification', function (): void {
$notification = NotificationFactory::new()->createOne([
=======
        $this->assertNotNull($notification->fresh()->sent_at);
        $this->assertEquals('sent', $notification->fresh()->status);
        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'sent_at' => $notification->fresh()->sent_at,
            'status' => 'sent',
        ]);
    }

    /** @test */
    public function it_can_update_notification(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Original message',
            'type' => 'info',
            'status' => 'pending',
        ]);

        $notification->update([
            'message' => 'Updated message',
            'type' => 'warning',
            'status' => 'sent',
            'data' => ['updated' => true],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notifications', [
=======

        $this->assertDatabaseHas('notifications', [
>>>>>>> 929ed821d (.)
            'id' => $notification->id,
            'message' => 'Updated message',
            'type' => 'warning',
            'status' => 'sent',
        ]);

<<<<<<< HEAD
        Assert::assertEquals('Updated message', \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->message);
        Assert::assertEquals('warning', \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->type);
        Assert::assertEquals('sent', \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->status);
        Assert::assertEquals(['updated' => true], \assertFreshModel($notification, \Modules\Notify\Models\Notification::class)->data);
    });

    test('_can_find_by_type', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertEquals('Updated message', $notification->fresh()->message);
        $this->assertEquals('warning', $notification->fresh()->type);
        $this->assertEquals('sent', $notification->fresh()->status);
        $this->assertEquals(['updated' => true], $notification->fresh()->data);
    }

    /** @test */
    public function it_can_find_by_type(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Info notification',
            'type' => 'info',
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Warning notification',
            'type' => 'warning',
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Error notification',
            'type' => 'error',
        ]);

        $infoNotifications = Notification::where('type', 'info')->get();
        $warningNotifications = Notification::where('type', 'warning')->get();
        $errorNotifications = Notification::where('type', 'error')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $infoNotifications);
        Assert::assertCount(1, $warningNotifications);
        Assert::assertCount(1, $errorNotifications);
        Assert::assertEquals('info', \assertFirstModel($infoNotifications, \Modules\Notify\Models\Notification::class)->type);
        Assert::assertEquals('warning', \assertFirstModel($warningNotifications, \Modules\Notify\Models\Notification::class)->type);
        Assert::assertEquals('error', \assertFirstModel($errorNotifications, \Modules\Notify\Models\Notification::class)->type);
    });

    test('_can_find_by_status', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(1, $infoNotifications);
        $this->assertCount(1, $warningNotifications);
        $this->assertCount(1, $errorNotifications);
        $this->assertEquals('info', $infoNotifications[0]->type);
        $this->assertEquals('warning', $warningNotifications[0]->type);
        $this->assertEquals('error', $errorNotifications[0]->type);
    }

    /** @test */
    public function it_can_find_by_status(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Pending notification',
            'type' => 'info',
            'status' => 'pending',
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Sent notification',
            'type' => 'info',
            'status' => 'sent',
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Failed notification',
            'type' => 'info',
            'status' => 'failed',
        ]);

        $pendingNotifications = Notification::where('status', 'pending')->get();
        $sentNotifications = Notification::where('status', 'sent')->get();
        $failedNotifications = Notification::where('status', 'failed')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $pendingNotifications);
        Assert::assertCount(1, $sentNotifications);
        Assert::assertCount(1, $failedNotifications);
        Assert::assertEquals('pending', \assertFirstModel($pendingNotifications, \Modules\Notify\Models\Notification::class)->status);
        Assert::assertEquals('sent', \assertFirstModel($sentNotifications, \Modules\Notify\Models\Notification::class)->status);
        Assert::assertEquals('failed', \assertFirstModel($failedNotifications, \Modules\Notify\Models\Notification::class)->status);
    });

    test('_can_find_by_tenant_id', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(1, $pendingNotifications);
        $this->assertCount(1, $sentNotifications);
        $this->assertCount(1, $failedNotifications);
        $this->assertEquals('pending', $pendingNotifications[0]->status);
        $this->assertEquals('sent', $sentNotifications[0]->status);
        $this->assertEquals('failed', $failedNotifications[0]->status);
    }

    /** @test */
    public function it_can_find_by_tenant_id(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Tenant 1 notification',
            'type' => 'info',
            'tenant_id' => 1,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Tenant 2 notification',
            'type' => 'info',
            'tenant_id' => 2,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Tenant 1 another notification',
            'type' => 'warning',
            'tenant_id' => 1,
        ]);

        $tenant1Notifications = Notification::where('tenant_id', 1)->get();
        $tenant2Notifications = Notification::where('tenant_id', 2)->get();

<<<<<<< HEAD
        Assert::assertCount(2, $tenant1Notifications);
        Assert::assertCount(1, $tenant2Notifications);
        Assert::assertEquals(1, \assertFirstModel($tenant1Notifications, \Modules\Notify\Models\Notification::class)->tenant_id);
        Assert::assertEquals(1, \assertFirstModel($tenant1Notifications->slice(1), \Modules\Notify\Models\Notification::class)->tenant_id);
        Assert::assertEquals(2, \assertFirstModel($tenant2Notifications, \Modules\Notify\Models\Notification::class)->tenant_id);
    });

    test('_can_find_by_user_id', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(2, $tenant1Notifications);
        $this->assertCount(1, $tenant2Notifications);
        $this->assertEquals(1, $tenant1Notifications[0]->tenant_id);
        $this->assertEquals(1, $tenant1Notifications[1]->tenant_id);
        $this->assertEquals(2, $tenant2Notifications[0]->tenant_id);
    }

    /** @test */
    public function it_can_find_by_user_id(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'User 123 notification',
            'type' => 'info',
            'user_id' => 123,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'User 456 notification',
            'type' => 'info',
            'user_id' => 456,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'User 123 another notification',
            'type' => 'warning',
            'user_id' => 123,
        ]);

        $user123Notifications = Notification::where('user_id', 123)->get();
        $user456Notifications = Notification::where('user_id', 456)->get();

<<<<<<< HEAD
        Assert::assertCount(2, $user123Notifications);
        Assert::assertCount(1, $user456Notifications);
        Assert::assertEquals(123, \assertFirstModel($user123Notifications, \Modules\Notify\Models\Notification::class)->user_id);
        Assert::assertEquals(123, \assertFirstModel($user123Notifications->slice(1), \Modules\Notify\Models\Notification::class)->user_id);
        Assert::assertEquals(456, \assertFirstModel($user456Notifications, \Modules\Notify\Models\Notification::class)->user_id);
    });

    test('_can_find_by_subject', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(2, $user123Notifications);
        $this->assertCount(1, $user456Notifications);
        $this->assertEquals(123, $user123Notifications[0]->user_id);
        $this->assertEquals(123, $user123Notifications[1]->user_id);
        $this->assertEquals(456, $user456Notifications[0]->user_id);
    }

    /** @test */
    public function it_can_find_by_subject(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'User subject notification',
            'type' => 'info',
            'subject_type' => 'App\Models\User',
            'subject_id' => 123,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Company subject notification',
            'type' => 'info',
            'subject_type' => 'App\Models\Company',
            'subject_id' => 456,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'User subject another notification',
            'type' => 'warning',
            'subject_type' => 'App\Models\User',
            'subject_id' => 789,
        ]);

        $userSubjectNotifications = Notification::where('subject_type', 'App\Models\User')->get();
        $companySubjectNotifications = Notification::where('subject_type', 'App\Models\Company')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $userSubjectNotifications);
        Assert::assertCount(1, $companySubjectNotifications);
        Assert::assertEquals('App\Models\User', \assertFirstModel($userSubjectNotifications, \Modules\Notify\Models\Notification::class)->subject_type);
        Assert::assertEquals('App\Models\User', \assertFirstModel($userSubjectNotifications->slice(1), \Modules\Notify\Models\Notification::class)->subject_type);
        Assert::assertEquals('App\Models\Company', \assertFirstModel($companySubjectNotifications, \Modules\Notify\Models\Notification::class)->subject_type);
    });

    test('_can_find_by_channel', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(2, $userSubjectNotifications);
        $this->assertCount(1, $companySubjectNotifications);
        $this->assertEquals('App\Models\User', $userSubjectNotifications[0]->subject_type);
        $this->assertEquals('App\Models\User', $userSubjectNotifications[1]->subject_type);
        $this->assertEquals('App\Models\Company', $companySubjectNotifications[0]->subject_type);
    }

    /** @test */
    public function it_can_find_by_channel(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Mail notification',
            'type' => 'info',
            'channels' => ['mail'],
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'SMS notification',
            'type' => 'info',
            'channels' => ['sms'],
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Multi-channel notification',
            'type' => 'info',
            'channels' => ['mail', 'database', 'sms'],
        ]);

        $mailNotifications = Notification::whereJsonContains('channels', 'mail')->get();
        $smsNotifications = Notification::whereJsonContains('channels', 'sms')->get();
        $databaseNotifications = Notification::whereJsonContains('channels', 'database')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $mailNotifications);
        Assert::assertCount(2, $smsNotifications);
        Assert::assertCount(1, $databaseNotifications);
    });

    test('_can_find_by_data_pattern', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(2, $mailNotifications);
        $this->assertCount(2, $smsNotifications);
        $this->assertCount(1, $databaseNotifications);
    }

    /** @test */
    public function it_can_find_by_data_pattern(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'High priority notification',
            'type' => 'alert',
            'data' => [
                'priority' => 'high',
                'category' => 'security',
            ],
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Low priority notification',
            'type' => 'info',
            'data' => [
                'priority' => 'low',
                'category' => 'general',
            ],
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Medium priority notification',
            'type' => 'warning',
            'data' => [
                'priority' => 'medium',
                'category' => 'maintenance',
            ],
        ]);

        $highPriorityNotifications = Notification::whereJsonPath('data.priority', 'high')->get();
        $securityNotifications = Notification::whereJsonPath('data.category', 'security')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $highPriorityNotifications);
        Assert::assertCount(1, $securityNotifications);
        Assert::assertEquals('high', \assertFirstModel($highPriorityNotifications, \Modules\Notify\Models\Notification::class)->data['priority']);
        Assert::assertEquals('security', \assertFirstModel($securityNotifications, \Modules\Notify\Models\Notification::class)->data['category']);
    });

    test('_can_find_by_read_status', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(1, $highPriorityNotifications);
        $this->assertCount(1, $securityNotifications);
        $this->assertEquals('high', $highPriorityNotifications[0]->data['priority']);
        $this->assertEquals('security', $securityNotifications[0]->data['category']);
    }

    /** @test */
    public function it_can_find_by_read_status(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Unread notification',
            'type' => 'info',
            'read_at' => null,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Read notification',
            'type' => 'info',
            'read_at' => now(),
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Another unread notification',
            'type' => 'warning',
            'read_at' => null,
        ]);

        $unreadNotifications = Notification::whereNull('read_at')->get();
        $readNotifications = Notification::whereNotNull('read_at')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $unreadNotifications);
        Assert::assertCount(1, $readNotifications);
        Assert::assertNull(\assertFirstModel($unreadNotifications, \Modules\Notify\Models\Notification::class)->read_at);
        Assert::assertNull(\assertFirstModel($unreadNotifications, \Modules\Notify\Models\Notification::class)->read_at);
        Assert::assertNotNull(\assertFirstModel($readNotifications, \Modules\Notify\Models\Notification::class)->read_at);
    });

    test('_can_find_by_sent_status', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(2, $unreadNotifications);
        $this->assertCount(1, $readNotifications);
        $this->assertNull($unreadNotifications[0]->read_at);
        $this->assertNull($unreadNotifications[1]->read_at);
        $this->assertNotNull($readNotifications[0]->read_at);
    }

    /** @test */
    public function it_can_find_by_sent_status(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Unsent notification',
            'type' => 'info',
            'sent_at' => null,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Sent notification',
            'type' => 'info',
            'sent_at' => now(),
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Another unsent notification',
            'type' => 'warning',
            'sent_at' => null,
        ]);

        $unsentNotifications = Notification::whereNull('sent_at')->get();
        $sentNotifications = Notification::whereNotNull('sent_at')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $unsentNotifications);
        Assert::assertCount(1, $sentNotifications);
        Assert::assertNull(\assertFirstModel($unsentNotifications, \Modules\Notify\Models\Notification::class)->sent_at);
        Assert::assertNull(\assertFirstModel($unsentNotifications, \Modules\Notify\Models\Notification::class)->sent_at);
        Assert::assertNotNull(\assertFirstModel($sentNotifications, \Modules\Notify\Models\Notification::class)->sent_at);
    });

    test('_can_find_by_date_range', function (): void {
$yesterday = now()->subDay();
        $today = now();
        $tomorrow = now()->addDay();

        NotificationFactory::new()->createOne([
=======
        $this->assertCount(2, $unsentNotifications);
        $this->assertCount(1, $sentNotifications);
        $this->assertNull($unsentNotifications[0]->sent_at);
        $this->assertNull($unsentNotifications[1]->sent_at);
        $this->assertNotNull($sentNotifications[0]->sent_at);
    }

    /** @test */
    public function it_can_find_by_date_range(): void
    {
        $yesterday = now()->subDay();
        $today = now();
        $tomorrow = now()->addDay();

        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Yesterday notification',
            'type' => 'info',
            'created_at' => $yesterday,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Today notification',
            'type' => 'info',
            'created_at' => $today,
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Tomorrow notification',
            'type' => 'info',
            'created_at' => $tomorrow,
        ]);

        $todayNotifications = Notification::whereDate('created_at', $today->toDateString())->get();
        $recentNotifications = Notification::where('created_at', '>=', $yesterday)->get();

<<<<<<< HEAD
        Assert::assertCount(1, $todayNotifications);
        Assert::assertCount(2, $recentNotifications); // yesterday and today
        Assert::assertEquals('Today notification', \assertFirstModel($todayNotifications, \Modules\Notify\Models\Notification::class)->message);
    });

    test('_can_find_by_multiple_criteria', function (): void {
NotificationFactory::new()->createOne([
=======
        $this->assertCount(1, $todayNotifications);
        $this->assertCount(2, $recentNotifications); // yesterday and today
        $this->assertEquals('Today notification', $todayNotifications[0]->message);
    }

    /** @test */
    public function it_can_find_by_multiple_criteria(): void
    {
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'High priority security alert',
            'type' => 'alert',
            'status' => 'pending',
            'tenant_id' => 1,
            'data' => [
                'priority' => 'high',
                'category' => 'security',
            ],
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Low priority general info',
            'type' => 'info',
            'status' => 'sent',
            'tenant_id' => 1,
            'data' => [
                'priority' => 'low',
                'category' => 'general',
            ],
        ]);

<<<<<<< HEAD
        NotificationFactory::new()->createOne([
=======
        Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Medium priority maintenance warning',
            'type' => 'warning',
            'status' => 'pending',
            'tenant_id' => 2,
            'data' => [
                'priority' => 'medium',
                'category' => 'maintenance',
            ],
        ]);

        $pendingHighPriorityTenant1 = Notification::where('status', 'pending')
            ->where('tenant_id', 1)
            ->whereJsonPath('data.priority', 'high')
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $pendingHighPriorityTenant1);
        Assert::assertEquals('High priority security alert', \assertFirstModel($pendingHighPriorityTenant1, \Modules\Notify\Models\Notification::class)->message);
        Assert::assertEquals('pending', \assertFirstModel($pendingHighPriorityTenant1, \Modules\Notify\Models\Notification::class)->status);
        Assert::assertEquals(1, \assertFirstModel($pendingHighPriorityTenant1, \Modules\Notify\Models\Notification::class)->tenant_id);
        Assert::assertEquals('high', \notifyArrayGet(\assertFirstModel($pendingHighPriorityTenant1, \Modules\Notify\Models\Notification::class)->data, 'priority'));
    });

    test('_can_handle_empty_data', function (): void {
$notification = NotificationFactory::new()->createOne([
=======
        $this->assertCount(1, $pendingHighPriorityTenant1);
        $this->assertEquals('High priority security alert', $pendingHighPriorityTenant1[0]->message);
        $this->assertEquals('pending', $pendingHighPriorityTenant1[0]->status);
        $this->assertEquals(1, $pendingHighPriorityTenant1[0]->tenant_id);
        $this->assertEquals('high', $pendingHighPriorityTenant1[0]->data['priority']);
    }

    /** @test */
    public function it_can_handle_empty_data(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Empty data notification',
            'type' => 'info',
            'data' => [],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notifications', [
            'id' => $notification->id,
            'data' => json_encode([]),
        ]);
        Assert::assertEmpty($notification->data);
    });

    test('_can_handle_empty_channels', function (): void {
$notification = NotificationFactory::new()->createOne([
=======

        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'data' => json_encode([]),
        ]);

        $this->assertIsArray($notification->data);
        $this->assertEmpty($notification->data);
    }

    /** @test */
    public function it_can_handle_empty_channels(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'No channels notification',
            'type' => 'info',
            'channels' => [],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notifications', [
            'id' => $notification->id,
            'channels' => json_encode([]),
        ]);
        Assert::assertEmpty($notification->channels);
    });

    test('_can_handle_null_values', function (): void {
$notification = NotificationFactory::new()->createOne([
=======

        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'channels' => json_encode([]),
        ]);

        $this->assertIsArray($notification->channels);
        $this->assertEmpty($notification->channels);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $notification = Notification::create([
>>>>>>> 929ed821d (.)
            'message' => 'Null values notification',
            'type' => 'info',
            'tenant_id' => null,
            'user_id' => null,
            'subject_type' => null,
            'subject_id' => null,
            'channels' => null,
            'status' => null,
            'sent_at' => null,
            'data' => null,
        ]);

<<<<<<< HEAD
        Assert::assertNull($notification->tenant_id);
        Assert::assertNull($notification->user_id);
        Assert::assertNull($notification->subject_type);
        Assert::assertNull($notification->subject_id);
        Assert::assertNull($notification->channels);
        Assert::assertNull($notification->status);
        Assert::assertNull($notification->sent_at);
        Assert::assertNull($notification->data);
    });
});
=======
        $this->assertNull($notification->tenant_id);
        $this->assertNull($notification->user_id);
        $this->assertNull($notification->subject_type);
        $this->assertNull($notification->subject_id);
        $this->assertNull($notification->channels);
        $this->assertNull($notification->status);
        $this->assertNull($notification->sent_at);
        $this->assertNull($notification->data);
    }
}
>>>>>>> 929ed821d (.)
