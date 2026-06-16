@props(['title' => 'Contatta il comune', 'data' => []])

{{-- 
    Contact Info Block - Design Comuni "Contatta il comune" pattern
    Reference: argomenti.html - "Contatta il comune" section
    
    DESIGN COMUNI STRUCTURE:
    - Uses cmp-contacts pattern
    - Card with card-body
    - Two sections: "Contatta il comune" and "Problemi in città"
    - Uses it-help-circle, it-mail, it-hearing, it-calendar, it-map-marker-circle icons
--}}

@php
    $title = $data['title'] ?? $title;
    $items = $data['items'] ?? [
        ['label' => 'Leggi le domande frequenti', 'icon' => 'it-help-circle', 'url' => '#'],
        ['label' => 'Richiedi assistenza', 'icon' => 'it-mail', 'url' => '#'],
        ['label' => 'Chiama il numero verde 05 0505', 'icon' => 'it-hearing', 'url' => '#'],
        ['label' => 'Prenota appuntamento', 'icon' => 'it-calendar', 'url' => '#'],
    ];
    $cityIssues = $data['city_issues'] ?? [
        ['label' => 'Segnala disservizio', 'icon' => 'it-map-marker-circle', 'url' => '#'],
    ];
@endphp

<div class="bg-grey-card shadow-contacts">
    <div class="container">
        <div class="row d-flex justify-content-center p-contacts">
            <div class="col-12 col-lg-6">
                <div class="cmp-contacts">
                    <div class="card w-100">
                        <div class="card-body">
                            <h2 class="title-medium-2-semi-bold">{{ $title }}</h2>
                            <ul class="contact-list p-0">
                                @foreach($items as $item)
                                <li>
                                    <a class="list-item" href="{{ $item['url'] ?? '#' }}">
                                        <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                            <use href="{{ asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#'.$item['icon']) }}"></use>
                                        </svg>
                                        <span>{{ $item['label'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            
                            <h2 class="title-medium-2-semi-bold mt-4">Problemi in città</h2>
                            <ul class="contact-list p-0">
                                @foreach($cityIssues as $issue)
                                <li>
                                    <a class="list-item" href="{{ $issue['url'] ?? '#' }}">
                                        <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                            <use href="{{ asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#'.$issue['icon']) }}"></use>
                                        </svg>
                                        <span>{{ $issue['label'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
