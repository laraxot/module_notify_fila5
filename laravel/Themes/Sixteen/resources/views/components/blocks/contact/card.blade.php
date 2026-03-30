@props([
    'title' => 'Contatta il Comune',
    'description' => 'Hai bisogno di supporto? Scrivi o chiama l\'ufficio competente.',
    'items' => [],
])

<section class="bg-white py-12 lg:py-16">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm">
            <div class="max-w-2xl">
                <h2 class="text-2xl font-bold text-slate-900">{{ $title }}</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $description }}</p>
            </div>
            <dl class="mt-8 grid gap-6 md:grid-cols-3">
                @foreach($items as $item)
                    <div class="rounded-2xl bg-white p-5 ring-1 ring-inset ring-slate-200">
                        <dt class="text-sm font-semibold uppercase tracking-wide text-emerald-700">{{ $item['label'] ?? '' }}</dt>
                        <dd class="mt-2 text-sm leading-6 text-slate-700">{{ $item['value'] ?? '' }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
