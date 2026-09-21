<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Support\Carbon;
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
use Modules\Notify\Database\Factories\NotificationTypeFactory;
use Override;

/**
<<<<<<< HEAD
 * @property int $id
 * @property string|null $name
=======
 * @method static Builder<static>|NotificationType newModelQuery()
 * @method static Builder<static>|NotificationType newQuery()
 * @method static Builder<static>|NotificationType query()
 *
 * @property int $id
 * @property string $name
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $category
 * @property bool $is_active
<<<<<<< HEAD
 * @property array<string, mixed>|null $channels
 * @property array<string, mixed>|null $settings
 * @property string|null $template
 *
 * @method static Builder<static>|NotificationType newModelQuery()
 * @method static Builder<static>|NotificationType newQuery()
 * @method static Builder<static>|NotificationType query()
<<<<<<< HEAD
 *
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
=======
 * @property array<string, array<string, mixed>>|null $channels
 * @property array<string, mixed>|null $settings
 * @property array<string, mixed>|null $metrics
 * @property array<string, mixed>|null $scheduling
 * @property array<string, mixed>|null $rules
 * @property array<string, mixed>|null $permissions
 * @property string|null $display_name
 * @property array<string, mixed>|null $templates
 * @property array<string, mixed>|null $integrations
 * @property array<string, mixed>|null $delivery_rules
 * @property string|null $template
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
 * @method static Builder<static>|NotificationType whereCreatedAt($value)
 * @method static Builder<static>|NotificationType whereCreatedBy($value)
 * @method static Builder<static>|NotificationType whereDescription($value)
 * @method static Builder<static>|NotificationType whereId($value)
 * @method static Builder<static>|NotificationType whereName($value)
 * @method static Builder<static>|NotificationType whereTemplate($value)
 * @method static Builder<static>|NotificationType whereUpdatedAt($value)
 * @method static Builder<static>|NotificationType whereUpdatedBy($value)
<<<<<<< HEAD
=======
 *
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
 * @mixin \Eloquent
 */
class NotificationType extends Model
{
    /** @use HasFactory<NotificationTypeFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'is_active',
        'channels',
        'settings',
<<<<<<< HEAD
        'template'];
=======
        'template',
    ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'channels' => 'array',
<<<<<<< HEAD
            'settings' => 'array'];
=======
            'settings' => 'array',
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    }
}
