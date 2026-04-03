@props(['data' => []])

@php
    $spritePath = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
    $contactTitle = $data['contact_title'] ?? 'Contatta il comune';
    $contacts = $data['contacts'] ?? [];
    $issuesTitle = $data['issues_title'] ?? 'Problemi in città';
    $issues = $data['issues'] ?? [];
@endphp

<div class="faq-contacts-section">
    <div class="container">
        <div class="row d-flex justify-content-center p-contacts">
            <div class="col-12 col-lg-6">
                <div class="cmp-contacts">
                    <div class="card w-100">
                        <div class="card-body">
                            <h2 class="title-medium-2-semi-bold">{{ $contactTitle }}</h2>
                            <ul class="contact-list p-0">
                                @foreach ($contacts as $contact)
                                    <li>
                                        <a class="list-item" href="{{ $contact['url'] ?? '#' }}">
                                            <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                                <use href="{{ $spritePath }}#{{ $contact['icon'] ?? 'it-link' }}"></use>
                                            </svg>
                                            <span>{{ $contact['label'] ?? '' }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <h2 class="title-medium-2-semi-bold mt-4">{{ $issuesTitle }}</h2>
                            <ul class="contact-list p-0">
                                @foreach ($issues as $issue)
                                    <li>
                                        <a class="list-item" href="{{ $issue['url'] ?? '#' }}">
                                            <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                                <use href="{{ $spritePath }}#{{ $issue['icon'] ?? 'it-link' }}"></use>
                                            </svg>
                                            <span>{{ $issue['label'] ?? '' }}</span>
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
