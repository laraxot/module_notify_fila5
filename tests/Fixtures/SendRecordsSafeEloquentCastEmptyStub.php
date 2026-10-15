<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Illuminate\Database\Eloquent\Model;

final class SendRecordsSafeEloquentCastEmptyStub
{
    public function getStringAttribute(Model $record, string $attribute, string $default = ''): string
    {
        return '';
    }
}
