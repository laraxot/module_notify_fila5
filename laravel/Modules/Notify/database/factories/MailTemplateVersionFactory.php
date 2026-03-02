<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notify\Models\MailTemplateVersion;

/**
 * @extends Factory<MailTemplateVersion>
 */
class MailTemplateVersionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<MailTemplateVersion>
     */
    protected $model = MailTemplateVersion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mail_template_id' => fake()->randomNumber(1, 100),
            'version' => fake()->randomNumber(1, 10),
            'subject' => fake()->sentence(),
            'html_template' => fake()->text(),
            'text_template' => fake()->text(),
            'metadata' => null,
            'created_by' => fake()->uuid(),
            'change_notes' => fake()->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}