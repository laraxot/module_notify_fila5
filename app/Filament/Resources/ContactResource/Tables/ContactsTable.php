<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\ContactResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
=======
=======
>>>>>>> laraxot/dev
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Notify\Models\Contact;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class ContactsTable extends XotBaseResourceTable
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
    /**
     * @var class-string<Contact>
     */
    protected static string $model = Contact::class;

<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    public function getTableFilters(): array
    {
        return [
            'active' => Filter::make('active')->query(fn (Builder $query): Builder => $query->where('active', true)),
            'inactive' => Filter::make('inactive')->query(
                fn (Builder $query): Builder => $query->where('active', false),
            )];
    }

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
<<<<<<< HEAD
<<<<<<< HEAD
            'contact_type' => TextColumn::make('contact_type')->sortable(),
            'value' => TextColumn::make('value')->searchable(),
=======
=======
>>>>>>> laraxot/dev
            'contact_type' => TextColumn::make('contact_type')->searchable()->sortable(),
            'value' => TextColumn::make('value')->searchable()->sortable()->copyable()->wrap(),
            'first_name' => TextColumn::make('first_name')->searchable()->sortable(),
            'last_name' => TextColumn::make('last_name')->searchable()->sortable(),
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
            'user_id' => TextColumn::make('user_id')->sortable(),
            'verified_at' => TextColumn::make('verified_at')->dateTime()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev

    /**
     * @return array<string, IconColumn|TextColumn>
     */
    public static function contactTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->numeric()->sortable(),
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable(),
            'phone' => TextColumn::make('phone')->searchable()->sortable(),
            'message' => TextColumn::make('message')->searchable()->sortable(),
            'is_read' => IconColumn::make('is_read')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()];
    }

    /**
     * @return array<string, Filter>
     */
    public static function contactTableFilters(): array
    {
        return [
            'active' => Filter::make('active')->query(fn (Builder $query): Builder => $query->where('active', true)),
            'inactive' => Filter::make('inactive')->query(
                fn (Builder $query): Builder => $query->where('active', false),
            )];
    }
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
}
