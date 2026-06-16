<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

<<<<<<< HEAD
use Modules\Xot\Models\XotBaseModel;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Traits\Updater;
>>>>>>> 929ed821d (.)
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class BaseModel.
 */
<<<<<<< HEAD
abstract class BaseModel extends XotBaseModel implements HasMedia
{
    use InteractsWithMedia;
=======
abstract class BaseModel extends Model implements HasMedia
{
    // use Searchable;
    use HasFactory;
    use InteractsWithMedia;
    use Updater;
>>>>>>> 929ed821d (.)

    public $incrementing = true;

    public $timestamps = true;

<<<<<<< HEAD
=======
    protected $perPage = 30;

>>>>>>> 929ed821d (.)
    protected $connection = 'notify';

    /** @var list<string> */
    protected $appends = [];

    protected $primaryKey = 'id';

<<<<<<< HEAD
    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [];
=======
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory(): Factory
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> 929ed821d (.)

    /** @return array<string, string> */
    protected function casts(): array
    {
<<<<<<< HEAD
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
        ]);
=======
        return [
            'id' => 'string',
            'uuid' => 'string',
            'published_at' => 'datetime',
            'verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
>>>>>>> 929ed821d (.)
    }
}
