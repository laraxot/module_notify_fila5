<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;

trait HasXotFactory
{
    use HasFactory;
    
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        $factoryClass = static::$factory ?? null;
        if ($factoryClass && class_exists($factoryClass)) {
            return $factoryClass::new();
        }
        
        return null;
    }
}