<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Unit\Actions;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Actions\SendRecordNotificationAction;
use Modules\Notify\Actions\SendRecordsNotificationAction;
use Tests\Modules\Notify\Fixtures\SendRecordNotificationFailStub;
use Tests\Modules\Notify\Fixtures\SendRecordNotificationNoopStub;
use Tests\Modules\Notify\Fixtures\SendRecordNotificationThrowStub;
use Tests\Modules\Notify\Fixtures\SendRecordsNotificationRecordDummy;
use Tests\Modules\Notify\Fixtures\SendRecordsSafeEloquentCastEmptyStub;
use Tests\Modules\Notify\Fixtures\SendRecordsSafeEloquentCastStub;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;
use PHPUnit\Framework\Assert;

/**
 * @param  array<string, mixed>  $attributes
 */
function makeDummyBulkNotifyRecord(array $attributes = []): Model
{
    return new SendRecordsNotificationRecordDummy($attributes);
}

test('send records notification action counts successful sends', function (): void {
    app()->instance(SafeEloquentCastAction::class, new SendRecordsSafeEloquentCastStub);
    app()->instance(SendRecordNotificationAction::class, new SendRecordNotificationNoopStub);

    $records = new EloquentCollection([
        makeDummyBulkNotifyRecord(['id' => 1, 'name' => 'Alpha']),
        makeDummyBulkNotifyRecord(['id' => 2, 'name' => 'Beta'])]);

    $result = app(SendRecordsNotificationAction::class)->execute(
        records: $records,
        templateSlug: 'welcome-template',
        channels: ['mail', 'sms'],
    );

    Assert::assertSame(4, $result->successCount);
    Assert::assertSame(0, $result->errorCount);
    Assert::assertSame(0, $result->errors->count());
    Assert::assertSame(4, $result->totalProcessed);
});

test('send records notification action accumulates errors per channel', function (): void {
    app()->instance(SafeEloquentCastAction::class, new SendRecordsSafeEloquentCastStub);
    app()->instance(SendRecordNotificationAction::class, new SendRecordNotificationFailStub);

    $records = new EloquentCollection([
        makeDummyBulkNotifyRecord(['id' => 1, 'name' => 'Ok Record', 'should_fail' => false]),
        makeDummyBulkNotifyRecord(['id' => 2, 'name' => 'Fail Record', 'should_fail' => true])]);

    $result = app(SendRecordsNotificationAction::class)->execute(
        records: $records,
        templateSlug: 'welcome-template',
        channels: ['mail', 'sms'],
    );

    Assert::assertSame(2, $result->successCount);
    Assert::assertSame(2, $result->errorCount);
    Assert::assertSame(2, $result->errors->count());
    Assert::assertSame('Fail Record', $result->errors->first()['record'] ?? null);
    Assert::assertSame(4, $result->totalProcessed);
});

test('send records notification action falls back to record key when name is missing', function (): void {
    app()->instance(SafeEloquentCastAction::class, new SendRecordsSafeEloquentCastEmptyStub);
    app()->instance(SendRecordNotificationAction::class, new SendRecordNotificationThrowStub);

    $record = makeDummyBulkNotifyRecord(['id' => 99, 'should_fail' => true]);
    $records = new EloquentCollection([$record]);

    $result = app(SendRecordsNotificationAction::class)->execute(
        records: $records,
        templateSlug: 'welcome-template',
        channels: ['mail'],
    );

    Assert::assertSame(0, $result->successCount);
    Assert::assertSame(1, $result->errorCount);
    Assert::assertSame('99', $result->errors->first()['record'] ?? null);
});
