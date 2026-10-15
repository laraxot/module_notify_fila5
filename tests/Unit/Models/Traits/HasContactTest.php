<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Unit\Models\Traits;

use Modules\Notify\Enums\ContactTypeEnum;
use Tests\Modules\Notify\Fixtures\HasContactDummyModel;
use PHPUnit\Framework\Assert;

function makeHasContactDummyModel(): HasContactDummyModel
{
    return new HasContactDummyModel;
}

test('has contact trait appends contact type fields to fillable', function (): void {
    $model = makeHasContactDummyModel();
    $model->initContactTrait();

    $fillable = $model->getFillable();

    foreach (ContactTypeEnum::cases() as $case) {
        Assert::assertContains($case->value, $fillable);
    }
});
