<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Media\Models\Media;
use Modules\Notify\Database\Factories\NotificationTemplateVersionFactory;
use Modules\User\Models\Profile;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Traits\Updater;
use Override;
use RuntimeException;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

// BaseModel in same namespace provides common behaviors
/**
<<<<<<< HEAD
 * @property int $id
 * @property int $template_id
 * @property string|null $subject
 * @property string|null $body_html
 * @property string|null $body_text
 * @property array<int, string>|null $channels
 * @property array<string, mixed>|null $variables
 * @property array<string, mixed>|null $conditions
 * @property int $version
 * @property string|null $created_by
 * @property string|null $change_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
=======
>>>>>>> 929ed821d (.)
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read NotificationTemplate|null $template
 * @property-read Profile|null $updater
 *
 * @method static NotificationTemplateVersionFactory factory($count = null, $state = [])
 * @method static Builder<static>|NotificationTemplateVersion newModelQuery()
 * @method static Builder<static>|NotificationTemplateVersion newQuery()
 * @method static Builder<static>|NotificationTemplateVersion query()
 *
<<<<<<< HEAD
=======
 * @mixin IdeHelperNotificationTemplateVersion
 *
>>>>>>> 929ed821d (.)
 * @property-read ProfileContract|null $deleter
 *
 * @mixin \Eloquent
 */
class NotificationTemplateVersion extends BaseModel
{
    use Updater;

    protected $fillable = [
        'template_id',
        'subject',
        'body_html',
        'body_text',
        'channels',
        'variables',
        'conditions',
        'version',
        'created_by',
        'change_notes',
    ];

<<<<<<< HEAD
    /** @return BelongsTo<NotificationTemplate, $this> */
=======
>>>>>>> 929ed821d (.)
    public function template(): BelongsTo
    {
        return $this->belongsTo(NotificationTemplate::class, 'template_id');
    }

<<<<<<< HEAD
    public function restoreTemplate(): NotificationTemplate
=======
    public function restore(): NotificationTemplate
>>>>>>> 929ed821d (.)
    {
        $template = $this->template;

        if (! $template) {
            throw new RuntimeException('Template not found for version '.$this->id);
        }

        $template->update([
            'subject' => $this->subject ?? null,
            'body_html' => $this->body_html ?? null,
            'body_text' => $this->body_text ?? null,
            'channels' => $this->channels ?? null,
            'variables' => $this->variables ?? null,
            'conditions' => $this->conditions ?? null,
        ]);

        return $template;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[Override]
    protected function casts(): array
    {
        return [
            'channels' => 'array',
            'variables' => 'array',
            'conditions' => 'array',
        ];
    }
}
