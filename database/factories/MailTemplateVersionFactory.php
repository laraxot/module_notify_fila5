<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notify\Models\MailTemplateVersion;

<<<<<<< HEAD
/**
 * @extends Factory<MailTemplateVersion>
 */
=======
>>>>>>> 929ed821d (.)
class MailTemplateVersionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = MailTemplateVersion::class;

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
