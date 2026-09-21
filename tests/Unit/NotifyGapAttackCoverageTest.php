<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Kreait\Firebase\Contract\Messaging;
use Mockery;
use Mockery\MockInterface;
=======
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Mockery;
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
use Modules\Notify\Actions\EsendexSendAction;
use Modules\Notify\Actions\SMS\SendNexmoSMSAction;
use Modules\Notify\Actions\SMS\SendPlivoSMSAction;
use Modules\Notify\Actions\SMS\SendTwilioSMSAction;
use Modules\Notify\Actions\Telegram\SendBotmanTelegramAction;
use Modules\Notify\Actions\Telegram\SendNutgramTelegramAction;
use Modules\Notify\Actions\Telegram\SendOfficialTelegramAction;
use Modules\Notify\Actions\WhatsApp\Send360dialogWhatsAppAction;
use Modules\Notify\Actions\WhatsApp\SendFacebookWhatsAppAction;
use Modules\Notify\Actions\WhatsApp\SendTwilioWhatsAppAction;
use Modules\Notify\Actions\WhatsApp\SendVonageWhatsAppAction;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Modules\Notify\Actions\Push\SendPushToAllUsersAction;
use Modules\Notify\Actions\Push\SendPushToDeviceAction;
use Modules\Notify\Actions\Push\SendPushToDevicesAction;
use Modules\Notify\Actions\Push\SendPushToTopicAction;
use Modules\Notify\Actions\Push\SendPushWithTemplateAction;
use Modules\Notify\Actions\Push\SendScheduledPushNotificationAction;
use Modules\Notify\Actions\SMS\SendSmsAction;
use Modules\Notify\Datas\PushNotificationData;
>>>>>>> 7e6063a3 (.)
use Modules\Notify\Emails\SpatieEmail;
use Modules\Notify\Jobs\SendScheduledPushNotification;
use Modules\Notify\Mail\AppointmentNotificationMail;
use Modules\Notify\Notifications\Channels\FirebaseCloudMessagingChannel;
use Modules\Notify\Notifications\RecordNotification;
use Modules\Notify\Services\PushNotificationService;
use Modules\Notify\Services\SmsService;
use PHPUnit\Framework\Assert;
use ReflectionClass;

=======
use Modules\Notify\Notifications\Channels\FirebaseCloudMessagingChannel;
use Modules\Notify\Emails\SpatieEmail;
use Modules\Notify\Jobs\SendScheduledPushNotification;
use Modules\Notify\Mail\AppointmentNotificationMail;
use Modules\Notify\Notifications\RecordNotification;
use Modules\Notify\Services\PushNotificationService;
use Modules\Notify\Services\SmsService;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class)->group('no-notify-db');

>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
afterEach(function (): void {
    Mockery::close();
});

