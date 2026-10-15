<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\Traits\HasContact;

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
