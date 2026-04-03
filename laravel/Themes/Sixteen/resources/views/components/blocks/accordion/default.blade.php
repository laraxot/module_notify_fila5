{{--
    Accordion Block - Default (FAQ Style)
    Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/domande-frequenti.html
--}}

@props(['items' => []])

@php
    $spritePath = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
@endphp

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2 px-0 px-sm-3">
            <div class="cmp-accordion faq">
                <div class="accordion" id="accordion-faq" data-faq-accordion>
                    @foreach($items as $index => $item)
                        <div class="accordion-item" data-faq-item data-faq-text="{{ Str::lower(strip_tags(($item['question'] ?? '').' '.preg_replace('~<[^>]+>~', ' ', (string) ($item['answer'] ?? '')))) }}">
                            <div class="accordion-header" id="headingfaq-{{ $index + 1 }}">
                                <button class="accordion-button collapsed title-small-semi-bold py-3"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapsefaq-{{ $index + 1 }}"
                                        aria-expanded="false"
                                        aria-controls="collapsefaq-{{ $index + 1 }}">
                                    <div class="button-wrapper">
                                        {{ $item['question'] }}
                                        <div class="icon-wrapper">
                                            <svg class="icon icon-xs me-1 icon-primary">
                                                <use href="{{ $spritePath }}#it-expand"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div id="collapsefaq-{{ $index + 1 }}"
                                 class="accordion-collapse collapse p-0"
                                 data-bs-parent="#accordion-faq"
                                 role="region"
                                 aria-labelledby="headingfaq-{{ $index + 1 }}">
                                <div class="accordion-body">
                                    {!! $item['answer'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
