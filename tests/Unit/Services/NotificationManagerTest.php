<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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

class NotificationManagerTest extends TestCase
{
    private NotificationManager $notificationManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notificationManager = new NotificationManager;
    }

    /** @test */
    public function it_has_required_methods(): void
    {
        $reflection = new \ReflectionClass($this->notificationManager);

        Assert::assertTrue($reflection->hasMethod('send'));
        Assert::assertTrue($reflection->hasMethod('sendMultiple'));
        Assert::assertTrue($reflection->hasMethod('getTemplate'));
        Assert::assertTrue($reflection->hasMethod('getTemplatesByCategory'));
    }

    /** @test */
    public function it_throws_exception_when_template_not_found(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Template not found: invalid_template');

        $recipient = UserFactory::new()->createOne();
        Assert::assertInstanceOf(Model::class, $recipient);
        $this->notificationManager->send($recipient, 'invalid_template');
    }

    /** @test */
    public function it_returns_null_when_template_lookup_misses(): void
    {
        $result = $this->notificationManager->getTemplate('missing-template-code');

        Assert::assertNull($result);
    }

    /** @test */
    public function it_returns_template_when_code_exists(): void
    {
        $template = NotificationTemplateFactory::new()->createOne([
            'code' => 'manager-test-template',
            'is_active' => true,
        ]);

        $result = $this->notificationManager->getTemplate('manager-test-template');

        Assert::assertInstanceOf(NotificationTemplate::class, $result);
        Assert::assertSame($template->id, $result->id);
    }

    /** @test */
    public function it_returns_collection_from_get_templates_by_category(): void
    {
        $result = $this->notificationManager->getTemplatesByCategory('general');

        Assert::assertInstanceOf(Collection::class, $result);
    }

    /** @test */
    public function it_can_send_notification_with_mocked_action(): void
    {
        NotificationTemplateFactory::new()->createOne([
            'code' => 'send-test-template',
            'is_active' => true,
        ]);

        $recipient = UserFactory::new()->createOne();
        Assert::assertInstanceOf(Model::class, $recipient);
        $notification = NotificationFactory::new()->createOne();

        $action = $this->createMock(SendNotificationAction::class);
        $action->expects($this->once())
            ->method('handle')
            ->willReturn($notification);

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->send($recipient, 'send-test-template');

        Assert::assertInstanceOf(Notification::class, $result);
    }

    /** @test */
    public function it_returns_notifications_array_from_send_multiple(): void
    {
        NotificationTemplateFactory::new()->createOne([
            'code' => 'multi-test-template',
            'is_active' => true,
        ]);

        $firstRecipient = UserFactory::new()->createOne();
        $secondRecipient = UserFactory::new()->createOne();
        Assert::assertInstanceOf(Model::class, $firstRecipient);
        Assert::assertInstanceOf(Model::class, $secondRecipient);

        /** @var array<int, Model> $recipients */
        $recipients = [$firstRecipient, $secondRecipient];
        $notification = NotificationFactory::new()->createOne();

        $action = $this->createMock(SendNotificationAction::class);
        $action->expects($this->exactly(2))
            ->method('handle')
            ->willReturn($notification);

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->sendMultiple($recipients, 'multi-test-template');

        Assert::assertCount(2, $result);
        Assert::assertContainsOnlyInstancesOf(Notification::class, $result);
    }

    /** @test */
    public function send_method_accepts_model_recipient(): void
    {
        $reflection = new \ReflectionClass(NotificationManager::class);
        $method = $reflection->getMethod('send');
        $params = $method->getParameters();

        Assert::assertCount(5, $params);
        \assertReflectionTypeName($params[0]->getType(), Model::class);
    }
}
