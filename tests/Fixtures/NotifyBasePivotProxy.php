<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Modules\Notify\Models\BasePivot;

final class NotifyBasePivotProxy extends BasePivot
{
    protected $table = 'notify_base_pivot_proxy';

    /** @return array<string, string> */
    public function exposedCasts(): array
    {
        /** @var array<string, string> $casts */
        $casts = $this->getCasts();

        return $casts;
    }
}
