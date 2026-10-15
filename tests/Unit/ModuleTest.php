<?php
namespace Modules\Notify\Tests\Unit;

use Modules\Notify\Tests\TestCase;
use Modules\Notify\Models\NotificationChannel;

it('has main model class', function () {
    expect(class_exists(NotificationChannel::class))->toBeTrue();
});
