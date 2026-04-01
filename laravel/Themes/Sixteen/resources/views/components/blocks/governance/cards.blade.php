@props(['data' => []])

{{-- Governance Cards - Bootstrap Italia Exact Replica --}}
@php
    $title = $data['title'] ?? 'Organi di governo';
    $cards = $data['cards'] ?? [];
@endphp

<section class="py-5">
    <div class="container">
        <h2 class="mb-4">{{ $title }}</h2>
        
        <div class="row g-4">
            @foreach($cards as $card)
            <div class="col-12 col-md-4">
                <div class="card card-teaser shadow p-4 rounded border border-light h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $card['url'] ?? '#' }}">{{ $card['title'] ?? '' }}</a>
                        </h5>
                        <p class="card-text text-muted">{{ $card['role'] ?? '' }}</p>
                        
                        @if($card['description'] ?? false)
                        <p class="card-text">{{ $card['description'] }}</p>
                        @endif
                        
                        <a href="{{ $card['url'] ?? '#' }}" class="btn btn-outline-primary mt-3">
                            Vai alla pagina
                            <svg class="icon icon-sm">
                                <use xlink:href="#it-arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
