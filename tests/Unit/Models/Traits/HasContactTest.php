<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Enums\ContactTypeEnum;
use Modules\Notify\Models\Traits\HasContact;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeHasContactDummyModel(): HasContactDummyModel
{
    return new HasContactDummyModel;
}

final class HasContactDummyModel extends Model
{
    use HasContact;

    protected $table = 'notify_has_contact_dummy';

    /** @var list<string> */
    protected $fillable = [];

    public function initContactTrait(): void
    {
        $this->initializeHasContact();
    }
}

test('has contact trait appends contact type fields to fillable', function (): void {
    $model = makeHasContactDummyModel();
    $model->initContactTrait();

    $fillable = $model->getFillable();

    foreach (ContactTypeEnum::cases() as $case) {
        Assert::assertContains($case->value, $fillable);
    }
});
