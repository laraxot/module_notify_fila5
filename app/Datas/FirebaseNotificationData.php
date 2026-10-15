<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
use Spatie\LaravelData\Data;

class FirebaseNotificationData extends Data
{
    public string $type; // ' => $data['type'],

    public string $title; // ' => $data['title'],

    public string $body; // ' => $data['body'],

    /** @var array<string, mixed> */
    public array $data; // ' => json_encode($data['data']),

    public static function fromType(string $type): self
    {
        $main_module = Str::of(XotData::make()->main_module)->lower()->toString();
        $titleRaw = trans($main_module.'::notifications.'.mb_strtoupper($type).'.title');
        $bodyRaw = trans($main_module.'::notifications.'.mb_strtoupper($type).'.body');
        $data = [
            'type' => $type,
            'title' => is_string($titleRaw) ? $titleRaw : $type,
            'body' => is_string($bodyRaw) ? $bodyRaw : '',
            'data' => []];

        return self::from($data);
    }
}
