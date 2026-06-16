<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Datas\NotificationData;

/**
 * phpstan-require-extends Model.
 */
interface CanThemeNotificationContract
{
<<<<<<< HEAD
    /**
     * @param  array<string, mixed>  $view_params
     */
=======
>>>>>>> 929ed821d (.)
    public function getNotificationData(string $name, array $view_params = []): NotificationData;

    public function getModel(): Model;

    /**
     * @return mixed|void
     */
    public function sendEmailCallback();

    /**
     * @return mixed|void
     */
    public function sendSmsCallback();

<<<<<<< HEAD
    /**
     * @param  array<string, mixed>  $data
     */
=======
>>>>>>> 929ed821d (.)
    public function increase(string $what, array $data): void;
}
