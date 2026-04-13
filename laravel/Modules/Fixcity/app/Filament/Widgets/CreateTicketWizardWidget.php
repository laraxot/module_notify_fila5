<?php

declare(strict_types=1);

namespace Modules\Fixcity\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\HtmlString;
use Livewire\WithFileUploads;
use Modules\Fixcity\Enums\TicketTypeEnum;
use Modules\Fixcity\Events\TicketCreatedEvent;
use Modules\Fixcity\Models\Ticket;
use Modules\Geo\Filament\Forms\Components\AddressInput;
use Modules\Xot\Filament\Widgets\XotBaseWizardWidget;

/**
 * Widget frontoffice per creazione Ticket in 3 step.
 *
 * **Architettura**: estende {@see XotBaseWizardWidget} (non XotBaseWidget) perché:
 * - La responsabilità è multi-step (wizard), non form singolo
 * - XotBaseWizardWidget gestisce: navigazione step, persistenza ?step=, normalizzazione stato
 * - Separazione delle responsabilità: il widget di dominio si concentra solo sui campi specifici
 *
 * Schema: {@see Wizard} + {@see Step} (Filament v5), stato in `data` tramite {@see XotBaseWizardWidget::form()}.
 * Vista Blade: wrapper Design Comuni (titolo, contatti) + `{{ $this->form }}`.
 *
 * Translations: fixcity::segnalazione.steps.<item>.<tipo>
 */
class CreateTicketWizardWidget extends XotBaseWizardWidget
{
    use WithFileUploads;

    protected string $view = 'fixcity::filament.widgets.ticket-create-wizard';

    /** @var array<string, mixed> */
    public array $blockData = [];

    /** @param array<string, mixed> $blockData */
    public function mount(array $blockData = []): void
    {
        $this->blockData = $blockData;
        $this->wizardStartStep = $this->resolveInitialStepFromQuery();
        $this->form->fill($this->defaultFormData());
    }

    /**
     * @return array<string, mixed>
     */
    private function defaultFormData(): array
    {
        return [
            'privacyAccepted' => false,
            'address' => '',
            'issueType' => '',
            'title' => '',
            'details' => '',
            'email' => '',
            'images' => [],
            'userName' => '',
            'userFiscalCode' => '',
            'userPhone' => '',
        ];
    }

    /**
     * @return array<int, Component>
     */
    public function getFormSchema(): array
    {
        $wizard = $this->makeWizard([
            $this->makeStepPrivacy(),
            $this->makeStepData(),
            $this->makeStepSummary(),
        ])
            ->nextAction(fn (Action $action): Action => $this->configureWizardNextAction($action))
            ->previousAction(fn (Action $action): Action => $this->configureWizardPreviousAction($action))
            ->submitAction($this->getWizardSubmitAction());

        return [
            $wizard,
        ];
    }

    protected function configureWizardNextAction(Action $action): Action
    {
        return $action->label((string) __('fixcity::segnalazione.actions.next.label'));
    }

    protected function configureWizardPreviousAction(Action $action): Action
    {
        return $action->label((string) __('fixcity::segnalazione.actions.back.label'));
    }

    #[\Override]
    protected function getWizardSubmitAction(): Htmlable
    {
        return Action::make('submit')
            ->label((string) __('fixcity::segnalazione.actions.submit.label'))
            ->submit('submit')
            ->button()
            ->extraAttributes(['class' => 'btn btn-primary mobile-full']);
    }

    private function makeStepPrivacy(): Step
    {
        return Step::make('1')
            ->label((string) __('fixcity::segnalazione.steps.privacy.label'))
            ->schema([
                Checkbox::make('privacyAccepted')
                    ->label((string) __('fixcity::segnalazione.privacy.checkbox.label'))
                    ->accepted()
                    ->validationAttribute((string) __('fixcity::segnalazione.privacy.checkbox.label')),
            ]);
    }

    private function makeStepData(): Step
    {
        return Step::make('2')
            ->label((string) __('fixcity::segnalazione.steps.data.label'))
            ->schema([
                $this->getAddressComponent(),
                Select::make('issueType')
                    ->label((string) __('fixcity::segnalazione.fields.type.label'))
                    ->options(fn (): array => $this->getIssueTypeOptions())
                    ->required()
                    ->native(false),
                TextInput::make('title')
                    ->label((string) __('fixcity::segnalazione.fields.title.label'))
                    ->required()
                    ->maxLength(255),
                Textarea::make('details')
                    ->label((string) __('fixcity::segnalazione.fields.details.label'))
                    ->required()
                    ->maxLength(200)
                    ->rows(3),
                TextInput::make('email')
                    ->label((string) __('fixcity::segnalazione.fields.email.label'))
                    ->email()
                    ->maxLength(255),
                FileUpload::make('images')
                    ->label((string) __('fixcity::segnalazione.fields.images.label'))
                    ->helperText((string) __('fixcity::segnalazione.fields.images.help_text'))
                    ->multiple()
                    ->image()
                    ->disk('public')
                    ->directory('tickets/images')
                    ->maxFiles(10),
                TextInput::make('userName')
                    ->label((string) __('fixcity::segnalazione.fields.name.label'))
                    ->maxLength(255),
                TextInput::make('userFiscalCode')
                    ->label((string) __('fixcity::segnalazione.fields.fiscal_code.label'))
                    ->maxLength(16),
                TextInput::make('userPhone')
                    ->label((string) __('fixcity::segnalazione.fields.phone.label'))
                    ->tel()
                    ->maxLength(20),
            ]);
    }

