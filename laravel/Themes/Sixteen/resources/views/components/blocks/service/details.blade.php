@props(['title' => '', 'sections' => []])
<section class="py-10 bg-white">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-slate-900">{{ $title }}</h2>
        <div class="mt-6 space-y-6">
            @foreach($sections as $section)
                <article class="rounded-2xl border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-900">{{ $section['title'] ?? 'Sezione' }}</h3>
                    <div class="mt-3 text-slate-700">{!! $section['content'] ?? '' !!}</div>
                </article>
            @endforeach
        </div>
    </div>
</section>
