<?php

declare(strict_types=1);

namespace Modules\Notify\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Modules\Notify\Models\MailTemplate;

trait MailTemplateLogRelations
{
    function template(): BelongsTo
        {
            return $this->belongsTo(MailTemplate::class, 'template_id');
        }

    function mailable(): MorphTo
        {
            return $this->morphTo();
        }

}
