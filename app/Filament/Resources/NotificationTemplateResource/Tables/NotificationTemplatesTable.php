<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationTemplateResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Notify\Models\NotificationTemplate;
>>>>>>> laraxot/dev
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Notify\Models\NotificationTemplate;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class NotificationTemplatesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
     * @var class-string<NotificationTemplate>
     */
    protected static string $model = NotificationTemplate::class;

    /**
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'code' => TextColumn::make('code')->searchable()->sortable(),
<<<<<<< HEAD
<<<<<<< HEAD
            'type' => TextColumn::make('type')->sortable(),
            'category' => TextColumn::make('category')->sortable(),
            'is_active' => TextColumn::make('is_active')->badge(),
=======
            'type' => TextColumn::make('type')->searchable()->sortable()->badge(),
            'category' => TextColumn::make('category')->searchable()->sortable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
>>>>>>> laraxot/dev
=======
            'type' => TextColumn::make('type')->searchable()->sortable()->badge(),
            'category' => TextColumn::make('category')->searchable()->sortable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
>>>>>>> laraxot/dev
            'version' => TextColumn::make('version')->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)];
    }
}