    /**
     * Address input with geolocation action button.
     * Delegates to Geo module — geolocation is a cross-cutting geo-spatial concern.
     *
     * @see Modules\Geo\Filament\Forms\Components\AddressInput
     * @see Modules/Geo/docs/address-input-component.md
     * @see Modules/Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md
     */
    protected function getAddressComponent(): Component
    {
        return AddressInput::make('address')
            ->label((string) __('fixcity::segnalazione.fields.address.label'))
            ->required()
            ->spritePath('/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg');
    }

    private function makeStepSummary(): Step
    {
        return Step::make('3')
            ->label((string) __('fixcity::segnalazione.steps.summary.label'))
            ->schema([
                Placeholder::make('summary_notice')
                    ->label('')
                    ->content(new HtmlString(
                        '<p class="text-paragraph mb-4">'.e((string) __('fixcity::segnalazione.warning.message.label')).'</p>'
                    )),
                Placeholder::make('summary_address')
                    ->label((string) __('fixcity::segnalazione.fields.address.label'))
                    ->content(fn (): HtmlString => new HtmlString(
                        '<p class="data-text">'.e((string) ($this->data['address'] ?? '')).'</p>'
                    )),
                Placeholder::make('summary_type')
                    ->label((string) __('fixcity::segnalazione.fields.type.label'))
                    ->content(function (): HtmlString {
                        $key = (string) ($this->data['issueType'] ?? '');
                        $opts = $this->getIssueTypeOptions();
                        $label = $opts[$key] ?? $key;

                        return new HtmlString('<p class="data-text">'.e(is_array($label) ? (string) ($label['label'] ?? $key) : (string) $label).'</p>');
                    }),
                Placeholder::make('summary_title')
                    ->label((string) __('fixcity::segnalazione.fields.title.label'))
                    ->content(fn (): HtmlString => new HtmlString(
                        '<p class="data-text">'.e((string) ($this->data['title'] ?? '')).'</p>'
                    )),
                Placeholder::make('summary_details')
                    ->label((string) __('fixcity::segnalazione.fields.details.label'))
                    ->content(fn (): HtmlString => new HtmlString(
                        '<p class="data-text">'.e((string) ($this->data['details'] ?? '')).'</p>'
                    )),
            ]);
    }

    public function submit(): void
    {
        $state = $this->normalizeWizardFormState($this->form->getState());
        Validator::make($state, [
            'privacyAccepted' => ['accepted'],
            'address' => ['required', 'string', 'max:255'],
            'issueType' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string'],
            'email' => ['nullable', 'email', 'max:255'],
            'userName' => ['nullable', 'string', 'max:255'],
            'userFiscalCode' => ['nullable', 'string', 'max:16'],
            'userPhone' => ['nullable', 'string', 'max:20'],
        ])->validate();

        $issueType = (string) ($state['issueType'] ?? '');

        $payload = [
            'name' => (string) ($state['title'] ?? ''),
            'content' => (string) ($state['details'] ?? ''),
            'type' => $this->resolveTicketTypeEnumFromKey($issueType),
            'address' => (string) ($state['address'] ?? ''),
            'email' => ($state['email'] ?? '') !== '' ? (string) $state['email'] : null,
        ];

        if (auth()->check()) {
            $payload['owner_id'] = auth()->id();
        }

        $ticket = Ticket::create($payload);

        TicketCreatedEvent::dispatch($ticket);

        $this->redirect('/'.app()->getLocale().'/tests/segnalazione-04-conferma');
    }

    /**
     * @return array<string, string>
     */
    public function getIssueTypeOptions(): array
    {
        $issueTypes = $this->blockData['issue_types'] ?? null;

        if (is_array($issueTypes) && $issueTypes !== []) {
            $options = [];

            foreach ($issueTypes as $key => $label) {
                if (is_string($key) && is_string($label)) {
                    $options[$key] = $label;

                    continue;
                }

                if (is_string($label)) {
                    $options[$label] = $label;
                }
            }

            if ($options !== []) {
                return $options;
            }
        }

        return [
            'public_damage' => (string) __('fixcity::segnalazione.create_options.public_damage.label'),
            'maintenance' => (string) __('fixcity::segnalazione.create_options.maintenance.label'),
            'urban_decorum' => (string) __('fixcity::segnalazione.create_options.urban_decorum.label'),
        ];
    }

    private function resolveTicketTypeEnumFromKey(string $issueTypeKey): TicketTypeEnum
    {
        $try = TicketTypeEnum::tryFrom($issueTypeKey);
        if ($try !== null) {
            return $try;
        }

        return match ($issueTypeKey) {
            'public_damage' => TicketTypeEnum::ROAD_MAINTENANCE,
            'maintenance' => TicketTypeEnum::COMPLAINT,
            'urban_decorum' => TicketTypeEnum::URBAN_FURNITURE,
            default => TicketTypeEnum::OTHER,
        };
    }

    public function render(): View
    {
        $blockData = $this->blockData;

        return view($this->view, [
            'blockData' => $blockData,
            'pageTitle' => (string) ($blockData['title'] ?? __('fixcity::segnalazione.page.title.label')),
            'pageDescription' => (string) ($blockData['description'] ?? ''),
        ]);
    }
}
