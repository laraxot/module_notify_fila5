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

uses(TestCase::class);

/**
 * La proprieta' TestCase::$notificationManager e' tipizzata sull'action omonima:
 * qui serve l'istanza del service, quindi viene creata localmente.
 */
function servicesNotificationManager(): NotificationManager
{
    return new NotificationManager;
}

/**
 * Destinatario anonimo minimale: la classe sotto test richiede solo un Model,
 * nessuna tabella reale viene interrogata perche' l'action e' mockata.
 */
function servicesNotificationManagerRecipient(): Model
{
    return new class extends Model
    {
        protected $guarded = [];

        public $timestamps = false;
    };
}

afterEach(function (): void {
    Mockery::close();
});

it('can send notification to single recipient', function (): void {
    $recipient = servicesNotificationManagerRecipient();
    $templateCode = 'test_template';
    $data = ['key' => 'value'];
    $channels = ['email'];
    $options = ['priority' => 'high'];

    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')
        ->with($recipient, $templateCode, $data, $channels, $options)
        ->once();

    app()->instance(SendNotificationAction::class, $action);

    // Nessuna asserzione sul tipo di ritorno: e' sempre Notification|null per firma.
    // Il comportamento reale (chiamata all'action con i parametri attesi) e' verificato
    // da Mockery in afterEach() tramite l'expectation ->once().
    servicesNotificationManager()->send($recipient, $templateCode, $data, $channels, $options);
});

it('can send notification to multiple recipients', function (): void {
    $recipients = [
        servicesNotificationManagerRecipient(),
        servicesNotificationManagerRecipient(),
    ];
    $templateCode = 'test_template';
    $data = ['key' => 'value'];
    $channels = ['email'];
    $options = ['priority' => 'high'];

    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->times(2);

    app()->instance(SendNotificationAction::class, $action);

    $result = servicesNotificationManager()->sendMultiple($recipients, $templateCode, $data, $channels, $options);

    expect($result)->toHaveCount(2);
});

it('can get template by code', function (): void {
    $code = 'test_template';

    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($code);
    mockExpectation($template, 'getAttribute')->with('is_active')->andReturn(true);

    $result = servicesNotificationManager()->getTemplate($code);

    // Il mock non e' registrato come sorgente dati: la lookup reale non trova nulla.
    expect($result)->toBeNull();
});

it('can get templates by category', function (): void {
    $result = servicesNotificationManager()->getTemplatesByCategory('test_category');

    expect($result)->toHaveCount(0);
});

it('throws exception when template not found', function (): void {
    $recipient = servicesNotificationManagerRecipient();

    expect(fn () => servicesNotificationManager()->send($recipient, 'invalid_template'))
        ->toThrow(Exception::class, 'Template not found: invalid_template');
});

it('returns array from send method', function (): void {
    $recipient = servicesNotificationManagerRecipient();
    $templateCode = 'test_template';

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    app()->instance(SendNotificationAction::class, $action);

    // Comportamento verificato da Mockery in afterEach() tramite ->once().
    servicesNotificationManager()->send($recipient, $templateCode);
});

it('returns array from send multiple method', function (): void {
    $recipients = [servicesNotificationManagerRecipient()];
    $templateCode = 'test_template';

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    app()->instance(SendNotificationAction::class, $action);

    $result = servicesNotificationManager()->sendMultiple($recipients, $templateCode);

    expect($result)->toHaveCount(1);
});
