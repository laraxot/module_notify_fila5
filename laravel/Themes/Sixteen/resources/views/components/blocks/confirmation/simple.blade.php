{{--
|--------------------------------------------------------------------------
| Confirmation Block - Simple
|--------------------------------------------------------------------------
|
| Usage:
|   <x-blocks.confirmation.simple
|       title="Appuntamento Confermato"
|       message="Il tuo appuntamento è stato confermato."
|       icon="check"
|   />
|
| Props:
|   - title: string - Titolo della conferma
|   - message: string - Messaggio di conferma
|   - icon: string - Tipo icona (check, info, warning, error)
|
| References:
|   - Flowbite: Alert components
|   - DaisyUI: Alert
|   - Bootstrap Italia: Alert
|
--}}

@props([
    'title' => 'Operazione Completata',
    'message' => 'La tua richiesta è stata elaborata con successo.',
    'icon' => 'check',
])

<div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto text-center" role="alert" aria-live="polite">
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
    <h2 class="text-2xl font-bold text-gray-900 mb-2">
        {{ $title }}
    </h2>
    
    {{-- Message --}}
    <p class="text-gray-600">
        {{ $message }}
    </p>
</div>
