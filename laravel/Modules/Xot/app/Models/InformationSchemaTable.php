<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use InvalidArgumentException;
use Modules\Tenant\Models\Traits\SushiToJson;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Database\Factories\InformationSchemaTableFactory;

/**
 * @property int|null $table_rows
 * @property string $table_schema
 * @property string $table_name
 * @property string|null $model_class
 * @property Carbon|null $created_at
 * @property string|null $created_by
 * @property int $id
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @method static InformationSchemaTableFactory factory($count = null, $state = [])
 * @method static Builder<static>|InformationSchemaTable newModelQuery()
 * @method static Builder<static>|InformationSchemaTable newQuery()
 * @method static Builder<static>|InformationSchemaTable query()
 * @method static Builder<static>|InformationSchemaTable whereCreatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereCreatedBy($value)
 * @method static Builder<static>|InformationSchemaTable whereId($value)
 * @method static Builder<static>|InformationSchemaTable whereModelClass($value)
 * @method static Builder<static>|InformationSchemaTable whereTableName($value)
 * @method static Builder<static>|InformationSchemaTable whereTableRows($value)
 * @method static Builder<static>|InformationSchemaTable whereTableSchema($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class InformationSchemaTable extends BaseModel
{
    use SushiToJson;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'table_schema',
        'table_name',
        'table_rows',
        'model_class',
        'updated_at',
        'updated_by',
        'created_at',
        'created_by',
    ];

    /**
     * Schema utilizzato dal trait Sushi per tipizzare i campi.
     *
     * @var array<string, string>
     */
    protected array $schema = [
        'id' => 'integer',
        'table_schema' => 'string',
        'table_name' => 'string',
        'table_rows' => 'integer',
        'model_class' => 'string',
        'updated_at' => 'datetime',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'created_by' => 'string',
    ];

    /**
     * Restituisce lo schema atteso da Sushi.
     *
     * @return array<string, string>
     */
    public function getSchema(): array
    {
        return $this->schema;
    }

    /**
     * Restituisce i record da utilizzare per popolare la tabella in-memory.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        return $this->getSushiRows();
    }

    /**
     * Get the JSON file path for this model.
     *
     * @return string
     */
    protected function getJsonFile(): string
    {
        $tbl = $this->getTable();
        return database_path('data/'.$tbl.'.json');
    }

    /**
     * Load existing data from JSON file.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function loadExistingData(): array
    {
        $path = $this->getJsonFile();
        if (! File::exists($path)) {
            return [];
        }
        $data = json_decode(File::get($path), true);
        return is_array($data) ? $data : [];
    }

    /**
     * Save data to JSON file.
     *
     * @param  array<int, array<string, mixed>>  $data
     * @return bool
     */
    protected function saveToJson(array $data): bool
    {
        $file = $this->getJsonFile();
        $directory = dirname($file);
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0o755, true, true);
        }
        $content = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        File::put($file, $content);
        return true;
    }

    /**
     * Get authenticated user ID.
     *
     * @return int|string|null
     */
    protected function authId(): int|string|null
    {
        if (\function_exists('authId')) {
            return authId();
        }
        return auth()->id() ?? null;
    }

    /**
     * Ensure directory exists for JSON file.
     *
     * @param  string  $filePath
     * @return void
     */
    protected function ensureDirectoryExists(string $filePath): void
    {
        $directory = dirname($filePath);
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0o755, true, true);
        }
    }

    /**
     * Find row index by ID in data array.
     *
     * @param  array<int, array<string, mixed>>  $rows
     * @param  int  $id
     * @return int|null
     */
    protected function findRowIndexById(array $rows, int $id): ?int
    {
        foreach ($rows as $index => $row) {
            if (is_array($row) && ((int) ($row['id'] ?? 0)) === $id) {
                return (int) $index;
            }
        }
        return null;
    }

    /**
     * Aggiorna il numero di record memorizzato per un modello.
     *
     * @param  class-string<Model>  $modelClass
     */
    public static function updateModelCount(string $modelClass, int $total): void
    {
        if (! class_exists($modelClass)) {
            throw new InvalidArgumentException("Model class [{$modelClass}] does not exist");
        }

        /** @var Model $model */
        $model = app($modelClass);
        if (! $model instanceof Model) {
            throw new InvalidArgumentException("Class [{$modelClass}] must be an instance of ".Model::class);
        }

        $connection = $model->getConnection();
        $database = $connection->getDatabaseName();
        $table = $model->getTable();

        static::updateOrCreate([
            'table_schema' => $database,
            'model_class' => $modelClass,
            'table_name' => $table,
        ], [
            'table_rows' => $total,
        ]);
    }

    /**
     * Restituisce il numero di record per un modello.
     *
     * @param  class-string<Model>  $modelClass
     */
    public static function getModelCount(string $modelClass): int
    {
        if (! class_exists($modelClass)) {
            throw new InvalidArgumentException("Model class [{$modelClass}] does not exist");
        }

        /** @var Model $model */
        $model = app($modelClass);
        if (! $model instanceof Model) {
            throw new InvalidArgumentException("Class [{$modelClass}] must be an instance of ".Model::class);
        }

        $connection = $model->getConnection();
        $database = $connection->getDatabaseName();
        $table = $model->getTable();

        $record = static::firstOrCreate([
            'table_schema' => $database,
            'model_class' => $modelClass,
            'table_name' => $table,
        ]);

        if ($record->table_rows === null) {
            $record->update(['table_rows' => $model->count()]);
        }

        return (int) $record->table_rows;
    }
}
