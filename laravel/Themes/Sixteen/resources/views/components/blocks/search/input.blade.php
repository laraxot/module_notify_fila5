@props(['data' => []])

@php
    $spritePath = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
    $placeholder = $data['placeholder'] ?? 'Cerca';
    $buttonLabel = $data['buttonLabel'] ?? 'Invio';
    $action = $data['action'] ?? '#';
    $method = $data['method'] ?? 'GET';
    $inputId = $data['inputId'] ?? 'faq-search';
@endphp

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2 px-sm-3 mt-2">
            <div class="cmp-input-search">
                <form action="{{ $action }}" method="{{ $method }}" class="form-group autocomplete-wrapper mb-2 mb-lg-4" data-faq-search-form>
                    <div class="input-group">
                        <label for="{{ $inputId }}" class="visually-hidden">Cerca nel sito</label>
                        <input
                            type="search"
                            class="autocomplete form-control"
                            placeholder="{{ $placeholder }}"
                            id="{{ $inputId }}"
                            name="q"
                            data-faq-search
                            autocomplete="off"
                        >
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-3">{{ $buttonLabel }}</button>
                        </div>
                        <span class="autocomplete-icon" aria-hidden="true">
                            <svg class="icon icon-sm icon-primary">
                                <use href="{{ $spritePath }}#it-search"></use>
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
