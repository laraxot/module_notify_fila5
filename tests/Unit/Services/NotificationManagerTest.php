<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Database\Factories\NotificationFactory;
use Modules\Notify\Database\Factories\NotificationTemplateFactory;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Services\NotificationManager;
use Modules\Notify\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
    $this->notificationManager = new NotificationManager;
});

describe('Notification Manager', function (): void {
    test('_has_required_methods', function (): void {
        $reflection = new \ReflectionClass($this->notificationManager());

        Assert::assertTrue($reflection->hasMethod('send'));
        Assert::assertTrue($reflection->hasMethod('sendMultiple'));
        Assert::assertTrue($reflection->hasMethod('getTemplate'));
        Assert::assertTrue($reflection->hasMethod('getTemplatesByCategory'));
    });

    test('_throws_exception_when_template_not_found', function (): void {
        $this->expectApplicationException(Exception::class);
        $this->expectThrowableMessage('Template not found: invalid_template');

        $recipient = UserFactory::new()->createOne();
        $this->notificationManager()->send($recipient, 'invalid_template');
    });

    test('_returns_null_when_template_lookup_misses', function (): void {
        $result = $this->notificationManager()->getTemplate('missing-template-code');

        Assert::assertNull($result);
    });

    test('_returns_template_when_code_exists', function (): void {
        $template = NotificationTemplateFactory::new()->createOne([
            'code' => 'manager-test-template',
            'is_active' => true,
        ]);

        $result = $this->notificationManager()->getTemplate('manager-test-template');

        Assert::assertInstanceOf(NotificationTemplate::class, $result);
        Assert::assertSame($template->id, $result->id);
    });

    test('_returns_collection_from_get_templates_by_category', function (): void {
        $result = $this->notificationManager()->getTemplatesByCategory('general');

        Assert::assertInstanceOf(Collection::class, $result);
    });

    test('_can_send_notification_with_mocked_action', function (): void {
        NotificationTemplateFactory::new()->createOne([
            'code' => 'send-test-template',
            'is_active' => true,
        ]);

        $recipient = UserFactory::new()->createOne();
        $notification = NotificationFactory::new()->createOne();

        $action = $this->createUnitMock(SendNotificationAction::class);
        $action->expects($this->expectsOnce())
            ->method('handle')
            ->willReturn($notification);

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager()->send($recipient, 'send-test-template');

        Assert::assertInstanceOf(Notification::class, $result);
    });

    test('_returns_notifications_array_from_send_multiple', function (): void {
        NotificationTemplateFactory::new()->createOne([
            'code' => 'multi-test-template',
            'is_active' => true,
        ]);

        $firstRecipient = UserFactory::new()->createOne();
        $secondRecipient = UserFactory::new()->createOne();

        /** @var array<int, User> $recipients */
        $recipients = [$firstRecipient, $secondRecipient];
        $notification = NotificationFactory::new()->createOne();

        $action = $this->createUnitMock(SendNotificationAction::class);
        $action->expects($this->expectsExactly(2))
            ->method('handle')
            ->willReturn($notification);

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager()->sendMultiple($recipients, 'multi-test-template');

        Assert::assertCount(2, $result);
        Assert::assertContainsOnlyInstancesOf(Notification::class, $result);
    });
});
=======
use Mockery;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Services\NotificationManager;
use PHPUnit\Framework\TestCase;

class NotificationManagerTest extends TestCase
{
    private NotificationManager $notificationManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notificationManager = new NotificationManager;
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_can_send_notification_to_single_recipient(): void
    {
        $recipient = Mockery::mock('Illuminate\Database\Eloquent\Model');
        $templateCode = 'test_template';
        $data = ['key' => 'value'];
        $channels = ['email'];
        $options = ['priority' => 'high'];

        $template = Mockery::mock(NotificationTemplate::class);
        $template->shouldReceive('getAttribute')->with('code')->andReturn($templateCode);

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('execute')->with($recipient, $templateCode, $data, $channels, $options)->once();

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->send($recipient, $templateCode, $data, $channels, $options);

        $this->assertIsArray($result);
    }

    /** @test */
    public function it_can_send_notification_to_multiple_recipients(): void
    {
        $recipients = [
            Mockery::mock('Illuminate\Database\Eloquent\Model'),
            Mockery::mock('Illuminate\Database\Eloquent\Model'),
        ];
        $templateCode = 'test_template';
        $data = ['key' => 'value'];
        $channels = ['email'];
        $options = ['priority' => 'high'];

        $template = Mockery::mock(NotificationTemplate::class);
        $template->shouldReceive('getAttribute')->with('code')->andReturn($templateCode);

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('execute')->times(2);

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->sendMultiple($recipients, $templateCode, $data, $channels, $options);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }

    /** @test */
    public function it_can_get_template_by_code(): void
    {
        $code = 'test_template';

        $template = Mockery::mock(NotificationTemplate::class);
        $template->shouldReceive('getAttribute')->with('code')->andReturn($code);
        $template->shouldReceive('getAttribute')->with('is_active')->andReturn(true);

        $result = $this->notificationManager->getTemplate($code);

        $this->assertNull($result); // Mock non restituisce risultati reali
    }

    /** @test */
    public function it_can_get_templates_by_category(): void
    {
        $category = 'test_category';

        $result = $this->notificationManager->getTemplatesByCategory($category);

        $this->assertIsObject($result); // Collection
    }

    /** @test */
    public function it_throws_exception_when_template_not_found(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Template not found: invalid_template');

        $recipient = Mockery::mock('Illuminate\Database\Eloquent\Model');
        $templateCode = 'invalid_template';

        $this->notificationManager->send($recipient, $templateCode);
    }

    /** @test */
    public function it_has_required_methods(): void
    {
        $this->assertTrue(method_exists($this->notificationManager, 'send'));
        $this->assertTrue(method_exists($this->notificationManager, 'sendMultiple'));
        $this->assertTrue(method_exists($this->notificationManager, 'getTemplate'));
        $this->assertTrue(method_exists($this->notificationManager, 'getTemplatesByCategory'));
    }

    /** @test */
    public function it_returns_array_from_send_method(): void
    {
        $recipient = Mockery::mock('Illuminate\Database\Eloquent\Model');
        $templateCode = 'test_template';

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('execute')->once();

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->send($recipient, $templateCode);

        $this->assertIsArray($result);
    }

    /** @test */
    public function it_returns_array_from_send_multiple_method(): void
    {
        $recipients = [Mockery::mock('Illuminate\Database\Eloquent\Model')];
        $templateCode = 'test_template';

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('execute')->once();

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->sendMultiple($recipients, $templateCode);

        $this->assertIsArray($result);
    }
}
>>>>>>> 929ed821d (.)
