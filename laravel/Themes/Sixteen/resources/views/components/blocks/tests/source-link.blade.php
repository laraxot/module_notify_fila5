@props(['title' => 'Sorgente di riferimento', 'url' => '#', 'label' => '', 'text' => ''])
<section class="py-8 bg-white">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-semibold text-slate-900">{{ $title }}</h2>
            <a href="{{ $url }}" class="mt-3 inline-flex text-blue-700 underline underline-offset-4" target="_blank" rel="noreferrer">
                {{ $label ?: $text ?: $url }}
            </a>
        </div>
    </div>
</section>
