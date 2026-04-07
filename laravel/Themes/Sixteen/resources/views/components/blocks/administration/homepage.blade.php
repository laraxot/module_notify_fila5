{{--
    Administration Homepage Block
    Reference: design-comuni-pagine-statiche/sito/homepage.html — footer AMMINISTRAZIONE + cmp-card-simple pattern
    Usage: <x-blocks.administration.homepage :items="$data['items']" :title="$data['title']" />
--}}
@props(['items' => [], 'title' => ''])

<div class="bg-grey-card">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h2 class="title-xxlarge mb-4 mt-5 mb-lg-10">{{ $title }}</h2>

                <div class="row g-4">
                    @foreach($items as $item)
                    <div class="col-md-6 col-xl-4">
                        <div class="cmp-card-simple card-wrapper pb-0 rounded border border-light">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <a href="{{ $item['url'] ?? '#' }}" class="text-decoration-none" data-element="administration-link">
                                        <h3 class="card-title t-primary title-xlarge">{{ $item['title'] }}</h3>
                                    </a>
                                    <p class="text-secondary mb-0">{{ $item['description'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row justify-content-center pt-4 pt-lg-5">
                    <div class="col-12 text-center">
                        <a class="btn btn-primary" href="/it/tests/amministrazione" data-element="all-administration">
                            Tutta l'amministrazione
                            <svg class="icon icon-white icon-xs ms-1" aria-hidden="true">
                                <use href="{{ asset('themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right') }}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
