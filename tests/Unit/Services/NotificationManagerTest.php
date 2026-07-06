<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Notify\Database\Factories\NotificationTemplateFactory;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Services\NotificationManager;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
 * Destinatario minimale per i test di NotificationManager: un Model anonimo
 * Notifiable, non persistito, sufficiente per il canale 'database' che
 * salva la notifica senza passare da Illuminate\Support\Facades\Notification.
 *
 * @param array<string, mixed> $attributes
 */
function makeNotificationManagerTestRecipient(array $attributes = []): Model
{
    return new class($attributes) extends Model
    {
        use Notifiable;

        protected $guarded = [];

        /**
         * @param array<string, mixed> $attributes
         */
        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
        }

        public function routeNotificationForMail(): string
        {
            return (string) $this->getAttribute('email');
        }
    };
}

beforeEach(function (): void {
    /** @var TestCase $this */
    $schema = Schema::connection('notify');

    if (! $schema->hasTable('notification_templates')) {
        $schema->create('notification_templates', function (Blueprint $table): void {
            $table->string('id', 36)->primary();
            $table->string('name')->nullable();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->text('subject')->nullable();
            $table->longText('body_html')->nullable();
            $table->longText('body_text')->nullable();
            $table->json('channels')->nullable();
            $table->json('variables')->nullable();
            $table->json('conditions')->nullable();
            $table->json('preview_data')->nullable();
            $table->json('metadata')->nullable();
            $table->string('category')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('version')->default(1);
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    NotificationTemplate::query()->delete();
});

test('send throws when template is not found', function (): void {
    /** @var TestCase $this */
    $manager = new NotificationManager();
    $recipient = makeNotificationManagerTestRecipient(['email' => 'user@example.test']);

    $this->expectApplicationException(Exception::class, 'Template not found: missing-manager-template');

    $manager->send($recipient, 'missing-manager-template');
});

test('send returns a Notification when template is active on the database channel', function (): void {
    NotificationTemplateFactory::new()->createOne([
        'id' => (string) Str::uuid(),
        'code' => 'manager-send-template',
        'subject' => ['en' => 'Subject'],
        'body_text' => ['en' => 'Hello'],
        'body_html' => ['en' => '<p>Hello</p>'],
        'channels' => ['database'],
        'is_active' => true,
        'conditions' => null,
        'type' => 'email',
    ]);

    $manager = new NotificationManager();
    $recipient = makeNotificationManagerTestRecipient(['email' => 'user@example.test']);

    $result = $manager->send($recipient, 'manager-send-template');

    Assert::assertInstanceOf(Notification::class, $result);
});

test('sendMultiple throws when template is not found', function (): void {
    /** @var TestCase $this */
    $manager = new NotificationManager();
    $recipients = [makeNotificationManagerTestRecipient(['email' => 'user@example.test'])];

    $this->expectApplicationException(Exception::class, 'Template not found: missing-manager-template');

    $manager->sendMultiple($recipients, 'missing-manager-template');
});

test('sendMultiple sends a notification to every recipient', function (): void {
    NotificationTemplateFactory::new()->createOne([
        'id' => (string) Str::uuid(),
        'code' => 'manager-send-multiple-template',
        'subject' => ['en' => 'Subject'],
        'body_text' => ['en' => 'Hello'],
        'body_html' => ['en' => '<p>Hello</p>'],
        'channels' => ['database'],
        'is_active' => true,
        'conditions' => null,
        'type' => 'email',
    ]);

    $manager = new NotificationManager();
    $recipients = [
        makeNotificationManagerTestRecipient(['email' => 'user-one@example.test']),
        makeNotificationManagerTestRecipient(['email' => 'user-two@example.test']),
    ];

    $result = $manager->sendMultiple($recipients, 'manager-send-multiple-template');

    Assert::assertCount(2, $result);
    Assert::assertContainsOnlyInstancesOf(Notification::class, $result);
});

test('getTemplate returns null for an unknown code', function (): void {
    $manager = new NotificationManager();

    Assert::assertNull($manager->getTemplate('unknown-manager-template'));
});

test('getTemplate returns the model for an active code', function (): void {
    NotificationTemplateFactory::new()->createOne([
        'code' => 'manager-get-template',
        'is_active' => true,
    ]);

    $manager = new NotificationManager();
    $result = $manager->getTemplate('manager-get-template');

    Assert::assertInstanceOf(NotificationTemplate::class, $result);
    Assert::assertSame('manager-get-template', $result->code);
});

test('getTemplatesByCategory returns the matching collection', function (): void {
    NotificationTemplateFactory::new()->createOne([
        'code' => 'manager-category-template',
        'category' => 'manager-test-category',
        'is_active' => true,
    ]);

    $manager = new NotificationManager();
    $result = $manager->getTemplatesByCategory('manager-test-category');

    Assert::assertCount(1, $result);
    Assert::assertContainsOnlyInstancesOf(NotificationTemplate::class, $result);
});
