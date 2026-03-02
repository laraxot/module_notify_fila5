<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

use Modules\Tenant\Models\Traits\SushiToJsons;
use Modules\Tenant\Models\Traits\SushiToJsonsHelper;

/**
 * Class BaseModelJsons.
 *
 * @property array $form
 */
abstract class BaseModelJsons extends BaseModel
{
    use SushiToJsons;
    use SushiToJsonsHelper;
}
