<?php

declare(strict_types=1);

namespace Modules\Fixcity\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Illuminate\Contracts\View\View;
use Modules\Fixcity\Events\TicketCreatedEvent;
use Modules\Fixcity\Models\Ticket;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Widget frontoffice per creazione Ticket in 3 step.
 *
 * Step 1: Privacy - accettazione informativa
 * Step 2: Dati - luogo, tipo, titolo, dettagli, immagini, autore
 * Step 3: Riepilogo - revisione + submit → redirect a /tests/segnalazione-04-conferma
 *
 * Nota: la pagina 04-conferma NON fa parte del wizard, è una pagina separata
 * raggiunta via redirect dopo il submit al Step 3.
 *
 * Navigazione step via stato Livewire puro ($currentStep).
 * Nessun Filament Schema component: parità HTML Design Comuni.
 * Translations: fixcity::segnalazione.steps.<item>.<tipo>
 */
class CreateTicketWizardWidget extends XotBaseWidget
{
    protected string $view = 'fixcity::filament.widgets.ticket-create-wizard';

    protected int|string|array $columnSpan = 'full';

    public int $currentStep = 1;

    /** @var array<string, mixed> */
    public array $blockData = [];

    // Step 1: Privacy
    public bool $privacyAccepted = false;

    // Step 2: Dati segnalazione
    public string $address = '';

    public string $issueType = '';

    public string $title = '';

    public string $details = '';

    public string $email = '';

    /** @var array<int, string> */
    public array $images = [];

    // Step 2: Autore (se non autenticato)
    public string $userName = '';

    public string $userFiscalCode = '';

    public string $userPhone = '';

    /** @param array<string, mixed> $blockData */
    public function mount(array $blockData = []): void
    {
        $this->blockData = $blockData;
    }

    /**
     * @return array<string, Component>
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

    public function removeImage(int $index): void
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    /**
     * Stub per upload immagini via Alpine.js.
     * L'upload effettivo avviene lato client; i path vengono passati tramite $wire.set().
     */
    public function handleImageUpload(): void
    {
        // Implementazione futura: usare Livewire TemporaryUploadedFile
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
            'userName' => ['nullable', 'string', 'max:255'],
            'userFiscalCode' => ['nullable', 'string', 'max:16'],
            'userPhone' => ['nullable', 'string', 'max:20'],
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
