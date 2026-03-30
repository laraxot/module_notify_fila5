@php
$title = $title ?? 'Pagina di test';
$summary = $summary ?? 'Template Design Comuni convertito nel runtime CMS.';
$category = $category ?? 'Design Comuni';
$slug = $slug ?? null;
@endphp

<section class="bg-slate-50">
    <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-sky-700">{{ $category }}</p>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">{{ $title }}</h1>
                    <p class="mt-4 text-base leading-7 text-slate-600">{{ $summary }}</p>
                </div>
                @if($slug)
                    <div class="inline-flex items-center rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 ring-1 ring-inset ring-slate-200">{{ $slug }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
