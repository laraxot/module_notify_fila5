{{-- Events Calendar - Design Comuni Style (Tailwind CSS) --}}
@props([
    'title' => 'Eventi',
    'month' => '',
    'items' => [],   // [ ['day'=>'15','weekday'=>'lun','events'=>[['title'=>'...','url'=>'...']]] ]
])

<section class="bg-white py-10 lg:py-14">
    <div class="container mx-auto px-4">

        {{-- Intestazione --}}
        <div class="flex flex-col sm:flex-row sm:items-baseline gap-2 mb-8">
            @if($title)
                <h2 class="text-2xl lg:text-3xl font-semibold text-gray-900">{{ $title }}</h2>
            @endif
            @if($month)
                <span class="text-lg text-gray-500 sm:ml-3">{{ $month }}</span>
            @endif
        </div>

        {{-- Desktop: scroll orizzontale a giorni; Mobile: lista verticale --}}

        {{-- Desktop (md+): flex row, overflow-x-auto --}}
        <div class="hidden md:flex gap-4 overflow-x-auto pb-4">
            @foreach($items as $day)
                <div class="min-w-[160px] flex-shrink-0 bg-gray-50 rounded border border-gray-200 overflow-hidden">
                    {{-- Header giorno --}}
                    <div class="bg-blue-700 text-white px-4 py-3 text-center">
                        <span class="block text-2xl font-bold leading-none">{{ $day['day'] ?? '' }}</span>
                        <span class="block text-xs uppercase tracking-wider mt-1">{{ $day['weekday'] ?? '' }}</span>
                    </div>
                    {{-- Lista eventi del giorno --}}
                    <ul class="divide-y divide-gray-200">
                        @forelse($day['events'] ?? [] as $event)
                            <li>
                                <a href="{{ $event['url'] ?? '#' }}"
                                   class="flex items-start gap-2 px-3 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:bg-blue-50 transition-colors">
                                    @if(!empty($event['image']))
                                        <img src="{{ $event['image'] }}"
                                             alt=""
                                             class="w-8 h-8 rounded object-cover flex-shrink-0 mt-0.5" />
                                    @else
                                        <x-filament::icon icon="heroicon-o-calendar-days" class="w-4 h-4 flex-shrink-0 mt-0.5 text-blue-600" />
                                    @endif
                                    <span class="leading-snug">{{ $event['title'] ?? '' }}</span>
                                </a>
                            </li>
                        @empty
                            <li class="px-3 py-3 text-xs text-gray-400 italic">Nessun evento</li>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>

        {{-- Mobile: lista verticale --}}
        <div class="flex flex-col gap-4 md:hidden">
            @foreach($items as $day)
                <div class="bg-gray-50 rounded border border-gray-200 overflow-hidden">
                    {{-- Header giorno --}}
                    <div class="bg-blue-700 text-white px-4 py-2 flex items-center gap-3">
                        <span class="text-xl font-bold">{{ $day['day'] ?? '' }}</span>
                        <span class="text-sm uppercase tracking-wider">{{ $day['weekday'] ?? '' }}</span>
                    </div>
                    {{-- Lista eventi --}}
                    <ul class="divide-y divide-gray-200">
                        @forelse($day['events'] ?? [] as $event)
                            <li>
                                <a href="{{ $event['url'] ?? '#' }}"
                                   class="flex items-start gap-2 px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 focus:outline-none transition-colors">
                                    <x-filament::icon icon="heroicon-o-calendar-days" class="w-4 h-4 flex-shrink-0 mt-0.5 text-blue-600" />
                                    <span>{{ $event['title'] ?? '' }}</span>
                                </a>
                            </li>
                        @empty
                            <li class="px-4 py-3 text-xs text-gray-400 italic">Nessun evento</li>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>

    </div>
</section>
