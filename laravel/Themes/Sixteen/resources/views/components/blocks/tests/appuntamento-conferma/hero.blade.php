@php
$eyebrow = $eyebrow ?? 'Design Comuni / Test';
$title = $title ?? 'Appuntamento confermato';
$description = $description ?? 'La prenotazione e stata registrata correttamente e viene pubblicata tramite blocchi CMS.';
$badge = $badge ?? 'Operazione completata';
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-5xl px-4 pt-12 sm:px-6 lg:px-8 lg:pt-16">
        <div class="rounded-[2rem] border border-emerald-200 bg-emerald-50 p-8 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-emerald-700">{{ $eyebrow }}</p>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">{{ $title }}</h1>
                    <p class="mt-4 text-base leading-7 text-slate-700">{{ $description }}</p>
                </div>
                <div class="inline-flex items-center rounded-full bg-white px-4 py-2 text-sm font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-200">
                    {{ $badge }}
                </div>
            </div>
        </div>
    </div>
</section>
