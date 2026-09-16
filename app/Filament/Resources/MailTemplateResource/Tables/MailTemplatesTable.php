<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\MailTemplateResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Notify\Models\MailTemplate;
>>>>>>> laraxot/dev
=======
use Modules\Notify\Models\MailTemplate;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class MailTemplatesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
     * @var class-string<MailTemplate>
     */
    protected static string $model = MailTemplate::class;

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
            'mailable' => TextColumn::make('mailable')->searchable()->sortable(),
<<<<<<< HEAD
<<<<<<< HEAD
            'slug' => TextColumn::make('slug')->searchable()->sortable(),
            'subject' => TextColumn::make('subject')->searchable()->sortable(),
            'counter' => TextColumn::make('counter')->searchable()->sortable(),
=======
            'slug' => TextColumn::make('slug')->searchable()->sortable()->copyable(),
            'counter' => TextColumn::make('counter')->numeric()->sortable(),
>>>>>>> laraxot/dev
=======
            'slug' => TextColumn::make('slug')->searchable()->sortable()->copyable(),
            'counter' => TextColumn::make('counter')->numeric()->sortable(),
>>>>>>> laraxot/dev
            'version' => TextColumn::make('version')->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev

    /**
     * @return array<string, TextColumn>
     */
    public static function mailTemplateTableColumns(): array
    {
        return [
            'slug' => TextColumn::make('slug')->searchable()->sortable(),
            // TextColumn::make('mailable')->searchable()->sortable(),
            'subject' => TextColumn::make('subject')->searchable()->sortable(),
            'counter' => TextColumn::make('counter')->searchable()->sortable()];
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
}
