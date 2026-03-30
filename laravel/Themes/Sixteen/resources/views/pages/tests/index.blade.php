{{--
    Design Comuni Test Pages - Index
    Route: /it/tests
--}}

@extends('pub_theme::layouts.app')

@section('title', 'Design Comuni Test Pages - Index')

@section('content')
<x-section slug="header" />

<div class="container mx-auto py-12">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-4xl font-bold mb-6 text-italia-blue-500">
            Design Comuni Test Pages
        </h1>
        
        <p class="text-lg text-gray-700 mb-8">
            Pagine di test per il design system Bootstrap Italia convertito a Tailwind CSS 4.
            Tutte le pagine sono accessibili tramite route dinamica <code class="bg-gray-100 px-2 py-1 rounded">/it/tests/{slug}</code>.
        </p>
        
        @php
            $manifestPath = theme_path('resources/design-comuni/manifest.php');
            $manifest = file_exists($manifestPath) ? include $manifestPath : [];
            
            // Count by status
            $completed = collect($manifest)->filter(fn($info) => ($info['status'] ?? 'todo') === 'completed')->count();
            $todo = count($manifest) - $completed;
            
            // Group by category
            $grouped = [];
            foreach($manifest as $slug => $info) {
                $category = $info['category'] ?? 'Other';
                if(!isset($grouped[$category])) {
                    $grouped[$category] = [];
                }
                $grouped[$category][$slug] = $info;
            }
        @endphp
        
        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-3xl font-bold text-italia-blue-500">{{ count($manifest) }}</div>
                <div class="text-gray-600">Totale Pagine</div>
            </div>
            <div class="bg-green-50 rounded-lg shadow p-6">
                <div class="text-3xl font-bold text-green-600">{{ $completed }}</div>
                <div class="text-gray-600">Completate</div>
            </div>
            <div class="bg-gray-50 rounded-lg shadow p-6">
                <div class="text-3xl font-bold text-gray-600">{{ $todo }}</div>
                <div class="text-gray-600">Da Fare</div>
            </div>
        </div>
        
        {{-- Pages by Category --}}
        @foreach($grouped as $category => $pages)
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4 text-italia-blue-500">
                    {{ $category }}
                </h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($pages as $slug => $info)
                        @php
                            $isCompleted = ($info['status'] ?? 'todo') === 'completed';
                        @endphp
                        <li>
                            <a href="/it/tests/{{ $slug }}" 
                               class="flex items-center p-3 rounded border {{ $isCompleted ? 'bg-green-50 border-green-200 hover:bg-green-100' : 'bg-gray-50 border-gray-200 hover:bg-gray-100' }} transition-colors">
                                @if($isCompleted)
                                    <span class="text-green-600 mr-2">✓</span>
                                @else
                                    <span class="text-gray-400 mr-2">○</span>
                                @endif
                                <div>
                                    <div class="font-medium text-italia-blue-500">{{ $info['title'] ?? $slug }}</div>
                                    <div class="text-xs text-gray-500">{{ $slug }}</div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        
        {{-- Documentation --}}
        <div class="bg-italia-blue-50 rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4 text-italia-blue-800">
                📚 Documentazione
            </h3>
            <ul class="space-y-2 text-italia-blue-700">
                <li>
                    <a href="/themes/sixteen/docs/design-comuni/README.md" 
                       class="underline hover:text-italia-blue-600" target="_blank">
                        README.md - Panoramica progetto
                    </a>
                </li>
                <li>
                    <a href="/themes/sixteen/docs/design-comuni/THEME_PLAN.md" 
                       class="underline hover:text-italia-blue-600" target="_blank">
                        THEME_PLAN.md - Piano di lavoro (5 fasi)
                    </a>
                </li>
                <li>
                    <a href="/themes/sixteen/docs/design-comuni/TAILWIND_INTEGRATION_SUMMARY.md" 
                       class="underline hover:text-italia-blue-600" target="_blank">
                        Tailwind Integration - CSS convertito
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<x-section slug="footer" />
@endsection
