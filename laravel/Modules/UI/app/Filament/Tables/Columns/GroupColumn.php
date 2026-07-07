<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;

class GroupColumn extends Column
{
    public array $form = [];

    /**
     * @var array<Column>
     */
    protected array $schema = [];

    protected string $view = 'ui::filament.tables.columns.group';

    public function getFields(): array
    {
        return $this->schema;
    }

    public function schema(array $form): self
    {
        $this->schema = $form;

        return $this;
    }

    /**
     * Initialize the component.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Component initialization logic
    }
}
