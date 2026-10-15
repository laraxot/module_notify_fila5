<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Modules\Notify\Models\BasePivot;

/**
 * Pivot concreto per coprire BasePivot (vietate classi anonime - story 5.26).
 */
final class NotifyCoveragePivotStub extends BasePivot
{
    protected $table = 'notify_coverage_pivot_stub';
}
