<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notify\Models\NotificationTemplate;

/**
 * @extends Factory<NotificationTemplate>
 */
class NotificationTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = NotificationTemplate::class;

    /**
     * Define the model's default state.
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
