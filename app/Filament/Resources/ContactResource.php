<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Modules\Notify\Models\Contact;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

use Filament\Forms\Components\Field;
class ContactResource extends XotBaseResource
{
    protected static ?string $model = Contact::class;

    /**
     * Get the form schema for the resource.
     *
     * @return array<string, mixed>
     */
    //#[Override]
    public static function getFormSchemaOld(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            'phone' => TextInput::make('phone')
                ->tel()
                ->maxLength(255),
        ];
    }
}
