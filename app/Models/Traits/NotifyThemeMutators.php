<?php

declare(strict_types=1);

namespace Modules\Notify\Models\Traits;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
use Modules\Notify\Database\Factories\NotifyThemeFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

trait NotifyThemeMutators
{
    function getLogoAttribute(?array $value): array
        {
            return $this->getLogo();
        }

    function getLogo(): array
        {
            return [
                // 'path' => asset(strval($this->logo_src)),
                'path' => url($this->getFirstMediaUrl()),
                'width' => $this->logo_width ?? 50,
                'height' => $this->logo_height ?? 50];
        }

}
