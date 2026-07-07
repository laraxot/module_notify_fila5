@props(['data' => []])

@php
    $contactTitle = $data['contact_title'] ?? 'CONTATTI';
    $contacts = $data['contacts'] ?? [];
    $issuesTitle = $data['issues_title'] ?? 'PROBLEMI IN CITTÀ';
    $issues = $data['issues'] ?? [];
@endphp

<div class="row">
    <div class="col-12 col-md-6 col-lg-4 it-footer-main-column">
        <h3 class="no_toc">{{ $contactTitle }}</h3>
        <div class="it-footer-main-column-content">
            @foreach($contacts as $contact)
                <p>
                    <a href="{{ $contact['url'] }}" class="text-white decoration-none">
                        {{ $contact['label'] }}
                    </a>
                </p>
            @endforeach
        </div>
    </div>
    @if(!empty($issues))
        <div class="col-12 col-md-6 col-lg-4 it-footer-main-column">
            <h3 class="no_toc">{{ $issuesTitle }}</h3>
            <div class="it-footer-main-column-content">
                @foreach($issues as $issue)
                    <p>
                        <a href="{{ $issue['url'] }}" class="text-white decoration-none">
                            {{ $issue['label'] }}
                        </a>
                    </p>
                @endforeach
            </div>
        </div>
    @endif
</div>
