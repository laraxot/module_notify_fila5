<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models\Traits;

<<<<<<< HEAD
use Modules\Notify\Enums\ContactTypeEnum;
use Modules\Notify\Tests\Fixtures\HasContactDummyModel;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

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
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\Traits\HasContact;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);

function makeHasContactDummyModel(): Model
{
    return new class extends Model
    {
        use HasContact;

        protected $table = 'notify_has_contact_dummy';

        protected $fillable = [];

        public function initContactTrait(): void
        {
            $this->initializeHasContact();
        }
    };
}

test('has contact trait appends contact type fields to fillable', function () {
    $model = makeHasContactDummyModel();
    $model->initContactTrait();

    expect($model->getFillable())->toContain('phone')
        ->and($model->getFillable())->toContain('mobile')
        ->and($model->getFillable())->toContain('email')
        ->and($model->getFillable())->toContain('pec')
        ->and($model->getFillable())->toContain('whatsapp')
        ->and($model->getFillable())->toContain('fax');
>>>>>>> 929ed821d (.)
});
