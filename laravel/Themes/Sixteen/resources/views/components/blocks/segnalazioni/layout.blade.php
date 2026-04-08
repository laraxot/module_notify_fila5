@props(['data' => []])

@php
    $ns = 'fixcity::segnalazione';

    // Helper to resolve translation keys from JSON
    $t = function ($value, $default = '') use ($ns) {
        if (empty($value)) {
            return $default;
        }
        // If value looks like a translation key, resolve it
        if (str_contains($value, '::')) {
            return __($value);
        }
        return $value;
    };

    // Breadcrumb
    $rawBreadcrumb = $data['breadcrumb'] ?? [];
    $breadcrumbItems = [];
    foreach ($rawBreadcrumb as $item) {
        $breadcrumbItems[] = [
            'label' => $t($item['label'] ?? ''),
            'url' => $item['url'] ?? null,
            'active' => $item['active'] ?? false,
        ];
    }
    if (empty($breadcrumbItems)) {
        $breadcrumbItems = [
            ['label' => __($ns . '.breadcrumb.home.label'), 'url' => '/it/tests/homepage'],
            ['label' => __($ns . '.breadcrumb.elenco.label'), 'url' => null, 'active' => true],
        ];
    }

    // Heading
    $title = $t($data['title'] ?? '', __($ns . '.heading.title.label'));
    $subtitle = $t($data['subtitle'] ?? '', __($ns . '.heading.subtitle.text', ['count' => 73]));

    // Results
    $resultsCount = $data['results_count'] ?? 645;

    // Tabs
    $rawTabs = $data['tabs'] ?? [];
    $tabs = [];
    foreach ($rawTabs as $tab) {
        $tabs[] = [
            'id' => $tab['id'] ?? 'map',
            'label' => $t($tab['label'] ?? ''),
            'active' => $tab['active'] ?? false,
        ];
    }
    if (empty($tabs)) {
        $tabs = [
            ['id' => 'map', 'label' => __($ns . '.tabs.map.label'), 'active' => true],
            ['id' => 'list', 'label' => __($ns . '.tabs.list.label'), 'active' => false],
        ];
    }

    // Filters
    $rawFilters = $data['filters'] ?? [];
    $filters = [
        'title' => $t($rawFilters['title'] ?? '', __($ns . '.filters.legend.label')),
        'items' => $rawFilters['items'] ?? [],
    ];

    // CTA (Map tab)
    $rawCta = $data['cta'] ?? [];
    $cta = !empty($rawCta)
        ? [
            'title' => $t($rawCta['title'] ?? '', __($ns . '.map.cta.title.label')),
            'text' => $t($rawCta['text'] ?? '', __($ns . '.map.cta.text.label')),
            'button_text' => $t($rawCta['button_text'] ?? '', __($ns . '.map.cta.button.label')),
        ]
        : [];

    // Items (List tab)
    $items = $data['items'] ?? [];

    // Contacts
    $rawContacts = $data['contacts'] ?? [];
    $contacts = !empty($rawContacts)
        ? [
            'contact_title' => $t($rawContacts['contact_title'] ?? '', __($ns . '.contacts.title.label')),
            'contacts' => collect($rawContacts['contacts'] ?? [])
                ->map(
                    fn($c) => [
                        'label' => $t($c['label'] ?? ''),
                        'url' => $c['url'] ?? '#',
                    ],
                )
                ->toArray(),
            'issues_title' => $t($rawContacts['issues_title'] ?? '', __($ns . '.contacts.issues.title.label')),
            'issues' => collect($rawContacts['issues'] ?? [])
                ->map(
                    fn($i) => [
                        'label' => $t($i['label'] ?? ''),
                        'url' => $i['url'] ?? '#',
                    ],
                )
                ->toArray(),
        ]
        : [];

    $sprite = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
@endphp

