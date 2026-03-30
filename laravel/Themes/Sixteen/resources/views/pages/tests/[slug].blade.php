<?php

declare(strict_types=1);

use function Laravel\Folio
ame;
use Modules\Cms\Actions\ResolveDesignComuniPageAction;

name('tests.design-comuni.show');

$slug = (string) request()->route('slug', '');
$locale = (string) app()->getLocale();
$html = app(ResolveDesignComuniPageAction::class)->render($slug, $locale);

if (! is_string($html)) {
    return response('Page not found!', 404);
}

return response($html);
?>
