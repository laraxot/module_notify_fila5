@php
    $sprite = asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg');
    $news = $news ?? [
        'category' => 'Notizie',
        'date' => '18 mag 2022',
        'title' => "Parte l'estate con oltre 300 eventi in centro e nei quartieri, tutti gli eventi previsti",
        'description' => "Inaugurazione lunedi 2 luglio con il concerto gratuito in piazza XX Settembre degli Sweet Soul Music Revue. Sul palco 20 musicisti dal tutto il mondo",
        'tag' => 'Estate in citta',
        'news_url' => '#',
        'all_news_url' => '#',
    ];
    $image = $image ?? [
        'src' => 'https://picsum.photos/800/600',
        'title' => 'titolo immagine',
        'alt' => 'descrizione immagine',
    ];
@endphp
<section id="head-section">
    <h1 class="visually-hidden" id="main-container">Nome del comune</h1>
    <h2 class="visually-hidden">Contenuti in evidenza</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="card mb-5">
                    <div class="card-body pb-5 px-0">
                        <div class="category-top">
                            <svg class="icon icon-sm" aria-hidden="true">
                                <use xlink:href="{{ $sprite }}#it-calendar"></use>
                            </svg>
                            <span class="title-xsmall-semi-bold fw-semibold">{{ $news['category'] }}</span>
                            <span class="data fw-normal">{{ $news['date'] }}</span>
                        </div>
                        <a href="{{ $news['news_url'] }}" class="text-decoration-none">
                            <h3 class="card-title">{{ $news['title'] }}</h3>
                        </a>
                        <p class="mb-4 pt-3 lora"><strong>Inaugurazione lunedi 2 luglio</strong> con il concerto gratuito in piazza XX Settembre degli Sweet Soul Music Revue. Sul palco 20 musicisti dal tutto il mondo</p>
                        <a class="chip chip-simple" href="{{ $news['news_url'] }}">
                            <span class="chip-label">{{ $news['tag'] }}</span>
                        </a>
                        <a class="read-more pb-3" href="{{ $news['all_news_url'] }}">
                            <span class="text">Tutte le novita</span>
                            <svg class="icon">
                                <use xlink:href="{{ $sprite }}#it-arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 px-0 px-lg-3">
                <img src="{{ $image['src'] }}" title="{{ $image['title'] }}" alt="{{ $image['alt'] }}" class="img-fluid" />
            </div>
        </div>
    </div>
</section>
