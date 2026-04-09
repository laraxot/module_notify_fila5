@props(['data' => []])

<div class="segnalazione-crea-wrapper">
    @livewire(\Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget::class, ['blockData' => $data])
</div>
