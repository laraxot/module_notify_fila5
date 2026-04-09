<?php

declare(strict_types=1);

namespace Modules\Fixcity\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget as BaseWidget;
use Illuminate\Contracts\View\View;
use Modules\Fixcity\Events\TicketCreatedEvent;
use Modules\Fixcity\Models\Ticket;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Widget frontoffice per creazione Ticket in 3 step.
 *
 * Step 1: Privacy - accettazione informativa
 * Step 2: Dati - luogo, tipo, titolo, dettagli, email
 * Step 3: Riepilogo - revisione + submit → redirect a conferma
 *
 * Estende XotBaseWidget seguendo le regole Laraxot.
 * Navigazione step via stato Livewire puro ($currentStep) per compatibilità frontoffice.
 */
class CreateTicketWizardWidget extends XotBaseWidget
{
    protected string $view = 'fixcity::filament.widgets.ticket-create-wizard';

    protected int|string|array $columnSpan = 'full';

    public int $currentStep = 1;

    /** @var array<string, mixed> */
    public array $blockData = [];

    public bool $privacyAccepted = false;

    public string $address = '';

    public string $issueType = '';

    public string $title = '';

    public string $details = '';

    public string $email = '';

    /** @param array<string, mixed> $blockData */
    public function mount(array $blockData = []): void
    {
        $this->blockData = $blockData;
        $this->data = $this->getFormFill();
    }

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    public function getFormSchema(): array
    {
        return []; // Gestito manualmente nella vista per parità HTML Design Comuni
    }

    public function nextStep(): void
    {
        if ($this->currentStep === 1) {
            $this->validate(['privacyAccepted' => ['accepted']]);
        } elseif ($this->currentStep === 2) {
            $this->validate([
                'address' => ['required', 'string', 'max:255'],
                'issueType' => ['required', 'string'],
                'title' => ['required', 'string', 'max:255'],
                'details' => ['required', 'string'],
                'email' => ['nullable', 'email', 'max:255'],
            ]);
        }

        if ($this->currentStep < 3) {
            $this->currentStep++;
        }
    }

    public function prevStep(): void
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit(): void
    {
        $this->validate([
            'privacyAccepted' => ['accepted'],
            'address' => ['required', 'string', 'max:255'],
            'issueType' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        $ticket = Ticket::create([
            'name' => $this->title,
            'content' => $this->details,
            'type' => $this->issueType,
            'address' => $this->address,
            'email' => $this->email !== '' ? $this->email : null,
        ]);

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

    public function render(): View
    {
        return view($this->view, [
            'issueTypeOptions' => $this->getIssueTypeOptions(),
            'steps' => [
                (string) __('fixcity::segnalazione.steps.privacy.label'),
                (string) __('fixcity::segnalazione.steps.data.label'),
                (string) __('fixcity::segnalazione.steps.summary.label'),
            ],
        ]);
    }
}
