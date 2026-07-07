<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\View;
use Override;
use Filament\Forms\Components\Utilities\Set;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Modules\Lang\Filament\Resources\LangBaseResource;
use Modules\Notify\Models\MailTemplate;

class MailTemplateResource extends LangBaseResource
{
    protected static null|string $model = MailTemplate::class;

    /**
     * Restituisce lo schema del form per Filament.
     *
     * - Array associativo con chiavi stringhe
     * - Campi ricavati da migration/model: id, mailable, subject, html_template, text_template
     * - Le etichette, i placeholder e i testi di aiuto sono gestiti tramite LangServiceProvider
     * - File di traduzione: Modules/Notify/resources/lang/{locale}/mail_template.php
     */
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'mailable' => TextInput::make('mailable')->required()->maxLength(255),
            'name_group' => Group::make()
                ->schema([
                    TextInput::make('name')
                        ->label('Nome Template')
                        ->required()
                        ->afterStateUpdated(function (string $state, \Filament\Schemas\Components\Utilities\Set $set) {
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                ])
                ->columns(2),
            'subject' => TextInput::make('subject')->required()->maxLength(255),
            'html_template' => RichEditor::make('html_template')->required()->columnSpanFull(),
            'params_display' => View::make('notify::filament.components.params-badges')
                ->viewData(fn($record) => ['params' => $record?->params])
                ->columnSpanFull()
                ->visible(fn($record): bool => !empty($record->params)),
            'text_template' => Textarea::make('text_template')->maxLength(65535)->columnSpanFull(),
            'sms_template' => Textarea::make('sms_template')->columnSpanFull(),
        ];
    }
}
