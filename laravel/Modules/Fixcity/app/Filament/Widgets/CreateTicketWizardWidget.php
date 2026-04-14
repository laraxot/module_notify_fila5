<?php

declare(strict_types=1);

namespace Modules\Fixcity\Filament\Widgets;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Wizard\Step;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Fixcity\Enums\TicketTypeEnum;
use Modules\Fixcity\Events\TicketCreatedEvent;
use Modules\Fixcity\Models\Ticket;
use Modules\Geo\Filament\Forms\Components\AddressInput;
use Modules\Xot\Filament\Widgets\XotBaseWizardWidget;

class CreateTicketWizardWidget extends XotBaseWizardWidget
{
    /**
     * Vista modulo (layout Design Comuni: sidebar step 2, stepper, parity CSS).
     * {@see GetViewByClassAction} risolve prima `pub_theme::filament.widgets.createticketwizard`:
     * senza override qui verrebbe usato il wrapper tema slim senza colonna sinistra.
     */
    protected string $view = 'fixcity::filament.widgets.ticket-create-wizard';

    public array $blockData = [];

    /** @param array<string, mixed> $blockData */
    public function mount(array $blockData = []): void
    {
        $this->blockData = $blockData;
        $this->initWizardState();
    }

    protected function getFormModel(): ?string
    {
        return null;
    }

    /**
     * @return array<string, mixed>
     */
    #[\Override]
    protected function defaultFormData(): array
    {
        return [
            'privacyAccepted' => false,
        ];
    }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    public function getPrivacySchema(): array
    {
        return [
            Text::make(fn (): HtmlString => $this->getPrivacyNoticeHtml())
                ->columnSpanFull(),
            Checkbox::make('privacyAccepted')
                ->accepted()
                ->dehydrated(false),
        ];
    }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    public function getDataSchema(): array
    {
        return [
            Section::make((string) __('fixcity::segnalazione.fields.place.section.label'))
                ->description((string) __('fixcity::segnalazione.sections.place.description'))
                ->compact()
                ->extraAttributes(['id' => 'report-place', 'data-step-section' => 'place'])
                ->schema([
                    AddressInput::make('address')
                        ->required()
                        ->spritePath('/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg'),
                ]),

            Section::make((string) __('fixcity::segnalazione.fields.inefficiency.section.label'))
                ->description((string) __('fixcity::segnalazione.sections.inefficiency.description'))
                ->compact()
                ->extraAttributes(['id' => 'report-info', 'data-step-section' => 'inefficiency'])
                ->schema([
                    Select::make('type')
                        ->options(TicketTypeEnum::class)
                        ->required()
                        //->native(false)
                        ,
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('content')
                        ->required()
                        ->maxLength(200)
                        ->rows(3)
                        ->helperText((string) __('fixcity::segnalazione.fields.details.max_chars.label')),
                    FileUpload::make('images')
                        ->helperText((string) __('fixcity::segnalazione.fields.images.help_text'))
                        ->multiple()
                        ->image()
                        ->disk('public')
                        ->directory('tickets/images')
                        ->maxFiles(10)
                        ->openable(),
                ]),

            Section::make((string) __('fixcity::segnalazione.sections.author.label'))
                ->description((string) __('fixcity::segnalazione.sections.author.description'))
                ->compact()
                ->extraAttributes(['id' => 'report-author', 'data-step-section' => 'author'])
                ->schema([
                    Grid::make(['default' => 1, 'lg' => 3])->schema([
                        Text::make(fn (): string => $this->getAuthUserName())
                            ->icon('heroicon-o-user'),
                        Text::make(fn (): string => __('fixcity::segnalazione.fields.fiscal_code.label').': '.$this->getAuthUserFiscalCode())
                            ->icon('heroicon-o-identification'),
                        Text::make(fn (): string => __('fixcity::segnalazione.fields.phone.label').': '.$this->getAuthUserPhone())
                            ->icon('heroicon-o-phone'),
                    ]),

                    TextInput::make('email')
                        ->helperText((string) __('fixcity::create_ticket_wizard.fields.email.helper_text'))
                        ->email()
                        ->maxLength(255),
                ]),
        ];
    }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    public function getSummarySchema(): array
    {
        return [
            Section::make((string) __('fixcity::segnalazione.sections.summary.label'))
                ->compact()
                ->extraAttributes(['data-step-section' => 'summary'])
                ->schema([
                    Grid::make(['default' => 1, 'lg' => 2])->schema([
                        Text::make(fn (Get $get): string => (string) ($get('name') ?? ''))
                            ->weight('bold')
                            ->icon('heroicon-o-document'),

                        Text::make(function (Get $get): string {
                            $type = TicketTypeEnum::tryFrom((string) ($get('type') ?? ''));

                            return $type?->getLabel() ?? '';
                        })
                            ->badge()
                            ->icon('heroicon-o-tag'),

                        Text::make(fn (Get $get): string => (string) ($get('address') ?? ''))
                            ->columnSpanFull()
                            ->icon('heroicon-o-map-pin'),

                        Text::make(fn (Get $get): string => (string) ($get('content') ?? ''))
                            ->columnSpanFull()
                            ->icon('heroicon-o-chat-bubble-left-ellipsis'),

                        Text::make(fn (Get $get): string => (string) ($get('email') ?? ''))
                            ->icon('heroicon-o-envelope'),
                    ]),
                ]),
        ];
    }

