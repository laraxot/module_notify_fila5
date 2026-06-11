<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Actions\SendRecordNotificationAction;
use Modules\Notify\Actions\SendRecordsNotificationAction;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Actions\Cast\SafeEloquentCastAction;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

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
        makeDummyBulkNotifyRecord(['id' => 2, 'name' => 'Beta']),
    ]);

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
        makeDummyBulkNotifyRecord(['id' => 2, 'name' => 'Fail Record', 'should_fail' => true]),
    ]);

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

final class SendRecordsNotificationRecordDummy extends Model
{
    protected $guarded = [];

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}

final class SendRecordsSafeEloquentCastStub
{
    public function getStringAttribute(Model $record, string $attribute, string $default = ''): string
    {
        $value = $record->getAttribute($attribute);

        return is_string($value) ? $value : $default;
    }
}

final class SendRecordsSafeEloquentCastEmptyStub
{
    public function getStringAttribute(Model $record, string $attribute, string $default = ''): string
    {
        return '';
    }
}

final class SendRecordNotificationNoopStub
{
    /**
     * @param  array<int, string>  $channels
     */
    public function execute(Model $record, string $templateSlug, array $channels): void {}
}

final class SendRecordNotificationFailStub
{
    /**
     * @param  array<int, string>  $channels
     */
    public function execute(Model $record, string $templateSlug, array $channels): void
    {
        if ((bool) $record->getAttribute('should_fail')) {
            throw new \Exception('bulk failure');
        }
    }
}

final class SendRecordNotificationThrowStub
{
    /**
     * @param  array<int, string>  $channels
     */
    public function execute(Model $record, string $templateSlug, array $channels): void
    {
        throw new \Exception('forced error');
    }
}
