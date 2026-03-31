@props(['title' => '', 'subtitle' => '', 'description' => '', 'date' => '', 'category' => ''])
<section class="py-12 bg-white">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-3 text-sm text-slate-500">
            @if($category)<span>{{ $category }}</span>@endif
            @if($date)<span>{{ $date }}</span>@endif
        </div>
        <h1 class="mt-3 text-4xl font-bold text-slate-900">{{ $title }}</h1>
        @if($subtitle)
            <p class="mt-3 text-lg font-medium text-slate-700">{{ $subtitle }}</p>
        @endif
        @if($description)
            <p class="mt-4 text-lg text-slate-600">{{ $description }}</p>
        @endif
    </div>
</section>
