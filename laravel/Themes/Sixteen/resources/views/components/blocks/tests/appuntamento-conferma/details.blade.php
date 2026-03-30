@php
$title = $title ?? "Riepilogo dell'appuntamento";
$details = $details ?? [];
@endphp

@if(! empty($details))
<section class="bg-slate-50">
    <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-8">
            <h2 class="text-xl font-semibold text-slate-900">{{ $title }}</h2>
            <dl class="mt-6 space-y-4">
                @foreach($details as $label => $value)
                    <div class="grid gap-1 border-b border-slate-200 pb-4 sm:grid-cols-[180px_1fr] sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">{{ $label }}</dt>
                        <dd class="text-sm font-semibold text-slate-900">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
@endif
