@props(['title' => '', 'steps' => []])
<section class="py-10 bg-white">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        @if($title)
            <h2 class="text-2xl font-semibold text-slate-900">{{ $title }}</h2>
        @endif
        <ol class="mt-6 grid gap-4 md:grid-cols-3">
            @foreach($steps as $step)
                <li class="rounded-2xl border border-slate-200 p-6">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-sm font-bold text-white">
                        {{ $step['number'] ?? $loop->iteration }}
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">{{ $step['title'] ?? 'Passo' }}</h3>
                    @if(! empty($step['description']))
                        <p class="mt-2 text-slate-600">{{ $step['description'] }}</p>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</section>
