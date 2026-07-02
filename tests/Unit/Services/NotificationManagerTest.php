<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Mockery\MockInterface;
use Modules\Notify\Models\Notification;
use Modules\Notify\Services\NotificationManager;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Datas\XotData;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
 * @return Model&MockInterface
 */
function notifyRecipientMock(): Model
{
    $userClass = XotData::make()->getUserClass();
    /** @var Model&MockInterface $recipient */
    $recipient = Mockery::mock($userClass);

    return $recipient;
}

it('throws when template is missing on send', function (): void {
    $manager = new NotificationManager;
    $recipient = notifyRecipientMock();

    expect(fn (): ?Notification => $manager->send($recipient, 'invalid_template'))
        ->toThrow(Exception::class, 'Template not found: invalid_template');
});

it('returns null when template lookup fails', function (): void {
    $manager = new NotificationManager;
    $result = $manager->getTemplate('missing-template');

    expect($result)->toBeNull();
});

it('returns collection from getTemplatesByCategory', function (): void {
    $manager = new NotificationManager;
    $result = $manager->getTemplatesByCategory('test_category');

    expect($result)->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
});

it('returns list from sendMultiple with empty recipients', function (): void {
    $manager = new NotificationManager;
    $result = $manager->sendMultiple([], 'any-template');

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('exposes expected public methods', function (): void {
    $reflection = new \ReflectionClass(NotificationManager::class);

    expect($reflection->hasMethod('send'))->toBeTrue();
    expect($reflection->hasMethod('sendMultiple'))->toBeTrue();
    expect($reflection->hasMethod('getTemplate'))->toBeTrue();
    expect($reflection->hasMethod('getTemplatesByCategory'))->toBeTrue();
});

it('send return type is nullable notification', function (): void {
    $method = (new \ReflectionClass(NotificationManager::class))->getMethod('send');

    assertReflectionTypeName($method->getReturnType(), Notification::class);
    expect($method->getReturnType()?->allowsNull())->toBeTrue();
});

it('sendMultiple return type is array', function (): void {
    $method = (new \ReflectionClass(NotificationManager::class))->getMethod('sendMultiple');

    assertReflectionTypeName($method->getReturnType(), 'array');
});
