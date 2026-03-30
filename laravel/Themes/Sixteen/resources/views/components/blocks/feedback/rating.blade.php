@props([
    'title' => 'Quanto sono chiare le informazioni su questa pagina?',
    'description' => 'Il tuo feedback ci aiuta a migliorare il servizio.',
])

<section class="bg-emerald-700 py-10 lg:py-12">
    <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white">{{ $title }}</h2>
        <p class="mt-3 text-sm leading-6 text-emerald-50">{{ $description }}</p>
        <div class="mt-6 flex items-center justify-center gap-2">
            @for($i = 0; $i < 5; $i++)
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/15 text-yellow-300 ring-1 ring-inset ring-white/20">★</span>
            @endfor
        </div>
    </div>
</section>
