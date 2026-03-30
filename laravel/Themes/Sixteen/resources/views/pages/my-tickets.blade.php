<?php

declare(strict_types=1);

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Modules\Fixcity\Models\Ticket;
use Modules\Fixcity\Enums\TicketStatusEnum;
use Illuminate\Database\Eloquent\Collection;

name('my-tickets');
middleware(['auth', 'verified']);

new class extends Component
{
    public string $search = '';
    public ?string $statusFilter = null;

    public function getTicketsProperty(): Collection
    {
        return Ticket::query()
            ->where('owner_id', auth()->id())
            ->when($this->search, fn($query) => $query->where('name', 'like', "%{$this->search}%"))
            ->when($this->statusFilter, fn($query) => $query->where('status', $this->statusFilter))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getStatsProperty(): array
    {
        $baseQuery = Ticket::where('owner_id', auth()->id());
        return [
            'total' => (clone $baseQuery)->count(),
            'pending' => (clone $baseQuery)->where('status', TicketStatusEnum::PENDING)->count(),
            'resolved' => (clone $baseQuery)->where('status', TicketStatusEnum::RESOLVED)->count(),
        ];
    }
};
?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Le mie Segnalazioni') }}
        </h2>
    </x-slot>

    @volt('my-tickets')
        <div class="container mx-auto px-4 py-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                            <x-heroicon-o-document-text class="w-6 h-6" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">{{ __('Totali') }}</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $this->stats['total'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                            <x-heroicon-o-clock class="w-6 h-6" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">{{ __('In Sospeso') }}</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $this->stats['pending'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                            <x-heroicon-o-check-circle class="w-6 h-6" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">{{ __('Risolte') }}</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $this->stats['resolved'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white rounded-lg shadow-sm border">
                <!-- Filters -->
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="relative flex-1 max-w-md">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <x-heroicon-o-magnifying-glass class="h-5 w-5 text-gray-400" />
                            </span>
                            <input wire:model.live="search" type="text" placeholder="{{ __('Cerca tra le tue segnalazioni...') }}" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex items-center space-x-2">
                            <select wire:model.live="statusFilter" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option value="">{{ __('Tutti gli stati') }}</option>
                                @foreach(TicketStatusEnum::cases() as $status)
                                    <option value="{{ $status->value }}">{{ $status->getLabel() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Ticket List -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Oggetto') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Data') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Stato') }}</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{ __('Azioni') }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($this->tickets as $ticket)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                                    @php $icon = $ticket->type?->getIcon() ?? 'heroicon-o-document-text' @endphp
                                                    <x-dynamic-component :component="$icon" class="w-6 h-6" />
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $ticket->name }}</div>
                                                <div class="text-sm text-gray-500">{{ Str::limit($ticket->content, 50) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $ticket->created_at?->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $ticket->status?->getColorClass() ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $ticket->status?->getLabel() ?? __('Sconosciuto') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">{{ __('Dettagli') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <x-heroicon-o-inbox class="w-12 h-12 text-gray-300 mb-4" />
                                            <p class="text-gray-500 text-lg">{{ __('Non hai ancora inviato alcuna segnalazione.') }}</p>
                                            <a href="{{ url('/segnalazioni/create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                <x-heroicon-o-plus class="w-4 h-4 mr-2" />
                                                {{ __('Invia la tua prima segnalazione') }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endvolt
</x-layouts.app>
