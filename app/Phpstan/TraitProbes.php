<?php

declare(strict_types=1);

namespace Modules\Notify\Phpstan;

use Modules\Notify\Models\BaseModel;
use Modules\Notify\Models\Traits\HasContact;

/**
 * PHPStan probe — keeps HasContact in the analysed graph.
 */
final class HasContactPhpstanProbe extends BaseModel
{
    use HasContact;

    protected $table = 'notify_phpstan_trait_probes';
}
