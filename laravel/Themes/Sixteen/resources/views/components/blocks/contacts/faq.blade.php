@php
    $contactTitle = $contact_title ?? __('fixcity::segnalazione.contacts.title.label');
    $contacts = is_array($contacts ?? null) ? $contacts : [];
    $issuesTitle = $issues_title ?? __('fixcity::segnalazione.contacts.issues.title.label');
    $issues = is_array($issues ?? null) ? $issues : [];
    $sprite = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
    $contactIcons = ['it-help-circle', 'it-mail', 'it-hearing', 'it-calendar'];
    $issueIcons = ['it-warning-circle', 'it-map-marker-circle'];
@endphp

<div class="bg-grey-card shadow-contacts">
    <div class="container">
        <div class="row d-flex justify-content-center p-contacts">
            @if(!empty($contacts))
                <div class="col-12 col-lg-5">
                    <div class="cmp-contacts">
                        <div class="card w-100">
                            <div class="card-body">
                                <h2 class="title-medium-2-semi-bold">{{ $contactTitle }}</h2>
                                <ul class="contact-list p-0">
                                    @foreach($contacts as $contact)
                                        <li>
                                            <a class="list-item" href="{{ $contact['url'] ?? '#' }}">
                                                <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                                    <use href="{{ $sprite }}#{{ $contactIcons[$loop->index] ?? 'it-help-circle' }}"></use>
                                                </svg>
                                                <span>{{ $contact['label'] ?? '' }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(!empty($issues))
                <div class="col-12 col-lg-5">
                    <div class="cmp-contacts">
                        <div class="card w-100">
                            <div class="card-body">
                                <h2 class="title-medium-2-semi-bold">{{ $issuesTitle }}</h2>
                                <ul class="contact-list p-0">
                                    @foreach($issues as $issue)
                                        <li>
                                            <a class="list-item" href="{{ $issue['url'] ?? '#' }}">
                                                <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                                    <use href="{{ $sprite }}#{{ $issueIcons[$loop->index] ?? 'it-help-circle' }}"></use>
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
            @endif
        </div>
    </div>
</div>
