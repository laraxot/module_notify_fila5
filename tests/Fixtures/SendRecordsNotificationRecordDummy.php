<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Illuminate\Database\Eloquent\Model;

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
