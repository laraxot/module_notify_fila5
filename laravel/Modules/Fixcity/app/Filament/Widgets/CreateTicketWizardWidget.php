<?php

declare(strict_types=1);

namespace Modules\Fixcity\Filament\Widgets;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget as BaseWidget;
use Illuminate\Contracts\View\View;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Fixcity\Events\TicketCreatedEvent;
use Modules\Fixcity\Models\Ticket;

/**
 * Widget frontoffice per creazione Ticket in 3 step.
 *
 * Step 1: Privacy - accettazione informativa
 * Step 2: Dati - luogo, tipo, titolo, dettagli, immagini, info utente
 * Step 3: Riepilogo - revisione + submit → redirect a conferma
 *
 * NON usa Filament Schemas Wizard (asset JS non disponibili nel frontoffice).
 * Navigazione step via stato Livewire puro ($currentStep).
 */
class CreateTicketWizardWidget extends BaseWidget implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

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

    /** @var array<int, string> */
    public array $images = [];

    // User info
    public string $userName = '';

    public string $userFiscalCode = '';

    public string $userPhone = '';

    /** @param array<string, mixed> $blockData */
    public function mount(array $blockData = []): void
    {
        $this->blockData = $blockData;
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
                'details' => ['required', 'string', 'max:200'],
                'email' => ['nullable', 'email', 'max:255'],
                'images.*' => ['nullable', 'image', 'max:5120'],
                'userName' => ['nullable', 'string', 'max:255'],
                'userFiscalCode' => ['nullable', 'string', 'max:16'],
                'userPhone' => ['nullable', 'string', 'max:20'],
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

    /**
     * Handles image uploads from the file input.
     * Called via wire:change on the file input element.
     */
    public function updatedImages(mixed $value): void
    {
        if ($value instanceof UploadedFile) {
            $path = $value->store('tickets/images', 'public');
            $this->images[] = $path;
        } elseif (is_array($value)) {
            foreach ($value as $file) {
                if ($file instanceof UploadedFile) {
                    $path = $file->store('tickets/images', 'public');
                    $this->images[] = $path;
                }
            }
        }
    }

    /**
     * Handles multiple image uploads from file input change event.
     *
     * @param  array<int, mixed>  $files
     */
    public function handleImageUpload(array $files): void
    {
        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                $path = $file->store('tickets/images', 'public');
                $this->images[] = $path;
            }
        }
    }

    public function removeImage(int $index): void
    {
        if (isset($this->images[$index])) {
            $path = $this->images[$index];
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            unset($this->images[$index]);
            $this->images = array_values($this->images);
        }
    }

    public function submit(): void
    {
        $this->validate([
            'privacyAccepted' => ['accepted'],
            'address' => ['required', 'string', 'max:255'],
            'issueType' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:200'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        $imagePaths = [];
        foreach ($this->images as $uploadedPath) {
            $imagePaths[] = $uploadedPath;
        }

        $ticket = Ticket::create([
            'address' => $this->address,
            'issue_type' => $this->issueType,
            'title' => $this->title,
            'details' => $this->details,
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
        return view('fixcity::filament.widgets.ticket-create-wizard', [
            'issueTypeOptions' => $this->getIssueTypeOptions(),
            'steps' => [
                (string) __('fixcity::segnalazione.steps.privacy.label'),
                (string) __('fixcity::segnalazione.steps.data.label'),
                (string) __('fixcity::segnalazione.steps.summary.label'),
            ],
        ]);
    }
}
