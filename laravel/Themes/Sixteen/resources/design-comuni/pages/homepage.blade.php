{{--
    Design Comuni - Homepage
    Source: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html
    Category: Generali
    
    NOTE: Header e Footer sono sezioni richiamate con <x-section slug="header" />
    Componenti si registrano con namespace pub_theme::
--}}

@extends('pub_theme::layouts.app')

@section('title', config('comune.nome', 'Nome Comune'))

@section('content')

{{-- Header Section --}}
<x-section slug="header" />
{{-- Hero Section con News in Evidenza --}}
<section id="head-section">
    <h2 class="visually-hidden">Contenuti in evidenza</h2>
    <div class="container">
        <div class="row">
            {{-- News Principale --}}
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="card mb-5">
                    <div class="card-body pb-5 px-0">
                        <div class="category-top">
                            <svg class="icon icon-sm" aria-hidden="true">
                                <use xlink:href="{{ asset('design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-calendar') }}"></use>
                            </svg>
                            <span class="title-xsmall-semi-bold fw-semibold">Notizie</span>
                            <span class="data fw-normal">18 mag 2022</span>
                        </div>
                        <a href="#" class="text-decoration-none">
                            <h3 class="card-title">Parte l'estate con oltre 300 eventi in centro e nei quartieri, tutti gli eventi previsti</h3>
                        </a>
                        <p class="mb-4 pt-3 lora"><strong>Inaugurazione lunedì 2 luglio</strong> con il concerto gratuito in piazza XX Settembre degli Sweet Soul Music Revue. Sul palco 20 musicisti dal tutto il mondo</p>
                        <a class="chip chip-simple" href="#">
                            <span class="chip-label">Estate in città</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Servizi in Evidenza --}}
            <div class="col-lg-6 order-1 order-lg-2 mb-5">
                <div class="card bg-primary card-thumb mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title h4 text-white">Servizi</h3>
                                <p class="card-text text-white">Accedi ai servizi digitali del Comune</p>
                            </div>
                            <div class="col-4">
                                <svg class="icon icon-white" aria-hidden="true">
                                    <use xlink:href="{{ asset('design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-services') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Amministrazione --}}
                <div class="card bg-secondary card-thumb mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title h4 text-white">Amministrazione</h3>
                                <p class="card-text text-white">Giunta, consiglio, organi di governo</p>
                            </div>
                            <div class="col-4">
                                <svg class="icon icon-white" aria-hidden="true">
                                    <use xlink:href="{{ asset('design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-pa') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Novità --}}
                <div class="card bg-success card-thumb mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title h4 text-white">Novità</h3>
                                <p class="card-text text-white">Comunicati, avvisi e notizie</p>
                            </div>
                            <div class="col-4">
                                <svg class="icon icon-white" aria-hidden="true">
                                    <use xlink:href="{{ asset('design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-info-circle') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Sezione Argomenti --}}
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Esplora per argomenti</h2>
            </div>
        </div>
        <div class="row">
            @foreach($argomenti ?? [] as $argomento)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="{{ route('comune.argomento', $argomento['slug']) }}" class="text-decoration-none">
                                {{ $argomento['nome'] }}
                            </a>
                        </h3>
                        <p class="card-text text-muted small">{{ $argomento['descrizione'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Sezione Servizi --}}
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Servizi in evidenza</h2>
            </div>
        </div>
        <div class="row">
            @foreach($servizi ?? [] as $servizio)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="{{ route('comune.servizio-dettaglio', $servizio['slug']) }}" class="text-decoration-none">
                                {{ $servizio['nome'] }}
                            </a>
                        </h3>
                        <p class="card-text text-muted">{{ $servizio['descrizione'] ?? '' }}</p>
                        <a href="{{ route('comune.servizio-dettaglio', $servizio['slug']) }}" class="btn btn-outline-primary btn-sm">
                            Vai al servizio
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Footer Section --}}
<x-section slug="footer" />

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inizializza componenti Bootstrap Italia
    });
</script>
@endpush
