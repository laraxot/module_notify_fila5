@props(['data' => []])

{{-- Rating Component - Bootstrap Italia Exact Replica --}}
@php
    $title = $data['title'] ?? 'QUANTO SONO CHIARE LE INFORMAZIONI SU QUESTA PAGINA?';
    $question = $data['question'] ?? 'GRAZIE, IL TUO PARERE CI AIUTERÀ A MIGLIORARE IL SERVIZIO!';
    $maxRating = $data['maxRating'] ?? 5;
@endphp

<div class="cmp-rating">
    <div class="card card-teaser shadow p-4 rounded border border-light">
        <div class="card-body text-center">
            <h5 class="card-title mb-3">{{ $title }}</h5>
            
            <div class="rating-wrapper">
                @for($i = 1; $i <= $maxRating; $i++)
                <label class="rating-label">
                    <input type="radio" name="rating" value="{{ $i }}" class="visually-hidden">
                    <span class="rating-star" data-value="{{ $i }}">
                        <svg class="icon icon-lg">
                            <use xlink:href="#it-star"></use>
                        </svg>
                    </span>
                </label>
                @endfor
            </div>
            
            @if($question)
            <p class="mt-3 mb-0 text-muted">{{ $question }}</p>
            @endif
        </div>
    </div>
</div>
