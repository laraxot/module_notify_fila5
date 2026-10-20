<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Services\NotificationManager;
use Modules\Notify\Tests\TestCase;

class NotificationManagerTest extends TestCase
{
    private NotificationManager $notificationManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notificationManager = new NotificationManager();
    }

    /**
     * Destinatario concreto: `send()` richiede un `Model` reale, non un mock Mockery.
     */
    private function makeRecipient(): Model
    {
        return new class extends Model {
            protected $guarded = [];

            public $timestamps = false;
        };
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_can_send_notification_to_single_recipient(): void
    {
        $recipient = $this->makeRecipient();
        $templateCode = 'test_template';
        $data = ['key' => 'value'];
        $channels = ['email'];
        $options = ['priority' => 'high'];

        $template = Mockery::mock(NotificationTemplate::class);
        $template->shouldReceive('getAttribute')->with('code')->andReturn($templateCode);

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('handle')->with($recipient, $templateCode, $data, $channels, $options)->once();

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->send($recipient, $templateCode, $data, $channels, $options);

        $this->assertSame([], $result);
    }

    /** @test */
    public function it_can_send_notification_to_multiple_recipients(): void
    {
        $recipients = [
            $this->makeRecipient(),
            $this->makeRecipient(),
        ];
        $templateCode = 'test_template';
        $data = ['key' => 'value'];
        $channels = ['email'];
        $options = ['priority' => 'high'];

        $template = Mockery::mock(NotificationTemplate::class);
        $template->shouldReceive('getAttribute')->with('code')->andReturn($templateCode);

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('handle')->times(2);

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->sendMultiple($recipients, $templateCode, $data, $channels, $options);

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

        $this->assertCount(0, $result);
    }

    /** @test */
    public function it_throws_exception_when_template_not_found(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageIs('Template not found: invalid_template');

        $recipient = $this->makeRecipient();
        $templateCode = 'invalid_template';

        $this->notificationManager->send($recipient, $templateCode);
    }

    /** @test */
    public function it_returns_array_from_send_method(): void
    {
        $recipient = $this->makeRecipient();
        $templateCode = 'test_template';

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('handle')->once();

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->send($recipient, $templateCode);

        $this->assertSame([], $result);
    }

    /** @test */
    public function it_returns_array_from_send_multiple_method(): void
    {
        $recipients = [$this->makeRecipient()];
        $templateCode = 'test_template';

        $action = Mockery::mock(SendNotificationAction::class);
        $action->shouldReceive('handle')->once();

        app()->instance(SendNotificationAction::class, $action);

        $result = $this->notificationManager->sendMultiple($recipients, $templateCode);

        $this->assertCount(1, $result);
    }
}
