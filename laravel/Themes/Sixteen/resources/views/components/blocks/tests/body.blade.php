@php
$bodyTitle = $body_title ?? 'Contenuto principale';
$bodyText = $body_text ?? 'Questo template e stato instradato nel CMS come sequenza di blocchi riutilizzabili.';
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-5xl px-4 pb-12 sm:px-6 lg:px-8 lg:pb-16">
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">{{ $bodyTitle }}</h2>
            <p class="mt-4 text-sm leading-7 text-slate-600">{{ $bodyText }}</p>
        </div>
    </div>
</section>
