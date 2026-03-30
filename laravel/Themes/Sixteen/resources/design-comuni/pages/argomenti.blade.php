{{--
    Design Comuni - Pagina Argomenti
    Source: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html
    Category: Generali
    
    NOTE:
    - Header e Footer sono sezioni richiamate con <x-section slug="header" />
    - Componenti si registrano con namespace pub_theme::
    - CSS: Tailwind CSS 4 (design-comuni.css) - NO Bootstrap
--}}

@extends('pub_theme::layouts.app')

@section('title', 'Argomenti - ' . config('comune.nome', 'Nome Comune'))

@section('content')

{{-- Header Section --}}
<x-section slug="header" />
{{-- Breadcrumb --}}
<div class="container" id="main-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <nav class="cmp-breadcrumbs" role="navigation" aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('comune.homepage') }}">Home</a>
                        <span class="separator">/</span>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Lista Argomenti</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

{{-- Hero Section --}}
<div class="container">
    <div class="row justify-content-center row-shadow">
        <div class="col-12 col-lg-10">
            <div class="cmp-hero">
                <section class="it-hero-wrapper bg-white align-items-start">
                    <div class="it-hero-text-wrapper pt-0 ps-0 pb-4 pb-lg-60">
                        <h1 class="text-black" data-element="page-name">Argomenti</h1>
                        <p class="text-black">Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti del sito istituzionale per tematiche e aiutano l'utente ad orientarsi nella ricerca di informazioni e servizi.</p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

{{-- Argomenti Grid --}}
<div class="container my-4">
    <div class="row justify-content-center row-shadow">
        <div class="col-12 col-lg-10">
            <div class="cmp-card-simple">
                <div class="card-wrapper card-space">
                    <div class="card card-bg no-after">
                        <div class="card-body">
                            <div class="row">
                                @foreach($argomenti ?? [] as $argomento)
                                <div class="col-lg-4 col-md-6 p-3">
                                    <div class="cmp-card-simple-card">
                                        <a href="{{ route('comune.argomento', $argomento['slug']) }}" class="text-decoration-none">
                                            <div class="card shadow-sm rounded">
                                                <div class="card-body">
                                                    <h3 class="card-title h5">{{ $argomento['nome'] }}</h3>
                                                    <p class="card-text text-muted">{{ $argomento['descrizione'] ?? '' }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer Section --}}
<x-section slug="footer" />

@endsection

{{-- 
NOTE: Il CSS Tailwind è già incluso in app.css
Non serve aggiungere @vite per CSS separati
--}}
