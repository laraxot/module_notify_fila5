<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Modules\Notify\Models\Contact;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ContactResource extends XotBaseResource
{
    protected static ?string $model = Contact::class;
<<<<<<< HEAD
=======

    /**
     * Get the form schema for the resource.
     *
     * @return array<string, Field>
     */
<<<<<<< HEAD
    #[Override]
    public static function getFormSchema(): array
=======
    // #[Override]
    public static function getFormSchemaOld(): array
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
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
<<<<<<< HEAD
                ->maxLength(255)];
=======
                ->maxLength(255),
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    }
>>>>>>> 7e6063a3 (.)
}
