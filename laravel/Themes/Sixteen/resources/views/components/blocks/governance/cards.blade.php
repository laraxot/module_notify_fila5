@props(['title' => '', 'items' => []])

{{-- Governance Cards - Bootstrap Italia Style --}}
<section class="governance-section py-8">
    <div class="container">
        <h2 class="title-xxlarge mb-6">{{ $title ?: 'Organi di governo' }}</h2>
        <div class="row g-4">
            @foreach($items as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card-wrapper card-space">
                    <div class="card card-bg">
                        <div class="card-body">
                            @if(isset($item['image']))
                            <img src="{{ $item['image'] }}" alt="" class="card-img-top mb-3" width="150" height="200">
                            @endif
                            <h3 class="card-title h5">{{ $item['title'] }}</h3>
                            <p class="card-text mt-2">{{ $item['subtitle'] }}</p>
                            <a href="{{ $item['url'] }}" class="read-more text-primary fw-semibold text-decoration-none mt-3 d-inline-flex align-items-center">
                                <span>Vai alla pagina</span>
                                <x-filament::icon icon="heroicon-o-arrow-right" class="icon-sm ms-2" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
