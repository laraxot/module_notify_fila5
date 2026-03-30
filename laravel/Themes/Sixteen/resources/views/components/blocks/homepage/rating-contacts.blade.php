@php
    $sprite = asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg');
@endphp
<div class="bg-primary">
    <div class="container">
        <div class="row d-flex justify-content-center bg-primary">
            <div class="col-12 col-lg-6">
                <div class="cmp-rating pt-lg-80 pb-lg-80" id="rating">
                    <div class="card shadow card-wrapper" data-element="feedback">
                        <div class="cmp-rating__card-first">
                            <div class="card-header border-0">
                                <h2 class="title-medium-2-semi-bold mb-0" data-element="feedback-title">Quanto sono chiare le informazioni su questa pagina?</h2>
                            </div>
                            <div class="card-body">
                                <fieldset class="rating">
                                    <legend class="visually-hidden">Valuta da 1 a 5 stelle la pagina</legend>
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}a" name="ratingA" value="{{ $i }}">
                                        <label class="full rating-star active" for="star{{ $i }}a" data-element="feedback-rate-{{ $i }}">
                                            <svg class="icon icon-sm" role="img" aria-labelledby="star-{{ $i }}" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1.7L9.5 9.2H1.6L8 13.9l-2.4 7.6 6.4-4.7 6.4 4.7-2.4-7.6 6.4-4.7h-7.9L12 1.7z" />
                                                <path fill="none" d="M0 0h24v24H0z" />
                                            </svg>
                                            <span class="visually-hidden" id="star-{{ $i }}">Valuta {{ $i }} stelle su 5</span>
                                        </label>
                                    @endfor
                                </fieldset>
                            </div>
                        </div>
                        <div class="cmp-rating__card-second d-none" data-step="3">
                            <div class="card-header border-0 mb-0"><h2 class="title-medium-2-bold mb-0" id="rating-feedback">Grazie, il tuo parere ci aiutera a migliorare il servizio!</h2></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-grey-card shadow-contacts">
    <div class="container">
        <div class="row d-flex justify-content-center p-contacts">
            <div class="col-12 col-lg-6">
                <div class="cmp-contacts">
                    <div class="card w-100">
                        <div class="card-body">
                            <h2 class="title-medium-2-semi-bold ">Contatta il comune</h2>
                            <ul class="contact-list p-0">
                                <li><a class="list-item" href="#"><svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-help-circle"></use></svg><span>Leggi le domande frequenti</span></a></li>
                                <li><a class="list-item" href="#" data-element="contacts"><svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-mail"></use></svg><span>Richiedi assistenza</span></a></li>
                                <li><a class="list-item" href="#"><svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-hearing"></use></svg><span>Chiama il numero verde 05 0505</span></a></li>
                                <li><a class="list-item" href="#" data-element="appointment-booking"><svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-calendar"></use></svg><span>Prenota appuntamento</span></a></li>
                            </ul>
                            <h2 class="title-medium-2-semi-bold mt-4">Problemi in citta</h2>
                            <ul class="contact-list p-0">
                                <li><a class="list-item" href="#"><svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-map-marker-circle"></use></svg><span>Segnala disservizio </span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
