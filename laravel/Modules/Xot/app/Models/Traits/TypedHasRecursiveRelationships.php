<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

/**
 * Typed wrapper for HasRecursiveRelationships trait.
 *
 * This trait provides type-safe recursive relationship methods
 * for hierarchical data structures (trees).
 *
 * @see \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships
 */
trait TypedHasRecursiveRelationships
{
    use HasRecursiveRelationships;
}
