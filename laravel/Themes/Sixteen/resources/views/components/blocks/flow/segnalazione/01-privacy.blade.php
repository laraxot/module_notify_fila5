<<<<<<< HEAD
@props([
    'title' => 'Informativa privacy',
    'description' => 'Leggi l\'informativa prima di procedere',
    'privacyText' => '',
])

@php
    if (empty($privacyText)) {
        $privacyText = 'I dati personali conferiti con il presente modulo saranno trattati dall\'Ente per le finalità connesse alla gestione della segnalazione. Il conferimento dei dati è obbligatorio per l\'instaurazione e la prosecuzione del rapporto contrattuale; in caso di mancato conferimento non sarà possibile dar corso alla richiesta. Titolare del trattamento è [Nome Ente]. Responsabile della protezione dei dati è [DPO]. I dati saranno conservati per il tempo necessario all\'esecuzione della richiesta e successivamente per gli adempimenti di legge. Gli interessati possono esercitare i diritti di accesso, rettifica, cancellazione, limitazione, opposizione e portabilità rivolgendosi al Titolare.';
    }
@endphp

<div class="step-content mt-8">
    @if($title)
        <h3 class="text-lg font-semibold text-gray-900 mb-4" data-element="step-title">{{ $title }}</h3>
    @endif

    <div class="bg-gray-50 rounded-lg p-6 mb-6">
        <div class="prose prose-sm max-w-none text-gray-600">
            <p>{{ $privacyText }}</p>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex items-start">
            <input 
                type="checkbox" 
                id="consenso_trattamento" 
                x-model="consensoTrattamento"
                class="mt-1 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            >
            <label for="consenso_trattamento" class="ml-2 text-sm text-gray-700">
                Acconsento al trattamento dei miei dati personali per le finalità indicate nell'informativa privacy <span class="text-red-500">*</span>
            </label>
        </div>

        <div class="flex items-start">
            <input 
                type="checkbox" 
                id="consenso_comunicazioni" 
                x-model="consensoComunicazioni"
                class="mt-1 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            >
            <label for="consenso_comunicazioni" class="ml-2 text-sm text-gray-700">
                Acconsento all'invio di comunicazioni relative alla segnalazione via email
            </label>
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <button 
            type="button"
            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
            :disabled="!consensoTrattamento"
            @click="currentStep++"
            data-element="step-next"
        >
            Continua
        </button>
    </div>
</div>
=======
@props(['data' => []])

@php
    $title = $data['title'] ?? __('segnalazione::segnalazione.privacy.title');
    $description = $data['description'] ?? __('segnalazione::segnalazione.privacy.description');
    $nextLabel = $data['next_label'] ?? __('segnalazione::segnalazione.next');
    $nextUrl = $data['next_url'] ?? '/it/tests/segnalazione-02-dati';
    $sprite = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 pb-40 pb-lg-80">
            @if($description)
                <p class="text-paragraph mb-lg-4">
                    {{ $description }}
                </p>
            @endif

            <p class="text-paragraph mb-0">
                {{ __('segnalazione::segnalazione.privacy.details') }}
                <a href="#" class="t-primary">{{ __('segnalazione::segnalazione.privacy.link_label') }}</a>
            </p>

            <div class="form-check mt-4 mb-3 mt-md-40 mb-lg-40" x-data="{ checked: false }">
                <div class="checkbox-body d-flex align-items-center">
                    <input type="checkbox" id="privacy" name="privacy-field" value="privacy-field"
                           x-model="checked" data-element="privacy-consent">
                    <label class="title-small-semi-bold pt-1" for="privacy">
                        {{ __('segnalazione::segnalazione.privacy.accept_label') }}
                    </label>
                </div>
            </div>

            <div class="d-flex gap-3 mt-4">
                <a href="{{ $nextUrl }}"
                   class="btn btn-primary mobile-full"
                   x-data="{ checked: false }"
                   :class="{ 'disabled': !checked }"
                   :disabled="!checked"
                   data-element="step-next">
                    <span>{{ $nextLabel }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey-card shadow-contacts">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3 p-contacts">
                @include('components.blocks.contacts.faq')
            </div>
        </div>
    </div>
</div>
>>>>>>> origin/dev
