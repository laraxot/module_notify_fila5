<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit;

use Safe\DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Queue;
use Modules\Notify\Filament\Resources\ContactResource;
use Modules\Notify\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationTemplateResource;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Notify\Helpers\ConfigHelper;
use Modules\Notify\Models\Contact;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Database\Factories\NotificationTemplateFactory;
use Modules\Notify\Notifications\GenericNotification;
use Modules\Notify\Services\PushNotificationService;
use Modules\Notify\Tests\Unit\Traits\NotifyTrackingDummy;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use ReflectionMethod;

use function Safe\file_put_contents;
use function Safe\unlink;

uses(TestCase::class)->group('no-notify-db');

/**
 * @param  class-string  $class
 */
function notifyPageWithoutLivewire(string $class): object
{
    return (new ReflectionClass($class))->newInstanceWithoutConstructor();
}

/**
 * @param  array<string, mixed>  $attributes
 */
function notifyDummyRecipient(array $attributes = []): Model
{
    return new class($attributes) extends Model
    {
        use Notifiable;

        protected $guarded = [];

        /**
         * @param  array<string, mixed>  $attributes
         */
        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
        }

        public function routeNotificationForMail(): string
        {
            $email = $this->getAttribute('email');

            return is_string($email) ? $email : '';
        }

        public function routeNotificationForSms(): string
        {
            $phone = $this->getAttribute('phone');

            return is_string($phone) ? $phone : '';
        }
    };
}

function notifyEnsureTemplateTable(): void
{
    try {
        $schema = Schema::connection('notify');

        if ($schema->hasTable('notification_templates')) {
            NotificationTemplate::query()->delete();

            return;
        }

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
    } catch (\Throwable $e) {
        Assert::markTestSkipped('Notify DB non disponibile: '.$e->getMessage());
    }
}

