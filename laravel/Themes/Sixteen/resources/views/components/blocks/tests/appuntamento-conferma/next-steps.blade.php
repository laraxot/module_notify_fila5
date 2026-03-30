@php
$title = $title ?? 'Prossimi passi';
$items = $items ?? [];
$primary_action = $primary_action ?? null;
$secondary_action = $secondary_action ?? null;
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-5xl px-4 pb-12 sm:px-6 lg:px-8 lg:pb-16">
        <aside class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm lg:ml-auto lg:max-w-xl">
            <h2 class="text-lg font-semibold text-slate-900">{{ $title }}</h2>
            @if(! empty($items))
                <ul class="mt-5 space-y-4 text-sm leading-6 text-slate-600">
                    @foreach($items as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-8 flex flex-col gap-3">
                @if(is_array($primary_action))
                    <a href="{{ $primary_action['url'] ?? '#' }}" class="inline-flex items-center justify-center rounded-full bg-sky-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-800">{{ $primary_action['label'] ?? 'Apri' }}</a>
                @endif
                @if(is_array($secondary_action))
                    <a href="{{ $secondary_action['url'] ?? '#' }}" class="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">{{ $secondary_action['label'] ?? 'Apri' }}</a>
                @endif
            </div>
        </aside>
    </div>
</section>