{{-- Main Container Content --}}
<div class="main-content">
    {{-- Breadcrumb + Heading Row --}}
    <div class="row justify-content-center mb-md-40 mb-lg-80">
        <div class="col-12 col-lg-10">
            {{-- Breadcrumbs --}}
            <div class="cmp-breadcrumbs" role="navigation">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb p-0" data-element="breadcrumb">
                        @foreach ($breadcrumbItems as $item)
                            <li
                                class="breadcrumb-item{{ isset($item['active']) && $item['active'] ? ' active' : '' }}"{{ isset($item['active']) && $item['active'] ? ' aria-current="page"' : '' }}>
                                @if (isset($item['url']) && $item['url'])
                                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                                    <span class="separator">/</span>
                                @else
                                    {{ $item['label'] }}
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </nav>
            </div>

            {{-- Heading --}}
            <div class="cmp-heading p-0">
                <h1 class="title-xxxlarge">{{ $title }}</h1>
                @if ($subtitle)
                    <p class="subtitle-small">{{ $subtitle }}</p>
                @endif
            </div>
        </div>
        <hr class="d-none d-lg-block mt-30 mb-2">
    </div>

    {{-- Content Row: Filters + Results --}}
    <div class="row justify-content-center">
        {{-- Filters Sidebar (Desktop only) --}}
        @if (!empty($filters['items']))
            <div class="col-lg-3 d-none d-lg-block">
                <fieldset>
                    <legend class="h6 text-uppercase category-list__title">
                        {{ $filters['title'] ?? __($ns . '.filters.legend.label') }}</legend>
                    <div class="categoy-list pb-4">
                        <ul>
                            @foreach ($filters['items'] as $filter)
                                <li>
                                    <div class="form-check">
                                        <div class="checkbox-body border-light py-1">
                                            <input type="checkbox" id="{{ $filter['id'] }}" name="category"
                                                value="{{ $filter['value'] ?? '' }}">
                                            <label for="{{ $filter['id'] }}"
                                                class="subtitle-small_semi-bold mb-0 category-list__list">{{ $filter['label'] }}
                                                ({{ $filter['count'] ?? 0 }})
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </fieldset>
            </div>
        @endif

        {{-- Results Column --}}
        <div class="col-lg-8 offset-lg-1">
            {{-- Results Header --}}
            <div class="d-flex justify-content-between border-bottom border-light pb-3 mt-5">
                <span class="search-results">{{ __($ns . '.elenco.results.text', ['count' => $resultsCount]) }}</span>

                {{-- Mobile Filter Button --}}
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-categories"
                    class="btn p-0 pe-2 d-lg-none">
                    <span class="rounded-icon">
                        <svg class="icon icon-primary icon-xs" aria-hidden="true">
                            <use href="{{ $sprite }}#it-funnel"></use>
                        </svg>
                    </span>
                    <span
                        class="t-primary title-xsmall-semi-bold ms-1">{{ __($ns . '.elenco.filter_btn.label') }}</span>
                </button>

                {{-- Desktop Remove Filters Button --}}
                <button type="button" class="btn p-0 pe-2 d-none d-lg-block">
                    <span class="title-xsmall-semi-bold ms-1">{{ __($ns . '.elenco.remove_filters_btn.label') }}</span>
                </button>
            </div>

            {{-- Tabs --}}
            <ul class="nav nav-tabs w-100 flex-nowrap border-bottom border-light mb-40 mt-3 shadow-none"
                id="tabDisservizio" role="tablist">
                @foreach ($tabs as $tab)
                    <li class="nav-item w-100" role="tab">
                        <a class="nav-link{{ isset($tab['active']) && $tab['active'] ? ' active' : '' }} title-medium-semi-bold pt-0"
                            href="#data-ex-disservizio{{ $loop->iteration }}" aria-current="page" data-bs-toggle="tab"
                            role="button" aria-controls="disservizio{{ $loop->iteration }}"
                            aria-selected="{{ isset($tab['active']) && $tab['active'] ? 'true' : 'false' }}">
                            {{ $tab['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Tab Content --}}
            <div class="tab-content">
                {{-- Map Tab --}}
                <div class="tab-pane fade{{ isset($tabs[0]['active']) && $tabs[0]['active'] ? ' show active' : '' }}"
                    id="data-ex-disservizio1" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="map-box">
                                <img src="/themes/Sixteen/design-comuni/assets/images/map-placeholder.svg"
                                    alt="{{ __($ns . '.map.map_alt.text') }}" class="w-100">
                                <button type="button" class="pin" data-bs-toggle="modal"
                                    data-bs-target="#modal-disservizio">
                                    <img src="/themes/Sixteen/design-comuni/assets/images/map-pin.svg"
                                        alt="{{ __($ns . '.map.pin_alt.text') }}"
                                        title="{{ __($ns . '.map.pin_alt.text') }}">
                                </button>
                            </div>
                        </div>
                        @if (!empty($cta))
                            <div class="col-lg-6 mt-50 mb-4 mb-lg-0">
                                <div class="cmp-text-button mt-0">
                                    <h2 class="title-xxlarge mb-0">
                                        {{ $cta['title'] ?? __($ns . '.map.cta_title.label') }}</h2>
                                    <div class="text-wrapper">
                                        <p class="subtitle-small mb-3 mt-3">
                                            {{ $cta['text'] ?? __($ns . '.map.cta_text.text') }}</p>
                                    </div>
                                    <div class="button-wrapper">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#modal-disservizio"
                                            class="btn btn btn-primary mobile-full py-3 mt-2 mb-4 mb-lg-0">
                                            <span>{{ $cta['button_text'] ?? __($ns . '.map.cta_btn.label') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- List Tab --}}
                <div class="tab-pane fade" id="data-ex-disservizio2" role="tabpanel">
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="cmp-card mb-4 mb-lg-30">
                                <div class="card has-bkg-grey shadow-sm">
                                    <div class="card-body p-0">
                                        <div class="cmp-info-button-card">
                                            <div class="card p-3 p-lg-4">
                                                <div class="card-body p-0">
                                                    <h3 class="medium-title mb-0">{{ $item['title'] ?? '' }}</h3>

                                                    <p class="card-info">{{ __($ns . '.card.type_label.text') }}<br>
                                                        <span>{{ $item['type'] ?? '' }}</span>
                                                    </p>

                                                    {{-- Expandable section --}}
                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <button class="collapsed accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $loop->iteration }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $loop->iteration }}">
                                                                <span class="d-flex align-items-center">
                                                                    {{ __($ns . '.card.expand_btn.label') }}
                                                                    <svg class="icon icon-primary icon-sm">
                                                                        <use href="{{ $sprite }}#it-expand">
                                                                        </use>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div id="collapse{{ $loop->iteration }}"
                                                            class="accordion-collapse collapse pb-0" role="region">
                                                            <div class="accordion-body p-0">
                                                                <div class="cmp-info-summary bg-white border-0">
                                                                    <div class="card">
                                                                        <div
                                                                            class="card-header border-bottom border-light p-0 mb-0 d-flex justify-content-end">
                                                                            @if (!empty($item['edit_url']))
                                                                                <a href="{{ $item['edit_url'] }}"
                                                                                    class="d-none text-decoration-none"><span
                                                                                        class="text-button-sm-semi t-primary">{{ __($ns . '.card.edit_link.text') }}</span></a>
                                                                            @endif
                                                                        </div>

                                                                        <div class="card-body p-0">
                                                                            @if (!empty($item['location']))
                                                                                <div
                                                                                    class="single-line-info border-light">
                                                                                    <div class="text-paragraph-small">
                                                                                        {{ __($ns . '.card.address_label_text') }}
                                                                                    </div>
                                                                                    <div class="border-light">
                                                                                        <p class="data-text">
                                                                                            {{ $item['location'] }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            @endif

                                                                            @if (!empty($item['description']))
                                                                                <div
                                                                                    class="single-line-info border-light">
                                                                                    <div class="text-paragraph-small">
                                                                                        {{ __($ns . '.card.detail_label_text') }}
                                                                                    </div>
                                                                                    <div class="border-light">
                                                                                        <p class="data-text">
                                                                                            {{ $item['description'] }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            @endif

                                                                            @if (!empty($item['images']) && is_array($item['images']))
                                                                                <div
                                                                                    class="single-line-info border-light">
                                                                                    <div class="text-paragraph-small">
                                                                                        {{ __($ns . '.card.images_label_text') }}
                                                                                    </div>
                                                                                    <div class="border-light border-0">
                                                                                        <div
                                                                                            class="d-lg-flex gap-2 mt-3">
                                                                                            @foreach ($item['images'] as $img)
                                                                                                <div>
                                                                                                    <img src="{{ $img }}"
                                                                                                        alt="{{ __($ns . '.card.images_alt.text') }}"
                                                                                                        class="img-fluid w-100 mb-3 mb-lg-0">
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="card-footer p-0 d-none">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Load More --}}
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-outline-primary">
                            <span>{{ __($ns . '.elenco.load_more_text') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Rating Section --}}
<div class="bg-primary">
    <div class="container">
        <div class="row d-flex justify-content-center bg-primary">
            <div class="col-12 col-lg-6 p-lg-0 px-3">
                <div class="cmp-rating pt-lg-80 pb-lg-80" id="rating">
                    <div class="card shadow card-wrapper">
                        <div class="card-header border-0">
                            <h2 class="title-medium-2-semi-bold mb-0">{{ __($ns . '.rating.question_text') }}</h2>
                        </div>
                        <div class="card-body">
                            <fieldset class="rating">
                                <legend class="visually-hidden">{{ __($ns . '.rating.legend_text') }}</legend>
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}a" name="ratingA"
                                        value="{{ $i }}">
                                    <label class="full rating-star" for="star{{ $i }}a">
                                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                                            <path
                                                d="M12 1.7L9.5 9.2H1.6L8 13.9l-2.4 7.6 6.4-4.7 6.4 4.7-2.4-7.6 6.4-4.7h-7.9L12 1.7z" />
                                        </svg>
                                    </label>
                                @endfor
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Contacts Section --}}
@if (!empty($data['contacts']))
    <div class="bg-grey-card shadow-contacts">
        <div class="container">
            <div class="row d-flex justify-content-center p-contacts">
                <div class="col-12 col-lg-5">
                    @php $contacts = $data['contacts']; @endphp
                    <h2 class="title-medium-2-semi-bold mb-3">
                        {{ $contacts['contact_title'] ?? __($ns . '.contacts.contact_title_label') }}</h2>
                    <ul class="link-list">
                        @if (!empty($contacts['contacts']))
                            @foreach ($contacts['contacts'] as $contact)
                                <li><a href="{{ $contact['url'] ?? '#' }}">{{ $contact['label'] ?? '' }}</a></li>
                            @endforeach
                        @endif
                    </ul>

                    @if (!empty($contacts['issues']))
                        <h2 class="title-medium-2-semi-bold mb-3 mt-4">
                            {{ $contacts['issues_title'] ?? __($ns . '.contacts.issues_title_label') }}</h2>
                        <ul class="link-list">
                            @foreach ($contacts['issues'] as $issue)
                                <li><a href="{{ $issue['url'] ?? '#' }}">{{ $issue['label'] ?? '' }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Mobile Filters Modal --}}
@if (!empty($filters['items']))
    <div class="modal fade" id="modal-categories" tabindex="-1" role="dialog"
        aria-labelledby="modal-categories-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title h4" id="modal-categories-label">
                        {{ $filters['title'] ?? __($ns . '.filters.legend_label') }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="categoy-list pb-4">
                            <ul>
                                @foreach ($filters['items'] as $filter)
                                    <li>
                                        <div class="form-check">
                                            <div class="checkbox-body border-light py-1">
                                                <input type="checkbox" id="mobile-{{ $filter['id'] }}"
                                                    name="category" value="{{ $filter['value'] ?? '' }}">
                                                <label for="mobile-{{ $filter['id'] }}"
                                                    class="subtitle-small_semi-bold mb-0 category-list__list">{{ $filter['label'] }}
                                                    ({{ $filter['count'] ?? 0 }})
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endif
