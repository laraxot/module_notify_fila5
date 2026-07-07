<?php

namespace Modules\Fixcity\Actions;

use Faker\Factory;
use Illuminate\Support\Facades\Bus;
use Modules\Fixcity\Models\Ticket;
use Spatie\QueueableAction\QueueableAction;

class GenerateTicketsAction
{
    use QueueableAction;

    protected \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function execute(int $count): void
    {
        $states = ['open', 'urgent', 'resolved'];

        Bus::batch(
            collect(range(1, $count))
                ->map(fn (): callable => function () use ($states): Ticket {
                    $state = $this->faker->randomElement($states);

                    return match ($state) {
                        'open' => Ticket::factory()->open()->create(),
                        'urgent' => Ticket::factory()->urgent()->create(),
                        'resolved' => Ticket::factory()->resolved()->create(),
                        default => Ticket::factory()->create(),
                    };
                })
        )->dispatch();
    }
}
