{{--
    Design Comuni - Pagina Argomenti
    Template: Bootstrap Italia HTML-identical
    Source: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html
--}}

@extends('pub_theme::layouts.app')

@section('title', 'Argomenti - Il mio Comune')

@section('body_class', 'cmp-argomenti-page')

@section('content')

{{-- Skip Links --}}
<div class="skiplink">
    <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
    <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
</div>

{{-- Header Component --}}
@include('pub_theme::bootstrap-italia.header')

{{-- Main Content --}}
<main>
    {{-- Breadcrumb Section --}}
    <div class="container" id="main-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="cmp-breadcrumbs" role="navigation">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb p-0" data-element="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/it/tests/homepage">Home</a>
                                <span class="separator">/</span>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Lista Argomenti
                            </li>
                        </ol>
                    </nav>
                </div>
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
                            <div class="hero-text">
                                <p>Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti del sito istituzionale per
                                temi e rappresentano le principali categorie di contenuti, informazioni e documenti specifici.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content Section --}}
    <div class="container py-5">
        <h2 class="title-xxlarge mb-4">In evidenza</h2>
        <div class="row g-4">
            @foreach($argomenti ?? [] as $argomento)
            <div class="col-sm-6 col-lg-4">
                <div class="it-grid-item-wrapper it-grid-item-overlay">
                    <a href="{{ route('comune.argomento', $argomento['slug']) }}" class="text-decoration-none">
                        <div class="card card-bg card-teaser shadow">
                            <div class="card-body">
                                <div class="category-top">
                                    <span class="text">Argomento</span>
                                </div>
                                <h3 class="card-title h5">{{ $argomento['nome'] }}</h3>
                                <p class="card-text">{{ $argomento['descrizione'] ?? '' }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- All Topics Section --}}
    <div class="container my-5">
        <h2 class="title-xxlarge mb-4">Tutti gli argomenti</h2>
        <div class="row g-4">
            @foreach($argomenti ?? [] as $argomento)
            <div class="col-12">
                <div class="card card-teaser shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="{{ route('comune.argomento', $argomento['slug']) }}" class="text-decoration-none">
                                {{ $argomento['nome'] }}
                            </a>
                        </h3>
                        <p class="card-text">{{ $argomento['descrizione'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

{{-- Footer Component --}}
@include('pub_theme::footer-comune')

@endsection

@push('scripts')
{{-- Bootstrap Italia JS --}}
<script src="/themes/sixteen/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
@endpush
