@php
$steps = $steps ?? [];
@endphp

@if(! empty($steps))
<section class="bg-white">
    <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid gap-3 sm:grid-cols-3">
            @foreach($steps as $index => $step)
                <div class="rounded-2xl border border-emerald-100 bg-white p-4 shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-emerald-600 text-sm font-semibold text-white">{{ $index + 1 }}</span>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $step['title'] ?? '' }}</p>
                            <p class="text-xs text-slate-500">{{ $step['description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
