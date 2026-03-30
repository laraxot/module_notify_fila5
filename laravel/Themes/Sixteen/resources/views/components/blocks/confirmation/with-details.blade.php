{{--
|--------------------------------------------------------------------------
| Confirmation Block - With Details
|--------------------------------------------------------------------------
|
| Usage:
|   <x-blocks.confirmation.with-details
|       title="Appuntamento Confermato"
|       message="Il tuo appuntamento è stato confermato."
|       :details="[
|           'Data' => '30 Marzo 2026',
|           'Ora' => '10:00',
|           'Luogo' => 'Ufficio Anagrafe'
|       ]"
|   />
|
| Props:
|   - title: string - Titolo della conferma
|   - message: string - Messaggio di conferma
|   - details: array - Dettagli dell'appuntamento/operazione
|   - icon: string - Tipo icona (check, info, warning, error)
|
| References:
|   - Flowbite: Cards with content
|   - Tailwind Plus: Confirmation pages
|   - DaisyUI: Card
|   - Bootstrap Italia: Card, Alert
|
--}}

@props([
    'title' => 'Appuntamento Confermato',
    'message' => 'Il tuo appuntamento è stato confermato.',
    'details' => [],
    'icon' => 'check',
])

<div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto" role="alert" aria-live="polite">
    {{-- Icon + Title Section --}}
    <div class="text-center mb-6">
        {{-- Icon Container --}}
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4
            @if($icon === 'check') bg-green-100
            @elseif($icon === 'info') bg-blue-100
            @elseif($icon === 'warning') bg-yellow-100
            @elseif($icon === 'error') bg-red-100
            @else bg-gray-100
            @endif">
            
            {{-- Check Icon --}}
            @if($icon === 'check')
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            
            {{-- Info Icon --}}
            @elseif($icon === 'info')
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            
            {{-- Warning Icon --}}
            @elseif($icon === 'warning')
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            
            {{-- Error Icon --}}
            @elseif($icon === 'error')
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            
            {{-- Default Icon --}}
            @else
                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            @endif
        </div>
        
        {{-- Title --}}
        <h2 class="text-2xl font-bold text-gray-900">
            {{ $title }}
        </h2>
        
        {{-- Message --}}
        @if($message)
        <p class="text-gray-600 mt-2">
            {{ $message }}
        </p>
        @endif
    </div>
    
    {{-- Details Box --}}
    @if($details && count($details) > 0)
    <div class="bg-gray-50 rounded-lg p-6" aria-label="Dettagli dell'appuntamento">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">
            Dettagli Appuntamento
        </h3>
        <dl class="space-y-3">
            @foreach($details as $label => $value)
                <div class="flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">
                        {{ $label }}
                    </dt>
                    <dd class="text-gray-900 font-semibold text-right ml-4">
                        {{ $value }}
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
    @endif
</div>
