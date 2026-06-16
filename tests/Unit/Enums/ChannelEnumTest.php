<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Enums;

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Actions\SMS\NormalizePhoneNumberAction;
use Modules\Notify\Channels\SmsChannel;
use Modules\Notify\Channels\WhatsAppChannel;
use Modules\Notify\Enums\ChannelEnum;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

use function Safe\preg_replace;

uses(\Modules\Notify\Tests\TestCase::class);

test('notification channel mapping is correct', function () {
    Assert::assertSame('mail', ChannelEnum::Mail->getNotificationChannel());
    Assert::assertSame(SmsChannel::class, ChannelEnum::Sms->getNotificationChannel());
    Assert::assertSame(WhatsAppChannel::class, ChannelEnum::WhatsApp->getNotificationChannel());
=======

uses(TestCase::class);

test('notification channel mapping is correct', function () {
    expect(ChannelEnum::Mail->getNotificationChannel())->toBe('mail')
        ->and(ChannelEnum::Sms->getNotificationChannel())->toBe(SmsChannel::class)
        ->and(ChannelEnum::WhatsApp->getNotificationChannel())->toBe(WhatsAppChannel::class);
>>>>>>> 929ed821d (.)
});

test('mail recipient is resolved only for valid email', function () {
    app()->instance(SafeEloquentCastAction::class, new class
    {
        public function getStringAttribute(Model $record, string $attribute, string $default = ''): string
        {
            $value = $record->getAttribute($attribute);

            return is_string($value) ? $value : $default;
        }
    });

    $valid = new class extends Model
    {
        protected $guarded = [];
    };
    $valid->setAttribute('email', 'notify@example.test');

    $invalid = new class extends Model
    {
        protected $guarded = [];
    };
    $invalid->setAttribute('email', 'not-an-email');

<<<<<<< HEAD
    Assert::assertSame('notify@example.test', ChannelEnum::Mail->getRecipient($valid));
    Assert::assertNull(ChannelEnum::Mail->getRecipient($invalid));
=======
    expect(ChannelEnum::Mail->getRecipient($valid))->toBe('notify@example.test')
        ->and(ChannelEnum::Mail->getRecipient($invalid))->toBeNull();
>>>>>>> 929ed821d (.)
});

test('sms and whatsapp recipients are normalized', function () {
    app()->instance(SafeEloquentCastAction::class, new class
    {
        public function getStringAttribute(Model $record, string $attribute, string $default = ''): string
        {
            $value = $record->getAttribute($attribute);

            return is_string($value) ? $value : $default;
        }
    });

    app()->instance(NormalizePhoneNumberAction::class, new class
    {
        public function execute(string $phone): string
        {
            return '+39'.preg_replace('/\D+/', '', $phone);
        }
    });

    $record = new class extends Model
    {
        protected $guarded = [];
    };
    $record->setAttribute('phone', ' 333-12-34-567 ');
    $record->setAttribute('whatsapp', ' 388 99 77 66 ');

<<<<<<< HEAD
    Assert::assertSame('+393331234567', ChannelEnum::Sms->getRecipient($record));
    Assert::assertSame('+39388997766', ChannelEnum::WhatsApp->getRecipient($record));
=======
    expect(ChannelEnum::Sms->getRecipient($record))->toBe('+393331234567')
        ->and(ChannelEnum::WhatsApp->getRecipient($record))->toBe('+39388997766');
>>>>>>> 929ed821d (.)
});
