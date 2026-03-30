@php
    $sprite = asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg');
    $bg = asset('themes/Sixteen/design-comuni/assets/images/evidenza-header.png');
    $cards = $cards ?? [
        ['title' => 'Trasporto pubblico', 'description' => 'Informazioni sui servizi di trasporto pubblico e servizi taxi', 'kind' => 'site', 'site_title' => 'Mobilita in Comune', 'site_description' => 'Il sito del turismo del Comune e della Citta Metropolitana.', 'image' => 'https://picsum.photos/200/200'],
        ['title' => 'Animale domestico', 'description' => 'Informazioni sui servizi e le norme previste dal comune per gli animali domestici.', 'kind' => 'links', 'links' => ['Come adottare un cane al Canile Municipale', 'Elenco delle aree per cani', 'Come segnalare una colonia felina e ricevere il tesserino di riconoscimento come referente', 'Come segnalare lo smarrimento del proprio animale']],
        ['title' => 'Sport', 'description' => 'Tutto quello che c e da sapere sulle strutture sportive comunali a disposizione del pubblico e delle Associazioni, le iniziative a sostegno dello sport e gli eventi che coinvolgono la citta.', 'kind' => 'links', 'links' => ['Tutte le strutture sportive della citta', 'Da lunedi 3 settembre chiudono le vasche della piscina comunale', 'Concessione di contributi ad enti, associazioni, societa sportive']],
    ];
    $tags = $tags ?? ['Associazioni', 'Concorsi', 'Energie rinnovabili', 'Gestione rifiuti', 'Imposte', 'Istruzione', 'Pista ciclabile'];
    $sites = $sites ?? [
        ['title' => 'Mobilita in Comune', 'description' => 'Il sito del turismo del Comune e della Citta Metropolitana', 'image' => 'https://picsum.photos/200/200', 'class' => 'card-bg-blue text-white'],
        ['title' => 'Turismo', 'description' => 'Il sito che offre informazioni sulle attivita turistiche attive in citta', 'image' => 'https://picsum.photos/200/200', 'class' => 'card-bg-warning'],
        ['title' => 'Musei Civici', 'description' => 'Tutte le informazioni sui musei e gli eventi culturali della citta', 'image' => 'https://picsum.photos/200/200', 'class' => 'card-bg-dark text-white'],
    ];
@endphp
<section class="evidence-section">
    <div class="section py-5 pb-lg-80 px-lg-5 position-relative" style="background-image: url({{ $bg }})">
        <div class="container">
            <div class="row"><h2 class="text-white">Argomenti in evidenza</h2></div>
            <div>
                <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
                    @foreach ($cards as $card)
                        <div class="card card-teaser no-after rounded shadow-sm border border-light">
                            <div class="card-body pb-5">
                                <h3 class="card-title">{{ $card['title'] }}</h3>
                                <p class="card-text{{ $card['kind'] === 'site' ? ' pb-3' : '' }}">{{ $card['description'] }}</p>
                                @if ($card['kind'] === 'site')
                                    <p class="mb-10 text-paragraph-small-semi">Visita il sito:</p>
                                    <a href="#" class="card card-teaser card-bg-blue no-after rounded mt-0 p-3">
                                        <div class="avatar size-lg me-3"><img src="{{ $card['image'] }}" alt="Immagine"></div>
                                        <div class="card-body">
                                            <h4 class="card-title text-white mb-1">{{ $card['site_title'] }}</h4>
                                            <p class="card-text text-sans-serif text-white">{{ $card['site_description'] }}</p>
                                        </div>
                                    </a>
                                @else
                                    <div class="link-list-wrapper mt-4">
                                        <ul class="link-list">
                                            @foreach ($card['links'] as $link)
                                                <li>
                                                    <a class="list-item active icon-left{{ $loop->last ? '' : ' mb-2' }}" href="#">
                                                        <span class="list-item-title-icon-wrapper"><span class="{{ $card['title'] === 'Sport' ? 'text-underline' : 'text-success' }}">{{ $link }}</span></span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <a class="read-more pt-0" href="#">
                                <span class="text">Esplora argomento</span>
                                <svg class="icon ms-0"><use xlink:href="{{ $sprite }}#it-arrow-right"></use></svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row pt-30">
                <div class="col-lg-10 col-xl-6 offset-lg-1 offset-xl-2">
                    <div class="row d-lg-inline-flex">
                        <div class="col-lg-3"><h3 class="text-uppercase mb-3 title-xsmall-bold text text-secondary">Altri argomenti</h3></div>
                        <div class="col-lg-9">
                            <ul class="d-flex flex-wrap gap-1">
                                @foreach ($tags as $tag)
                                    <li><a class="chip chip-simple" href="#"><span class="chip-label">{{ $tag }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 text-center"><a href="#" class="btn btn-primary mt-40">Mostra tutti</a></div>
            </div>
            <div class="row pt-5"><h2>Siti tematici</h2></div>
            <div class="pt-4 pt-lg-30">
                <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3 pb-0">
                    @foreach ($sites as $site)
                        <a href="#" class="card card-teaser rounded mt-0 p-3 {{ $site['class'] }}">
                            <div class="avatar size-lg me-3"><img src="{{ $site['image'] }}" alt="Immagine"></div>
                            <div class="card-body">
                                <h3 class="card-title sito-tematico">{{ $site['title'] }}</h3>
                                <p class="card-text text-sans-serif">{{ $site['description'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
