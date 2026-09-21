<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Modules\Media\Models\Media;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * @property string|null $name
 * @property string|null $driver
 * @property array<string, mixed>|null $config
<<<<<<< HEAD
 * @property bool $is_enabled
 * @property int|null $priority
 * @property-read ProfileContract|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read ProfileContract|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel query()
<<<<<<< HEAD
 *
=======
 * @property-read \Modules\User\Models\Profile|null $deleter
=======
 * @property bool|null $is_enabled
 * @property int|null $priority
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read ProfileContract|null $updater
 *
 * @method static \Modules\Notify\Database\Factories\NotificationChannelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel query()
 *
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
 * @mixin \Eloquent
 */
class NotificationChannel extends BaseModel
{
    protected $table = 'notification_channels';

    protected $fillable = [
        'name',
        'driver',
        'config',
        'is_enabled',
<<<<<<< HEAD
        'priority'];
=======
        'priority',
    ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'config' => 'array',
            'is_enabled' => 'boolean',
<<<<<<< HEAD
            'priority' => 'integer']);
=======
            'priority' => 'integer',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    }
}
