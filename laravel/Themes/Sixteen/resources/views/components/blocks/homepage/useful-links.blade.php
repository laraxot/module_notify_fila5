@php
    $links = $links ?? [
        'Rilascio Carta Identita Elettronica (CIE)',
        'Cambio di residenza',
        'Tributi online',
        'Prenotazione appuntamenti',
        'Rilascio tessera elettorale',
        'Voucher connettivita',
    ];
@endphp
<section class="useful-links-section">
    <div class="section section-muted p-0 py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="form-group mb-2 mb-lg-4">
                        <label class="visually-hidden" for="homepage-search">Cerca una parola chiave</label>
                        <div class="input-group">
                            <input id="homepage-search" type="search" class="form-control" placeholder="Cerca una parola chiave" aria-label="Cerca una parola chiave">
                            <button class="btn btn-primary" type="button">Cerca</button>
                        </div>
                    </div>
                    <div class="link-list-wrapper">
                        <div class="link-list-heading text-uppercase mb-3 ps-0 text-secondary">Link utili</div>
                        <ul class="link-list">
                            @foreach ($links as $link)
                                <li><a class="list-item{{ $loop->last ? '' : ' mb-3' }} active ps-0" href="#"><span class="text-button-normal">{{ $link }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
