<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Notifications\Channels;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 929ed821d (.)
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Modules\Notify\Actions\NetfunSendAction;
use Modules\Notify\Contracts\CanThemeNotificationContract;
<<<<<<< HEAD
use Modules\Notify\Datas\SmsData;
use Modules\Notify\Tests\Fixtures\NetfunChannelNotifiableDummy;
=======
use Modules\Notify\Datas\NotificationData;
use Modules\Notify\Datas\SmsData;
>>>>>>> 929ed821d (.)
use Modules\Notify\Notifications\Channels\NetfunChannel;
use Modules\Notify\Notifications\Channels\TelegramChannel;
use Modules\Notify\Notifications\ThemeNotification;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);

function makeNetfunChannelNotifiableDummy(): CanThemeNotificationContract
{
    return new class extends Model implements CanThemeNotificationContract
    {
        protected $guarded = [];

        public array $increased = [];

        public function getNotificationData(string $name, array $view_params = []): NotificationData
        {
            return NotificationData::from([
                'from' => 'Xot',
                'recipient' => 'dummy@example.test',
                'body' => 'body',
                'channels' => ['sms'],
            ]);
        }

        public function getModel(): Model
        {
            return $this;
        }

        public function sendEmailCallback() {}

        public function sendSmsCallback() {}

        public function increase(string $what, array $data): void
        {
            $this->increased[$what] = $data;
        }
    };
}
>>>>>>> 929ed821d (.)

function makeThemeNotificationDummy(): ThemeNotification
{
    return new class('name', []) extends ThemeNotification
    {
        public function toSms(CanThemeNotificationContract $notifiable): SmsData
        {
            return SmsData::from([
                'from' => 'Xot',
                'recipient' => '+391234567890',
                'body' => 'Body',
            ]);
        }
    };
}

function makeTelegramNotificationDummy(): Notification
{
    return new class extends Notification
    {
<<<<<<< HEAD
        /** @return array{text: string} */
=======
>>>>>>> 929ed821d (.)
        public function toTelegram(object $notifiable): array
        {
            return ['text' => 'hello'];
        }
    };
}

function makeTelegramNotifiableDummy(): object
{
    return new class
    {
        public function routeNotificationForTelegram(): string
        {
            return 'chat-123';
        }
    };
}

test('netfun notifications channel sends and increases counter', function () {
    app()->instance(NetfunSendAction::class, new class extends NetfunSendAction
    {
        public function __construct() {}

<<<<<<< HEAD
        /** @return array{status_code: int, status_txt: string} */
=======
>>>>>>> 929ed821d (.)
        public function execute(SmsData $smsData): array
        {
            return ['status_code' => 200, 'status_txt' => 'ok'];
        }
    });

    $channel = new NetfunChannel;
<<<<<<< HEAD
    $notifiable = new NetfunChannelNotifiableDummy;
=======
    $notifiable = makeNetfunChannelNotifiableDummy();
>>>>>>> 929ed821d (.)
    $notification = makeThemeNotificationDummy();

    $channel->send($notifiable, $notification);

<<<<<<< HEAD
    Assert::assertArrayHasKey('sms', $notifiable->increased);
    Assert::assertSame(200, \notifyArrayGet($notifiable->increased, 'sms', 'status_code'));
=======
    expect($notifiable->increased)->toHaveKey('sms')
        ->and($notifiable->increased['sms']['status_code'])->toBe(200);
>>>>>>> 929ed821d (.)
});

test('telegram notifications channel logs when recipient and method are valid', function () {
    Log::shouldReceive('info')->once();

    $channel = new TelegramChannel;
    $channel->send(makeTelegramNotifiableDummy(), makeTelegramNotificationDummy());
<<<<<<< HEAD
=======

    expect(true)->toBeTrue();
>>>>>>> 929ed821d (.)
});

test('telegram notifications channel throws when notification has no toTelegram method', function () {
    $channel = new TelegramChannel;

<<<<<<< HEAD
    \assertNotifyThrows(
        fn () => $channel->send(makeTelegramNotifiableDummy(), new class extends Notification {}),
        \Exception::class,
    );
});
=======
    $channel->send(makeTelegramNotifiableDummy(), new class extends Notification {});
})->throws(\Exception::class);
>>>>>>> 929ed821d (.)
