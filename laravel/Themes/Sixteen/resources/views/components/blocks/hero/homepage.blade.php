@props(['title' => '', 'subtitle' => '', 'description' => ''])
<section class="bg-gradient-to-b from-slate-900 to-slate-800 py-16 text-white">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        @if($subtitle)
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-200">{{ $subtitle }}</p>
        @endif
        @if($title)
            <h1 class="mt-3 text-4xl font-bold tracking-tight md:text-6xl">{{ $title }}</h1>
        @endif
        @if($description)
            <p class="mt-4 max-w-3xl text-lg text-slate-200">{{ $description }}</p>
        @endif
    </div>
</section>