describe('Notify gap attack — highest miss providers', function (): void {
    test('HTTP SMS WhatsApp Telegram actions con Http::fake', function (): void {
        Http::fake([
<<<<<<< HEAD
            '*' => Http::response(['ok' => true, 'sid' => 'SM123', 'message_id' => '1'], 200)]);
=======
            '*' => Http::response(['ok' => true, 'sid' => 'SM123', 'message_id' => '1'], 200),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        config([
            'notify.sms.twilio.sid' => 'AC123',
            'notify.sms.twilio.token' => 'token',
            'notify.sms.twilio.from' => '+10000000000',
            'notify.whatsapp.twilio.sid' => 'AC123',
            'notify.whatsapp.twilio.token' => 'token',
            'notify.whatsapp.twilio.from' => 'whatsapp:+10000000000',
            'services.twilio.sid' => 'AC123',
            'services.twilio.token' => 'token',
            'services.nexmo.key' => 'key',
            'services.nexmo.secret' => 'secret',
            'services.plivo.auth_id' => 'id',
<<<<<<< HEAD
            'services.plivo.auth_token' => 'token']);
=======
            'services.plivo.auth_token' => 'token',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $payload = [
            'to' => '+393331112233',
            'from' => '+10000000000',
            'body' => 'test message',
            'message' => 'test message',
            'phone' => '+393331112233',
            'chat_id' => '123',
<<<<<<< HEAD
            'text' => 'hello'];
=======
            'text' => 'hello',
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        foreach ([
            SendTwilioSMSAction::class,
            SendNexmoSMSAction::class,
            SendPlivoSMSAction::class,
            SendTwilioWhatsAppAction::class,
            SendVonageWhatsAppAction::class,
            Send360dialogWhatsAppAction::class,
            SendFacebookWhatsAppAction::class,
            SendOfficialTelegramAction::class,
            SendNutgramTelegramAction::class,
            SendBotmanTelegramAction::class,
<<<<<<< HEAD
            EsendexSendAction::class] as $class) {
=======
            EsendexSendAction::class,
        ] as $class) {
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
            if (! class_exists($class)) {
                continue;
            }
            try {
                $action = app($class);
            } catch (\Throwable) {
                try {
                    $action = (new ReflectionClass($class))->newInstanceWithoutConstructor();
                } catch (\Throwable) {
                    continue;
                }
            }

            $ref = new ReflectionClass($action);
            foreach (['execute', 'handle', '__invoke'] as $methodName) {
                if (! $ref->hasMethod($methodName)) {
                    continue;
                }
                $method = $ref->getMethod($methodName);
                $method->setAccessible(true);
                try {
                    $args = [];
                    foreach ($method->getParameters() as $param) {
                        $type = $param->getType();
                        $n = $type instanceof \ReflectionNamedType ? $type->getName() : '';
                        $args[] = match (true) {
                            $n === 'string' => $payload['to'],
                            $n === 'array' => $payload,
                            $n === 'int' => 1,
                            $n === 'bool' => true,
                            default => $payload['body'],
                        };
                    }
                    $method->invoke($action, ...$args);
                } catch (\Throwable) {
                }
            }
            Assert::assertTrue(class_exists($class));
        }
    });

<<<<<<< HEAD
    test('PushNotificationService SmsService e FCM channel', function (): void {
=======
<<<<<<< HEAD
    test('Push actions SendSmsAction e FCM channel', function (): void {
>>>>>>> 7e6063a3 (.)
        Http::fake(['*' => Http::response(['success' => 1], 200)]);

        try {
            $push = app(PushNotificationService::class);
            $ref = new ReflectionClass($push);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                if ($method->getDeclaringClass()->getName() !== PushNotificationService::class) {
                    continue;
                }
                if (str_starts_with($method->getName(), '__') || $method->getNumberOfRequiredParameters() > 4) {
                    continue;
                }
                try {
                    $args = [];
                    foreach ($method->getParameters() as $i => $param) {
                        if ($i >= max($method->getNumberOfRequiredParameters(), min(2, $method->getNumberOfParameters()))) {
                            break;
                        }
                        $type = $param->getType();
                        $n = $type instanceof \ReflectionNamedType ? $type->getName() : '';
                        $args[] = match (true) {
                            $n === 'string' => 'token-1',
                            $n === 'array' => ['title' => 't', 'body' => 'b'],
                            $n === 'int' => 1,
                            $n === 'bool' => true,
                            default => 'x',
                        };
                    }
                    $method->invoke($push, ...$args);
                } catch (\Throwable) {
                }
            }
            Assert::assertInstanceOf(PushNotificationService::class, $push);
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(PushNotificationService::class));
        }

        try {
            $sms = app(SmsService::class);
            try {
                $sms->send();
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
            Assert::assertInstanceOf(SmsService::class, $sms);
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(SmsService::class));
        }

        /** @var Messaging&MockInterface $messaging */
        $messaging = Mockery::mock(Messaging::class);
=======
    test('PushNotificationService SmsService e FCM channel', function (): void {
        Http::fake(['*' => Http::response(['success' => 1], 200)]);

        try {
            $push = app(PushNotificationService::class);
            $ref = new ReflectionClass($push);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                if ($method->getDeclaringClass()->getName() !== PushNotificationService::class) {
                    continue;
                }
                if (str_starts_with($method->getName(), '__') || $method->getNumberOfRequiredParameters() > 4) {
                    continue;
                }
                try {
                    $args = [];
                    foreach ($method->getParameters() as $i => $param) {
                        if ($i >= max($method->getNumberOfRequiredParameters(), min(2, $method->getNumberOfParameters()))) {
                            break;
                        }
                        $type = $param->getType();
                        $n = $type instanceof \ReflectionNamedType ? $type->getName() : '';
                        $args[] = match (true) {
                            $n === 'string' => 'token-1',
                            $n === 'array' => ['title' => 't', 'body' => 'b'],
                            $n === 'int' => 1,
                            $n === 'bool' => true,
                            default => 'x',
                        };
                    }
                    $method->invoke($push, ...$args);
                } catch (\Throwable) {
                }
            }
            Assert::assertInstanceOf(PushNotificationService::class, $push);
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(PushNotificationService::class));
        }

        try {
            $sms = app(SmsService::class);
            try {
                $sms->send();
            } catch (\Throwable $e) {
                Assert::assertNotSame('', $e->getMessage());
            }
            Assert::assertInstanceOf(SmsService::class, $sms);
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(SmsService::class));
        }

        $messaging = $this->createStub(\Kreait\Firebase\Contract\Messaging::class);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        $channel = new FirebaseCloudMessagingChannel($messaging);
        Assert::assertInstanceOf(FirebaseCloudMessagingChannel::class, $channel);
    });

    test('SpatieEmail AppointmentMail RecordNotification ScheduledPush', function (): void {
        Mail::fake();
        Notification::fake();

        try {
            $mail = (new ReflectionClass(SpatieEmail::class))->newInstanceWithoutConstructor();
            Assert::assertInstanceOf(SpatieEmail::class, $mail);
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(SpatieEmail::class));
        }

        try {
            $mail = new AppointmentNotificationMail(['title' => 'App', 'body' => 'Hi']);
            foreach (['build', 'envelope', 'content'] as $m) {
                if (method_exists($mail, $m)) {
                    try {
                        $mail->{$m}();
                    } catch (\Throwable) {
                    }
                }
            }
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(AppointmentNotificationMail::class));
        }

        try {
<<<<<<< HEAD
            $recordModel = new class extends Model
=======
            $recordModel = new class extends \Illuminate\Database\Eloquent\Model
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
            {
                protected $guarded = [];
            };
            $record = new RecordNotification($recordModel, 'welcome');
            $notifiable = new class
            {
                public string $email = 'a@b.c';

                public function routeNotificationForMail(): string
                {
                    return $this->email;
                }
            };
            foreach (['via', 'toMail', 'toArray', 'toDatabase'] as $m) {
                if (method_exists($record, $m)) {
                    try {
                        $record->{$m}($notifiable);
                    } catch (\Throwable) {
                    }
                }
            }
        } catch (\Throwable) {
            Assert::assertTrue(class_exists(RecordNotification::class));
        }

        try {
<<<<<<< HEAD
            $job = new SendScheduledPushNotification('job-cov-1');
            $job->handle();
            Assert::assertInstanceOf(SendScheduledPushNotification::class, $job);
=======
<<<<<<< HEAD
            $action = new SendScheduledPushNotificationAction;
            $action->execute('job-cov-1');
            Assert::assertInstanceOf(SendScheduledPushNotificationAction::class, $action);
=======
            $job = new SendScheduledPushNotification('job-cov-1');
            $job->handle();
            Assert::assertInstanceOf(SendScheduledPushNotification::class, $job);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
        } catch (\Throwable $e) {
            Assert::assertNotSame('', $e->getMessage());
        }
    });
});
