<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

use Illuminate\Support\Facades\Log;
use Modules\Notify\Actions\SendAppointmentNotificationAction;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('send appointment notification returns false and logs info when models are missing', function () {
    Log::shouldReceive('info')->once();

    $result = app(SendAppointmentNotificationAction::class)->execute(
        appointment: (object) ['patient_id' => 1],
        type: 'reminder',
    );

<<<<<<< HEAD
    Assert::assertFalse($result);
=======
    expect($result)->toBeFalse();
>>>>>>> 929ed821d (.)
});
