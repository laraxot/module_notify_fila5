@props(['title' => 'Nota di conversione', 'content' => '', 'description' => ''])
<section class="py-8 bg-amber-50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border border-amber-200 bg-white p-6">
            <h2 class="text-xl font-semibold text-slate-900">{{ $title }}</h2>
            <p class="mt-3 text-slate-700">{{ $content ?: $description ?: 'Pagina derivata dal reference statico Design Comuni e mantenuta come baseline di confronto.' }}</p>
        </div>
    </div>
</section>
