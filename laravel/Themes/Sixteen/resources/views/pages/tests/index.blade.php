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
            $manifestPath = config_path('local/fixcity/database/content/pages/');
            $manifestFiles = glob($manifestPath.'tests.*.json');
            
            $manifest = [];
            foreach($manifestFiles as $file) {
                $content = file_get_contents($file);
                $data = json_decode($content, true);
                if($data) {
                    $slug = str_replace('tests.', '', basename($file, '.json'));
                    $manifest[$slug] = $data;
                }
            }
            
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
        
        {{-- Pages by Category --}}
        @foreach($grouped as $category => $pages)
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4 text-italia-blue-500">
                    {{ $category }}
                </h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($pages as $slug => $info)
                        <li>
                            <a href="/it/tests/{{ $slug }}" 
                               class="flex items-center p-3 rounded border bg-gray-50 border-gray-200 hover:bg-gray-100 transition-colors">
                                <span class="text-italia-blue-500 mr-2">→</span>
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
    </div>
</div>

<x-section slug="footer" />
@endsection