    public function submit(): void
    {
        try {
            $state = $this->normalizeWizardFormState($this->form->getState());
            unset($state['images']);

            if (auth()->check()) {
                $state['owner_id'] = auth()->id();
            }

            $ticket = Ticket::query()->create($state);
            TicketCreatedEvent::dispatch($ticket);

            $slug = (string) ($this->blockData['confirmation_slug'] ?? config('fixcity.wizard.confirmation_slug', 'segnalazione-04-conferma'));
            $url = route('tests.view', ['slug' => $slug]);
            $localizedUrl = LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), $url) ?: $url;
            $this->redirect($localizedUrl);
        } catch (\Throwable $e) {
            $this->addError('submit', $e->getMessage());
            \Filament\Notifications\Notification::make()
                ->danger()
                ->title(__('fixcity::segnalazione.errors.submit.title'))
                ->body($e->getMessage())
                ->send();
        }
    }

    public function render(): View
    {
        return view($this->view, [
            'blockData' => $this->blockData,
            'pageTitle' => (string) ($this->blockData['title'] ?? __('fixcity::segnalazione.page.title.label')),
            'pageDescription' => (string) ($this->blockData['description'] ?? ''),
        ]);
    }

    /**
     * @return array<int, Step>
     */
    public function getWizardSteps(): array
    {
        return [
            $this->getStepByName('privacy'),
            $this->getStepByName('data'),
            $this->getStepByName('summary'),
        ];
    }

    protected function getPrivacyNoticeHtml(): HtmlString
    {
        $privacyLink = (string) ($this->blockData['privacy_link'] ?? '#');
        $intro = (string) __('fixcity::segnalazione.privacy.intro.text');
        $detailPrefix = (string) __('fixcity::segnalazione.privacy.detail_prefix.text');
        $linkLabel = (string) __('fixcity::segnalazione.privacy.link.label');

        return new HtmlString(sprintf(
            '<p class="mb-3">%s</p><p>%s<a href="%s" class="text-primary text-decoration-underline">%s</a></p>',
            e($intro),
            e($detailPrefix),
            e($privacyLink),
            e($linkLabel),
        ));
    }

    protected function getAuthUserName(): string
    {
        $user = auth()->user();
        if ($user === null) {
            return '';
        }

        return (string) (data_get($user, 'name')
            ?? trim(((string) data_get($user, 'first_name', '')).' '.((string) data_get($user, 'last_name', '')))
        );
    }

    protected function getAuthUserFiscalCode(): string
    {
        $user = auth()->user();

        return $user === null ? '' : (string) (data_get($user, 'fiscal_code') ?? data_get($user, 'codice_fiscale') ?? '');
    }

    protected function getAuthUserPhone(): string
    {
        $user = auth()->user();

        return $user === null ? '' : (string) (data_get($user, 'phone') ?? data_get($user, 'mobile') ?? data_get($user, 'telefono') ?? '');
    }
}
