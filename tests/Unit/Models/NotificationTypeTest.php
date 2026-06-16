<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use Modules\Notify\Database\Factories\NotificationTypeFactory;
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Notification Type', function (): void {
    test('_can_create_notification_type', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$notificationType = NotificationTypeFactory::new()->createOne([
=======
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Tests\TestCase;

class NotificationTypeTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_notification_type(): void
    {
        $notificationType = NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Email Notification',
            'description' => 'Email notification type for sending emails',
            'template' => 'email_template_1',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notification_types', [
=======

        $this->assertDatabaseHas('notification_types', [
>>>>>>> 929ed821d (.)
            'id' => $notificationType->id,
            'name' => 'Email Notification',
            'description' => 'Email notification type for sending emails',
            'template' => 'email_template_1',
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(NotificationType::class, $notificationType);
    });

    test('_has_correct_fillable_fields', function (): void {
$notificationType = new NotificationType;
=======
        $this->assertInstanceOf(NotificationType::class, $notificationType);
    }

    /** @test */
    public function it_has_correct_fillable_fields(): void
    {
        $notificationType = new NotificationType;
>>>>>>> 929ed821d (.)

        $expectedFillable = [
            'name',
            'description',
            'template',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $notificationType->getFillable());
    });

    test('_can_update_notification_type', function (): void {
$notificationType = NotificationTypeFactory::new()->createOne([
=======
        $this->assertEquals($expectedFillable, $notificationType->getFillable());
    }

    /** @test */
    public function it_can_update_notification_type(): void
    {
        $notificationType = NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Original Name',
            'description' => 'Original description',
            'template' => 'original_template',
        ]);

        $notificationType->update([
            'name' => 'Updated Name',
            'description' => 'Updated description',
            'template' => 'updated_template',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notification_types', [
=======

        $this->assertDatabaseHas('notification_types', [
>>>>>>> 929ed821d (.)
            'id' => $notificationType->id,
            'name' => 'Updated Name',
            'description' => 'Updated description',
            'template' => 'updated_template',
        ]);

<<<<<<< HEAD
        $fresh = $this->freshModel($notificationType, NotificationType::class);
        Assert::assertEquals('Updated Name', $fresh->name);
        Assert::assertEquals('Updated description', $fresh->description);
        Assert::assertEquals('updated_template', $fresh->template);
    });

    test('_can_find_by_name', function (): void {
$notificationType = NotificationTypeFactory::new()->createOne([
=======
        $this->assertEquals('Updated Name', $notificationType->fresh()->name);
        $this->assertEquals('Updated description', $notificationType->fresh()->description);
        $this->assertEquals('updated_template', $notificationType->fresh()->template);
    }

    /** @test */
    public function it_can_find_by_name(): void
    {
        $notificationType = NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'SMS Notification',
            'description' => 'SMS notification type',
            'template' => 'sms_template',
        ]);

        $found = NotificationType::where('name', 'SMS Notification')->first();

<<<<<<< HEAD
        Assert::assertNotNull($found);
        Assert::assertEquals($notificationType->id, $found->id);
        Assert::assertEquals('SMS Notification', $found->name);
        Assert::assertEquals('SMS notification type', $found->description);
        Assert::assertEquals('sms_template', $found->template);
    });

    test('_can_find_by_template', function (): void {
NotificationTypeFactory::new()->createOne([
=======
        $this->assertNotNull($found);
        $this->assertEquals($notificationType->id, $found->id);
        $this->assertEquals('SMS Notification', $found->name);
        $this->assertEquals('SMS notification type', $found->description);
        $this->assertEquals('sms_template', $found->template);
    }

    /** @test */
    public function it_can_find_by_template(): void
    {
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Email Type 1',
            'description' => 'First email template',
            'template' => 'email_template_1',
        ]);

<<<<<<< HEAD
        NotificationTypeFactory::new()->createOne([
=======
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Email Type 2',
            'description' => 'Second email template',
            'template' => 'email_template_2',
        ]);

        $template1Types = NotificationType::where('template', 'email_template_1')->get();
        $template2Types = NotificationType::where('template', 'email_template_2')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $template1Types);
        Assert::assertCount(1, $template2Types);
        Assert::assertEquals('email_template_1', \assertFirstModel($template1Types, \Modules\Notify\Models\NotificationType::class)->template);
        Assert::assertEquals('email_template_2', \assertFirstModel($template2Types, \Modules\Notify\Models\NotificationType::class)->template);
    });

    test('_can_find_by_description_pattern', function (): void {
NotificationTypeFactory::new()->createOne([
=======
        $this->assertCount(1, $template1Types);
        $this->assertCount(1, $template2Types);
        $this->assertEquals('email_template_1', $template1Types[0]->template);
        $this->assertEquals('email_template_2', $template2Types[0]->template);
    }

    /** @test */
    public function it_can_find_by_description_pattern(): void
    {
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Email Type',
            'description' => 'Email notification type for users',
            'template' => 'email_template',
        ]);

<<<<<<< HEAD
        NotificationTypeFactory::new()->createOne([
=======
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'SMS Type',
            'description' => 'SMS notification type for users',
            'template' => 'sms_template',
        ]);

<<<<<<< HEAD
        NotificationTypeFactory::new()->createOne([
=======
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Push Type',
            'description' => 'Push notification type for mobile',
            'template' => 'push_template',
        ]);

        $userTypes = NotificationType::where('description', 'like', '%for users%')->get();
        $mobileTypes = NotificationType::where('description', 'like', '%mobile%')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $userTypes);
        Assert::assertCount(1, $mobileTypes);
        $firstUserType = \assertFirstModel($userTypes, NotificationType::class);
        $secondUserType = \assertFirstModel($userTypes->slice(1), NotificationType::class);
        $mobileType = \assertFirstModel($mobileTypes, NotificationType::class);
        Assert::assertStringContainsString('for users', (string) $firstUserType->description);
        Assert::assertStringContainsString('for users', (string) $secondUserType->description);
        Assert::assertStringContainsString('mobile', (string) $mobileType->description);
    });

    test('_can_handle_null_values', function (): void {
$notificationType = NotificationTypeFactory::new()->createOne([
=======
        $this->assertCount(2, $userTypes);
        $this->assertCount(1, $mobileTypes);
        $this->assertStringContainsString('for users', $userTypes[0]->description);
        $this->assertStringContainsString('for users', $userTypes[1]->description);
        $this->assertStringContainsString('mobile', $mobileTypes[0]->description);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $notificationType = NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'No Description Type',
            'description' => null,
            'template' => null,
        ]);

<<<<<<< HEAD
        Assert::assertNull($notificationType->description);
        Assert::assertNull($notificationType->template);
        \assertNotifyTableHas('notification_types', [
=======
        $this->assertNull($notificationType->description);
        $this->assertNull($notificationType->template);
        $this->assertDatabaseHas('notification_types', [
>>>>>>> 929ed821d (.)
            'id' => $notificationType->id,
            'description' => null,
            'template' => null,
        ]);
<<<<<<< HEAD
    });

    test('_can_create_multiple_types', function (): void {
$types = [
=======
    }

    /** @test */
    public function it_can_create_multiple_types(): void
    {
        $types = [
>>>>>>> 929ed821d (.)
            ['name' => 'Email', 'description' => 'Email notifications', 'template' => 'email'],
            ['name' => 'SMS', 'description' => 'SMS notifications', 'template' => 'sms'],
            ['name' => 'Push', 'description' => 'Push notifications', 'template' => 'push'],
            ['name' => 'Database', 'description' => 'Database notifications', 'template' => 'database'],
            ['name' => 'Slack', 'description' => 'Slack notifications', 'template' => 'slack'],
        ];

        foreach ($types as $typeData) {
<<<<<<< HEAD
            NotificationTypeFactory::new()->createOne($typeData);
        }

        Assert::assertSame(5, NotificationType::query()->count());
=======
            NotificationType::create($typeData);
        }

        $this->assertDatabaseCount('notification_types', 5);
>>>>>>> 929ed821d (.)

        $emailType = NotificationType::where('name', 'Email')->first();
        $smsType = NotificationType::where('name', 'SMS')->first();
        $pushType = NotificationType::where('name', 'Push')->first();
<<<<<<< HEAD
        Assert::assertInstanceOf(NotificationType::class, $emailType);
        Assert::assertInstanceOf(NotificationType::class, $smsType);
        Assert::assertInstanceOf(NotificationType::class, $pushType);

        Assert::assertEquals('Email notifications', $emailType->description);
        Assert::assertEquals('SMS notifications', $smsType->description);
        Assert::assertEquals('Push notifications', $pushType->description);
        Assert::assertEquals('email', $emailType->template);
        Assert::assertEquals('sms', $smsType->template);
        Assert::assertEquals('push', $pushType->template);
    });

    test('_can_find_by_multiple_criteria', function (): void {
NotificationTypeFactory::new()->createOne([
=======

        $this->assertEquals('Email notifications', $emailType->description);
        $this->assertEquals('SMS notifications', $smsType->description);
        $this->assertEquals('Push notifications', $pushType->description);
        $this->assertEquals('email', $emailType->template);
        $this->assertEquals('sms', $smsType->template);
        $this->assertEquals('push', $pushType->template);
    }

    /** @test */
    public function it_can_find_by_multiple_criteria(): void
    {
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'High Priority Email',
            'description' => 'High priority email notifications',
            'template' => 'high_priority_email',
        ]);

<<<<<<< HEAD
        NotificationTypeFactory::new()->createOne([
=======
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'Low Priority Email',
            'description' => 'Low priority email notifications',
            'template' => 'low_priority_email',
        ]);

<<<<<<< HEAD
        NotificationTypeFactory::new()->createOne([
=======
        NotificationType::create([
>>>>>>> 929ed821d (.)
            'name' => 'High Priority SMS',
            'description' => 'High priority SMS notifications',
            'template' => 'high_priority_sms',
        ]);

        $highPriorityEmailTypes = NotificationType::where('name', 'like', '%High Priority%')
            ->where('description', 'like', '%email%')
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $highPriorityEmailTypes);
        Assert::assertEquals('High Priority Email', \assertFirstModel($highPriorityEmailTypes, \Modules\Notify\Models\NotificationType::class)->name);
        Assert::assertEquals('High priority email notifications', \assertFirstModel($highPriorityEmailTypes, \Modules\Notify\Models\NotificationType::class)->description);
        Assert::assertEquals('high_priority_email', \assertFirstModel($highPriorityEmailTypes, \Modules\Notify\Models\NotificationType::class)->template);
    });
});
=======
        $this->assertCount(1, $highPriorityEmailTypes);
        $this->assertEquals('High Priority Email', $highPriorityEmailTypes[0]->name);
        $this->assertEquals('High priority email notifications', $highPriorityEmailTypes[0]->description);
        $this->assertEquals('high_priority_email', $highPriorityEmailTypes[0]->template);
    }
}
>>>>>>> 929ed821d (.)
