<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Str;
use Modules\Notify\Models\Notification;
use Modules\User\Models\User;

use function Safe\json_encode;

/**
 * @extends Factory<Notification>
 */
=======
use Modules\Notify\Models\Notification;

>>>>>>> 929ed821d (.)
class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'type' => 'App\\Notifications\\TestNotification',
            'notifiable_type' => User::class,
            'notifiable_id' => (string) Str::uuid(),
            'data' => json_encode(['message' => $this->faker->sentence()]),
            'read_at' => null,
        ];
=======
     */
    public function definition(): array
    {
        return [];
>>>>>>> 929ed821d (.)
    }
}
