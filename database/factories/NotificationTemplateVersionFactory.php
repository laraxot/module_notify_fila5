<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notify\Models\NotificationTemplateVersion;

<<<<<<< HEAD
/**
 * @extends Factory<NotificationTemplateVersion>
 */
=======
>>>>>>> 929ed821d (.)
class NotificationTemplateVersionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = NotificationTemplateVersion::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> 929ed821d (.)
    public function definition(): array
    {
        return [];
    }
}
