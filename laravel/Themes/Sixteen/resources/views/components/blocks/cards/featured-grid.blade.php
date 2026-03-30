@props([
    'title' => 'In evidenza',
    'items' => [],
])

<section class="bg-white py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">{{ $title }}</h2>
        <div class="mt-8 grid gap-6 md:grid-cols-3">
            @foreach($items as $item)
                <a href="{{ $item['href'] ?? '#' }}" class="group relative overflow-hidden rounded-2xl bg-slate-900 shadow-sm">
                    @if(!empty($item['image']))
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] ?? '' }}" class="h-52 w-full object-cover opacity-80 transition duration-300 group-hover:scale-105 group-hover:opacity-90">
                    @else
                        <div class="h-52 w-full bg-gradient-to-br from-emerald-700 to-emerald-900"></div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-5">
                        <h3 class="text-xl font-semibold text-white">{{ $item['title'] ?? '' }}</h3>
                        @if(!empty($item['description']))
                            <p class="mt-2 text-sm leading-6 text-slate-200">{{ $item['description'] }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
