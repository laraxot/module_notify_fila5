<?php

<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 929ed821d (.)
namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notify\Models\NotificationLog;
<<<<<<< HEAD
use Modules\User\Models\User;

use function Safe\json_encode;

/**
 * @extends Factory<NotificationLog>
 */
=======

>>>>>>> 929ed821d (.)
class NotificationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = NotificationLog::class;

    /**
<<<<<<< HEAD
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'notifiable_type' => User::class,
            'notifiable_id' => 1,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'channels' => json_encode(['email']),
            'data' => json_encode(['message' => $this->faker->sentence()]),
            'sent_at' => now(),
            'status' => NotificationLog::STATUS_SENT,
            'error' => null,
        ];
=======
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
>>>>>>> 929ed821d (.)
    }
}
