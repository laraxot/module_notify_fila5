<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Mockery;
<<<<<<< HEAD
use Modules\Notify\Actions\NotificationManager;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Models\NotificationTemplate;
=======
use Mockery\MockInterface;
use Modules\Notify\Actions\NotificationManager;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class)->group('notify-db');
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

function actionsNotificationManagerRecipient(): Model
{
    return new class extends Model
    {
        protected $guarded = [];

        public $timestamps = false;
    };
}

<<<<<<< HEAD
=======
/**
 * @template T of object
 *
 * @param  class-string<T>  $class
 * @return MockInterface&T
 */
function actionsNotificationManagerMock(string $class): MockInterface
{
    /** @var MockInterface&T $mock */
    $mock = Mockery::mock($class);

    return $mock;
}

beforeEach(function (): void {
    $this->notificationManager = new NotificationManager;
});

>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
afterEach(function (): void {
    Mockery::close();
});

it('can send notification to single recipient', function (): void {
<<<<<<< HEAD
    $notificationManager = new NotificationManager;
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'test_template';
    $data = ['key' => 'value'];
    $channels = ['email'];
    $options = ['priority' => 'high'];

<<<<<<< HEAD
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')
        ->with($recipient, $templateCode, $data, $channels, $options)
        ->once();

    app()->instance(SendNotificationAction::class, $action);

    $notificationManager->send($recipient, $templateCode, $data, $channels, $options);
});

it('can send notification to multiple recipients', function (): void {
    $notificationManager = new NotificationManager;
    $recipients = [
        actionsNotificationManagerRecipient(),
        actionsNotificationManagerRecipient()];
=======
    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    $action->shouldReceive('handle')
        ->once()
        ->with($recipient, $templateCode, $data, $channels, $options);

    $this->instance(SendNotificationAction::class, $action);

    $this->notificationManager->send($recipient, $templateCode, $data, $channels, $options);
});

it('can send notification to multiple recipients', function (): void {
    $recipients = [
        actionsNotificationManagerRecipient(),
        actionsNotificationManagerRecipient(),
    ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    $templateCode = 'test_template';
    $data = ['key' => 'value'];
    $channels = ['email'];
    $options = ['priority' => 'high'];

<<<<<<< HEAD
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->times(2);

    app()->instance(SendNotificationAction::class, $action);

    $result = $notificationManager->sendMultiple($recipients, $templateCode, $data, $channels, $options);
=======
    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    $action->shouldReceive('handle')->times(2);

    $this->instance(SendNotificationAction::class, $action);

    $result = $this->notificationManager->sendMultiple($recipients, $templateCode, $data, $channels, $options);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    expect($result)->toHaveCount(2);
});

it('can get template by code', function (): void {
<<<<<<< HEAD
    $notificationManager = new NotificationManager;
    $code = 'test_template';

    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($code);
    mockExpectation($template, 'getAttribute')->with('is_active')->andReturn(true);

    $result = $notificationManager->getTemplate($code);
=======
    $code = 'test_template';

    $result = $this->notificationManager->getTemplate($code);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    expect($result)->toBeNull();
});

it('can get templates by category', function (): void {
<<<<<<< HEAD
    $notificationManager = new NotificationManager;
    $category = 'test_category';

    $result = $notificationManager->getTemplatesByCategory($category);
=======
    $category = 'test_category';

    $result = $this->notificationManager->getTemplatesByCategory($category);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    expect($result)->toHaveCount(0);
});

it('throws exception when template not found', function (): void {
<<<<<<< HEAD
    $notificationManager = new NotificationManager;
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'invalid_template';

    expect(fn () => $notificationManager->send($recipient, $templateCode))
=======
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'invalid_template';

    expect(fn () => $this->notificationManager->send($recipient, $templateCode))
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        ->toThrow(Exception::class, 'Template not found: invalid_template');
});

it('returns array from send method', function (): void {
<<<<<<< HEAD
    $notificationManager = new NotificationManager;
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'test_template';

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    app()->instance(SendNotificationAction::class, $action);

    $notificationManager->send($recipient, $templateCode);
});

it('returns array from send multiple method', function (): void {
    $notificationManager = new NotificationManager;
    $recipients = [actionsNotificationManagerRecipient()];
    $templateCode = 'test_template';

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    app()->instance(SendNotificationAction::class, $action);

    $result = $notificationManager->sendMultiple($recipients, $templateCode);
=======
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'test_template';

    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    $action->shouldReceive('handle')->once();

    $this->instance(SendNotificationAction::class, $action);

    $this->notificationManager->send($recipient, $templateCode);
});

it('returns array from send multiple method', function (): void {
    $recipients = [actionsNotificationManagerRecipient()];
    $templateCode = 'test_template';

    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    $action->shouldReceive('handle')->once();

    $this->instance(SendNotificationAction::class, $action);

    $result = $this->notificationManager->sendMultiple($recipients, $templateCode);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    expect($result)->toHaveCount(1);
});