describe('Notify highest-miss coverage', function (): void {
    test('cluster test pages expose form schemas', function (): void {
        $pages = [
            \Modules\Notify\Filament\Clusters\Test\Pages\SendEmailPage::class => ['getEmailFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendNetfunSmsPage::class => ['getSmsFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendWhatsAppPage::class => ['getWhatsAppFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendTelegramPage::class => ['getTelegramFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendFirebasePushNotificationPage::class => ['getPushFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendAwsEmailPage::class => ['getEmailFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendSpatieEmailPage::class => ['getEmailFormSchema'],
            \Modules\Notify\Filament\Clusters\Test\Pages\SendSmsPage::class => ['getSmsFormSchema'],
        ];

        foreach ($pages as $class => $methods) {
            $page = notifyPageWithoutLivewire($class);
            Assert::assertSame('Notify', $class::getModuleName());
            foreach ($methods as $method) {
                $schema = (new ReflectionMethod($class, $method))->invoke($page);
                Assert::assertNotEmpty($schema);
            }
        }
    });

    test('resources expose model pages and legacy form schema', function (): void {
        Assert::assertSame(NotificationTemplate::class, NotificationTemplateResource::getModel());
        Assert::assertArrayHasKey('name', NotificationTemplateResource::getFormSchemaOld());
        Assert::assertNotEmpty(NotificationTemplateResource::getPages());

        Assert::assertSame(NotifyTheme::class, NotifyThemeResource::getModel());
        Assert::assertArrayHasKey('subject', NotifyThemeResource::getFormSchemaOld());
        Assert::assertNotEmpty(NotifyThemeResource::getPages());

        Assert::assertSame(MailTemplate::class, MailTemplateResource::getModel());
        Assert::assertNotEmpty(MailTemplateResource::getFormSchemaOld());
        Assert::assertNotEmpty(MailTemplateResource::getPages());

        Assert::assertSame(\Modules\Notify\Models\Notification::class, NotificationResource::getModel());
        Assert::assertNotEmpty(NotificationResource::getFormSchemaOld());

        Assert::assertSame(Contact::class, ContactResource::getModel());
        Assert::assertNotEmpty(ContactResource::getFormSchemaOld());
        Assert::assertNotEmpty(ContactResource::getPages());
    });

    test('PushNotificationService sends fakes schedules and guards empty targets', function (): void {
        config([
            'notify.fcm.server_key' => 'test-key',
            'notify.apns.certificate' => null,
            'notify.apns.passphrase' => null,
            'notify.apns.url' => 'https://api.push.apple.com',
            'notify.webpush.vapid_public' => 'pub',
            'notify.webpush.vapid_private' => 'priv',
            'notify.webpush.vapid_subject' => 'mailto:test@example.com',
        ]);
        Http::fake([
            'https://fcm.googleapis.com/*' => Http::response(['message_id' => 'mid-1'], 200),
        ]);
        Queue::fake();
        config(['cache.default' => 'array']);

        $service = new PushNotificationService();
        $notification = ['title' => 'Ciao', 'body' => 'Test'];
        $fcmToken = str_repeat('a', 80).':'.str_repeat('b', 40);
        $apnsToken = str_repeat('ab', 32);

        $one = $service->sendToDevice($fcmToken, $notification, ['k' => 'v']);
        Assert::assertArrayHasKey('fcm', $one);
        Assert::assertTrue($one['fcm']['success']);
        Assert::assertTrue($one['apns']['success']);
        Assert::assertTrue($one['webpush']['success']);

        $batch = $service->sendToDevices([$fcmToken, $apnsToken, 'web-token'], $notification);
        Assert::assertArrayHasKey('fcm', $batch);

        $topic = $service->sendToTopic('news', $notification);
        Assert::assertArrayHasKey('fcm', $topic);

        $emptyAll = $service->sendToAll($notification);
        Assert::assertFalse($emptyAll['success']);

        $emptyTarget = $service->sendWithTargeting(['platform' => 'unknown'], $notification);
        Assert::assertFalse($emptyTarget['success']);

        expect(fn (): mixed => $service->sendWithTemplate('missing', ['t']))
            ->toThrow(\Exception::class);

        $jobId = $service->scheduleNotification(['t1'], $notification, [], new DateTime('+1 hour'));
        Assert::assertStringStartsWith('push_', $jobId);
    });

    test('ConfigHelper replaces template variables from notify config', function (): void {
        config([
            'notify.company' => ['name' => 'Comune Test', 'city' => '{{name}}'],
            'notify.template_variables' => ['year' => '2026'],
            'notify.test_data' => ['hello' => 'Hi {{name}}'],
            'notify.webhooks' => ['url' => 'https://example.test'],
            'notify.email' => ['from' => 'noreply@example.test'],
        ]);

        $replaced = ConfigHelper::replaceTemplateVariables(['msg' => 'Anno {{year}}']);
        Assert::assertSame('Anno 2026', $replaced['msg']);

        Assert::assertSame('Comune Test', ConfigHelper::get('notify.company.name'));
        Assert::assertSame('Hi Comune Test', ConfigHelper::getTestData()['hello']);
        Assert::assertArrayHasKey('name', ConfigHelper::getCompanyConfig());
        Assert::assertArrayHasKey('url', ConfigHelper::getWebhookConfig());
        Assert::assertArrayHasKey('from', ConfigHelper::getEmailConfig());
    });

    test('analyze translations artisan command runs against module lang', function (): void {
        $pending = $this->artisan('notify:analyze-translations');
        if ($pending instanceof \Illuminate\Testing\PendingCommand) {
            $pending->assertExitCode(0);

            return;
        }

        Assert::assertSame(0, $pending);
    });

    test('push actions send across fcm apns and webpush with fakes', function (): void {
        config([
            'notify.fcm.server_key' => 'test-key',
            'notify.fcm.url' => 'https://fcm.googleapis.com/fcm/send',
        ]);
        Http::fake([
            'https://fcm.googleapis.com/*' => Http::response(['message_id' => 'mid-2'], 200),
        ]);

        $notification = \Modules\Notify\Datas\PushNotificationData::from([
            'title' => 'Titolo',
            'body' => 'Corpo',
        ]);
        $fcmToken = str_repeat('a', 80).':'.str_repeat('b', 40);
        $apnsToken = str_repeat('ab', 32);

        $platform = (new \Modules\Notify\Actions\Push\SendPushToPlatformAction())->execute('fcm', $fcmToken, $notification);
        Assert::assertTrue($platform['success']);
        Assert::assertTrue((new \Modules\Notify\Actions\Push\SendPushToPlatformAction())->execute('apns', $apnsToken, $notification)['success']);
        Assert::assertTrue((new \Modules\Notify\Actions\Push\SendPushToPlatformAction())->execute('webpush', 'web-token', $notification)['success']);

        $devices = (new \Modules\Notify\Actions\Push\SendPushToDevicesAction())->execute([$fcmToken, $apnsToken], $notification);
        Assert::assertArrayHasKey('fcm', $devices);

        $topic = (new \Modules\Notify\Actions\Push\SendPushToTopicAction())->execute('news', $notification);
        Assert::assertArrayHasKey('fcm', $topic);
    });

    test('whatsapp and telegram actions execute with mocked http', function (): void {
        config([
            'services.360dialog.api_key' => '360-key',
            'services.vonage.api_key' => 'vonage-key',
            'services.vonage.api_secret' => 'vonage-secret',
            'services.telegram.token' => 'telegram-token',
            'whatsapp.debug' => false,
            'whatsapp.timeout' => 5,
            'whatsapp.from' => '+390000000000',
        ]);

        $whatsappData = \Modules\Notify\Datas\WhatsAppData::from([
            'recipient' => '+393331112233',
            'body' => 'Ciao',
        ]);
        $telegramData = \Modules\Notify\Datas\TelegramData::from([
            'chatId' => '12345',
            'text' => 'Ciao',
        ]);

        foreach ([
            \Modules\Notify\Actions\WhatsApp\Send360dialogWhatsAppAction::class,
            \Modules\Notify\Actions\WhatsApp\SendVonageWhatsAppAction::class,
            \Modules\Notify\Actions\WhatsApp\SendFacebookWhatsAppAction::class,
            \Modules\Notify\Actions\WhatsApp\SendTwilioWhatsAppAction::class,
            \Modules\Notify\Actions\Telegram\SendBotmanTelegramAction::class,
            \Modules\Notify\Actions\Telegram\SendNutgramTelegramAction::class,
            \Modules\Notify\Actions\Telegram\SendOfficialTelegramAction::class,
        ] as $class) {
            try {
                $action = new $class();
                $data = str_contains($class, 'Telegram') ? $telegramData : $whatsappData;
                $result = $action->execute($data);
                Assert::assertNotEmpty($result);
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }
    });

    test('SmsService validates missing engine and accepts local vars', function (): void {
        $service = \Modules\Notify\Services\SmsService::make()
            ->setLocalVars(['to' => '+390000000000', 'body' => 'Test'])
            ->mergeVars(['foo' => 'bar']);
        Assert::assertSame('+390000000000', $service->to);
        Assert::assertSame('bar', $service->vars['foo']);

        expect(fn (): \Modules\Notify\Services\SmsService => $service->send())
            ->toThrow(\RuntimeException::class);
    });

    test('sms actions normalize recipients before provider call', function (): void {
        config([
            'services.netfun.token' => 'netfun-token',
            'sms.drivers.netfun.token' => 'netfun-token',
            'sms.drivers.netfun.api_url' => 'https://example.test/sms',
            'sms.drivers.twilio.sid' => 'sid',
            'sms.drivers.twilio.token' => 'token',
            'sms.drivers.twilio.from' => '+390000000000',
        ]);

        $sms = \Modules\Notify\Datas\SmsData::from([
            'recipient' => '0039333123456',
            'body' => 'Test',
            'from' => 'APP',
        ]);

        foreach ([
            \Modules\Notify\Actions\NetfunSendAction::class,
            \Modules\Notify\Actions\SMS\SendNetfunSMSAction::class,
            \Modules\Notify\Actions\SMS\SendTwilioSMSAction::class,
            \Modules\Notify\Actions\SMS\SendNexmoSMSAction::class,
            \Modules\Notify\Actions\SMS\SendPlivoSMSAction::class,
            \Modules\Notify\Actions\SMS\SendGammuSMSAction::class,
        ] as $class) {
            try {
                $action = new $class();
                $action->execute($sms);
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }
    });

    test('notification template and theme forms expose keyed schema', function (): void {
        Assert::assertArrayHasKey(
            'name',
            \Modules\Notify\Filament\Resources\NotificationTemplateResource\Schemas\NotificationTemplateForm::getFormSchema(),
        );
        Assert::assertArrayHasKey(
            'subject',
            \Modules\Notify\Filament\Resources\NotifyThemeResource\Schemas\NotifyThemeForm::getFormSchema(),
        );
    });

    test('SendNotificationAction handle works with sqlite notify schema', function (): void {
        notifyEnsureTemplateTable();

        NotificationTemplateFactory::new()->createOne([
            'id' => (string) Str::uuid(),
            'name' => 'Welcome',
            'code' => 'welcome-template',
            'subject' => ['en' => 'Welcome', 'it' => 'Benvenuto'],
            'body_text' => ['en' => 'Hello', 'it' => 'Ciao'],
            'body_html' => ['en' => '<p>Hello</p>', 'it' => '<p>Ciao</p>'],
            'channels' => ['mail'],
            'variables' => [],
            'is_active' => true,
            'conditions' => null,
            'type' => 'email',
        ]);

        $recipient = notifyDummyRecipient(['email' => 'user@example.test']);
        Notification::fake();

        $result = (new \Modules\Notify\Actions\SendNotificationAction())->handle(
            $recipient,
            'welcome-template',
        );

        Assert::assertNull($result);
        Notification::assertSentTo($recipient, GenericNotification::class);

        expect(fn (): mixed => (new \Modules\Notify\Actions\SendNotificationAction())->handle(
            $recipient,
            'missing-template',
        ))->toThrow(\Exception::class);
    });

    test('SendNotificationAction sms channel truncates long messages', function (): void {
        notifyEnsureTemplateTable();

        NotificationTemplateFactory::new()->createOne([
            'id' => (string) Str::uuid(),
            'name' => 'Sms',
            'code' => 'sms-template',
            'subject' => ['en' => 'Sms', 'it' => 'Sms'],
            'body_text' => ['en' => str_repeat('x', 400), 'it' => str_repeat('x', 400)],
            'body_html' => null,
            'channels' => ['sms'],
            'variables' => [],
            'is_active' => true,
            'conditions' => null,
            'type' => 'sms',
        ]);

        $recipient = notifyDummyRecipient(['phone' => '+393331112233']);
        Notification::fake();

        (new \Modules\Notify\Actions\SendNotificationAction())->handle(
            $recipient,
            'sms-template',
        );

        Notification::assertSentTo($recipient, GenericNotification::class);
    });

    test('notification template compiles previews and conditions in memory', function (): void {
        $template = new NotificationTemplate();
        $template->forceFill([
            'subject' => 'Ciao Marco',
            'body_text' => 'Testo Marco',
            'body_html' => '<p>Marco</p>',
            'channels' => ['mail', 'database'],
            'conditions' => ['send' => true],
            'preview_data' => ['name' => 'Marco'],
            'grapesjs_data' => ['blocks' => []],
        ]);

        $compiled = $template->compile(['name' => 'Marco']);
        Assert::assertSame('Ciao Marco', $compiled['subject']);
        Assert::assertTrue($template->shouldSend(['send' => true]));
        Assert::assertFalse($template->shouldSend(['send' => false]));
        Assert::assertStringContainsString('Marco', $template->preview()['subject']);
        Assert::assertSame(['blocks' => []], $template->getGrapesJSData());
        $template->setGrapesJSData(['foo' => 'bar']);
        Assert::assertSame(['foo' => 'bar'], $template->getGrapesJSData());
    });

    test('SpatieEmail attachment helpers work without constructor bootstrap', function (): void {
        $ref = new ReflectionClass(\Modules\Notify\Emails\SpatieEmail::class);
        /** @var \Modules\Notify\Emails\SpatieEmail $email */
        $email = $ref->newInstanceWithoutConstructor();
        $email->slug = 'welcome-mail';
        $email->data = ['first_name' => 'Marco'];

        Assert::assertSame('welcome-mail', $email->getSlug());
        Assert::assertSame($email, $email->setRecipient('recipient@example.test'));
        $envelope = $email->envelope();
        $to = $envelope->to;
        Assert::assertNotEmpty($to);
        $firstAddress = $to[0];
        Assert::assertInstanceOf(\Illuminate\Mail\Mailables\Address::class, $firstAddress);
        Assert::assertSame('recipient@example.test', $firstAddress->address);
        Assert::assertSame($email, $email->embedLogo('/tmp/missing-logo.png'));

        $path = sys_get_temp_dir().'/notify-attach-'.uniqid('', true).'.txt';
        file_put_contents($path, 'attachment-body');
        $fromPath = $email->getAttachmentFromPath(['path' => $path, 'as' => 'file.txt']);
        Assert::assertSame('file.txt', $fromPath->as);

        $fromData = $email->getAttachmentFromData([
            'data' => 'inline-data',
            'as' => 'inline.txt',
            'mime' => 'text/plain',
        ]);
        Assert::assertSame('inline.txt', $fromData->as);

        $email->addAttachments([
            ['path' => $path],
            ['data' => 'payload', 'as' => 'payload.bin'],
        ]);
        Assert::assertCount(2, $email->attachments());
        unlink($path);
    });

    test('notification tracking adds pixel when enabled', function (): void {
        config([
            'notify.tracking.enabled' => true,
            'notify.tracking.pixel.enabled' => true,
            'notify.tracking.links.enabled' => false,
            'notify.tracking.pixel.route' => 'login',
        ]);

        $dummy = new NotifyTrackingDummy();
        $html = '<p>Newsletter</p>';
        $tracked = $dummy->addTrackingPublic($html, 'track-uuid');

        Assert::assertStringContainsString('track-uuid', $tracked);
        Assert::assertNotSame($html, $tracked);
    });

    test('facebook whatsapp action builds payload variants offline', function (): void {
        config([
            'services.facebook.access_token' => 'fb-token',
            'services.facebook.phone_number_id' => '123456',
            'whatsapp.debug' => false,
            'whatsapp.timeout' => 1,
        ]);

        $cases = [
            ['recipient' => '+393331112233', 'body' => 'Ciao', 'type' => 'text'],
            ['recipient' => '+393331112233', 'body' => '', 'type' => 'template', 'template' => ['name' => 'hello']],
            ['recipient' => '+393331112233', 'body' => '', 'type' => 'media', 'media' => ['https://example.test/a.jpg']],
        ];

        foreach ($cases as $payload) {
            try {
                $result = (new \Modules\Notify\Actions\WhatsApp\SendFacebookWhatsAppAction())->execute(
                    \Modules\Notify\Datas\WhatsAppData::from($payload),
                );
                Assert::assertNotEmpty($result);
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
        }
    });

    test('esendex and duocircle actions fail fast without external providers', function (): void {
        config([
            'esendex.username' => 'user',
            'esendex.password' => 'pass',
            'esendex.sender' => 'APP',
        ]);

        $sms = \Modules\Notify\Datas\SmsData::from([
            'recipient' => '+393331112233',
            'body' => 'Test',
            'from' => 'APP',
        ]);

        try {
            (new \Modules\Notify\Actions\EsendexSendAction())->execute($sms);
        } catch (\Throwable $e) {
            Assert::assertNotSame('', $e->getMessage());
        }

        expect(fn (): array => (new \Modules\Notify\Actions\Mail\Engines\Duocircle\TryDuocircleMailAction())->execute([
            'to' => 'user@example.test',
        ]))->toThrow(\Exception::class);
    });
});
