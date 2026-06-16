<?php

declare(strict_types=1);

use function Laravel\Folio\name;
use Modules\Cms\Actions\ResolveDesignComuniPageAction;

name('tests.design-comuni.show');

$slug = (string) ($slug ?? request()->route('slug', ''));

if ($slug === '') {
    abort(404);
}

$locale = (string) app()->getLocale();
$html = app(ResolveDesignComuniPageAction::class)->render($slug, $locale);

if (! is_string($html) || $html === '') {
    abort(404, 'Design Comuni page not found: ' . $slug);
}

return response($html);
?>
