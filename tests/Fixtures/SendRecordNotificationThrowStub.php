<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Illuminate\Database\Eloquent\Model;

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
