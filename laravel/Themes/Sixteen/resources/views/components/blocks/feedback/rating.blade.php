@props(['title' => 'Valuta la pagina'])
<section class="py-10 bg-white">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
            <h2 class="text-xl font-semibold text-slate-900">{{ $title }}</h2>
            <p class="mt-2 text-slate-600">Il contenuto ti e stato utile?</p>
            <div class="mt-4 flex gap-3">
                @for($i = 1; $i <= 5; $i++)
                    <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-700 transition hover:border-blue-600 hover:text-blue-600" aria-label="Valutazione {{ $i }} su 5">
                        {{ $i }}
                    </button>
                @endfor
            </div>
        </div>
    </div>
</section>
