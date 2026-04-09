<div class="ticket-create-wizard">
@php
    $title = (string) ($blockData['title'] ?? __('fixcity::segnalazione.page.title.label'));
    $description = (string) ($blockData['description'] ?? '');
    $sprite = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
    $totalSteps = 3;
    $contacts = is_array($blockData['contacts'] ?? null) ? $blockData['contacts'] : [];
    $privacyIntro = (string) ($blockData['privacy_intro'] ?? __('fixcity::segnalazione.privacy.intro.text'));
    $privacyDetailPrefix = (string) ($blockData['privacy_detail_prefix'] ?? __('fixcity::segnalazione.privacy.detail_prefix.text'));
    $privacyLink = (string) ($blockData['privacy_link'] ?? '#');
    $privacyLinkLabel = (string) ($blockData['privacy_link_label'] ?? __('fixcity::segnalazione.privacy.link.label'));
    $privacyCheckboxLabel = (string) ($blockData['privacy_checkbox_label'] ?? __('fixcity::segnalazione.privacy.checkbox.label'));
    $placeholders = is_array($blockData['placeholders'] ?? null) ? $blockData['placeholders'] : [];
@endphp

<div class="fixcity-ticket-create-wizard">

{{-- Title + Steppers --}}
<div class="container" id="main-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="cmp-heading pb-3 pb-lg-4">
                <h1 class="title-xxxlarge">{{ $title }}</h1>
                @if($description)
                    <p class="text-paragraph mb-0">{{ $description }}</p>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="steppers">
                <div class="steppers-header">
                    <ul>
                        @foreach($steps as $index => $stepLabel)
                            <li class="{{ $index + 1 < $currentStep ? 'confirmed' : ($index + 1 === $currentStep ? 'active' : '') }}">
                                {{ $stepLabel }}
                                @if($index + 1 < $currentStep)
                                    <svg class="icon steppers-success" aria-hidden="true">
                                        <use href="{{ $sprite }}#it-check"></use>
                                    </svg>
                                    <span class="visually-hidden">{{ __('fixcity::segnalazione.steps.confirmed.label') }}</span>
                                @elseif($index + 1 === $currentStep)
                                    <span class="visually-hidden">{{ __('fixcity::segnalazione.steps.active.label') }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <span class="steppers-index" aria-hidden="true">{{ $currentStep }}/{{ $totalSteps }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Step Content --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 pb-40 pb-lg-80">
            <div class="steppers-content" aria-live="polite">

                @if($currentStep === 1)
                    {{-- Step 1: Privacy --}}
                    <div class="it-page-sections-container">
                        <p class="text-paragraph mb-lg-4">{{ $privacyIntro }}</p>
                        <p class="text-paragraph mb-0">
                            {{ $privacyDetailPrefix }}
                            <a href="{{ $privacyLink }}" class="t-primary">{{ $privacyLinkLabel }}</a>
                        </p>
                        <div class="form-check mt-4 mb-3 mt-md-40 mb-lg-40">
                            <div class="checkbox-body d-flex align-items-center">
                                <input type="checkbox" id="privacy" wire:model="privacyAccepted" value="1">
                                <label class="title-small-semi-bold pt-1" for="privacy">{{ $privacyCheckboxLabel }}</label>
                            </div>
                            @error('privacyAccepted')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                @elseif($currentStep === 2)
                    {{-- Step 2: Data --}}
                    <div class="it-page-sections-container">
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big p-lg-4">
                                <div class="card-body p-0">
                                    <div class="form-group bg-white p-3 mb-3">
                                        <label class="label-input mb-2" for="address">{{ __('fixcity::segnalazione.fields.address.label') }} *</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" wire:model="address" placeholder="{{ $placeholders['address'] ?? __('fixcity::segnalazione.create.address.placeholder') }}" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="select-wrapper p-3 mb-3">
                                        <label for="issueType" class="label-input mb-2">{{ __('fixcity::segnalazione.fields.type.label') }} *</label>
                                        <select id="issueType" wire:model="issueType" class="u-grey-dark @error('issueType') is-invalid @enderror" required>
                                            <option value="">{{ __('fixcity::segnalazione.fields.type.label') }}</option>
                                            @foreach($issueTypeOptions as $value => $label)
                                                <option value="{{ $value }}" @selected($issueType === $value)>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('issueType')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group bg-white p-3 mb-3">
                                        <label class="label-input mb-2" for="title">{{ __('fixcity::segnalazione.fields.title.label') }} *</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model="title" placeholder="{{ $placeholders['title'] ?? __('fixcity::segnalazione.create.title.placeholder') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="cmp-text-area p-3 mb-3">
                                        <label class="label-input mb-2" for="details">{{ __('fixcity::segnalazione.fields.details.label') }} *</label>
                                        <textarea class="text-area form-control @error('details') is-invalid @enderror" id="details" wire:model="details" rows="5" required placeholder="{{ $placeholders['details'] ?? __('fixcity::segnalazione.create.details.placeholder') }}"></textarea>
                                        @error('details')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group bg-white p-3 mb-0">
                                        <label class="label-input mb-2" for="email">{{ __('fixcity::segnalazione.fields.email.label') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    {{-- Step 3: Summary + Submit --}}
                    <div class="it-page-sections-container">
                        <div class="callout callout-highlight ps-3 warning">
                            <div class="callout-title mb-20 d-flex align-items-center">
                                <svg class="icon icon-sm" aria-hidden="true">
                                    <use href="{{ $sprite }}#it-horn"></use>
                                </svg>
                                <span>{{ __('fixcity::segnalazione.warning.title.label') }}</span>
                            </div>
                            <p class="titillium text-paragraph">{{ __('fixcity::segnalazione.warning.message.label') }}<span class="d-lg-block"> {{ __('fixcity::segnalazione.warning.message_extra.label') }}</span></p>
                        </div>

                        <h2 class="title-xxlarge mb-4 mt-40">{{ __('fixcity::segnalazione.heading.report.label') }}</h2>

                        <div class="cmp-card mb-4">
                            <div class="card has-bkg-grey shadow-sm mb-0">
                                <div class="card-body p-0">
                                    <div class="cmp-info-summary bg-white p-3 p-lg-4">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                @if($address)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.address.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $address }}</p></div>
                                                    </div>
                                                @endif
                                                @if($issueType)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.type.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $issueTypeOptions[$issueType] ?? $issueType }}</p></div>
                                                    </div>
                                                @endif
                                                @if($title)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.title.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $title }}</p></div>
                                                    </div>
                                                @endif
                                                @if($details)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.details.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $details }}</p></div>
                                                    </div>
                                                @endif
                                                @if($email)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.email.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $email }}</p></div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Navigation --}}
                <div class="cmp-nav-steps">
                    <nav class="steppers-nav" aria-label="Step">
                        @if($currentStep > 1)
                            <button wire:click="prevStep" type="button" class="btn btn-sm steppers-btn-prev p-0">
                                <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                    <use href="{{ $sprite }}#it-chevron-left"></use>
                                </svg>
                                <span class="text-button-sm t-primary">{{ __('fixcity::segnalazione.actions.back.label') }}</span>
                            </button>
                        @endif
                        @if($currentStep < 3)
                            <button wire:click="nextStep" type="button" class="btn btn-primary btn-sm steppers-btn-confirm ms-auto">
                                <span class="text-button-sm">{{ __('fixcity::segnalazione.actions.next.label') }}</span>
                                <svg class="icon icon-white icon-sm" aria-hidden="true">
                                    <use href="{{ $sprite }}#it-chevron-right"></use>
                                </svg>
                            </button>
                        @else
                            <button wire:click="submit" type="button" class="btn btn-primary btn-sm ms-auto">
                                <span class="text-button-sm">{{ __('fixcity::segnalazione.actions.submit.label') }}</span>
                            </button>
                        @endif
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Contacts --}}
<div class="bg-grey-card shadow-contacts">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3 p-contacts">
                <div class="cmp-contacts">
                    <div class="card w-100">
                        <div class="card-body">
                            <h2 class="title-medium-2-semi-bold">{{ __('fixcity::segnalazione.contact.heading.label') }}</h2>
                            <ul class="contact-list p-0">
                                <li><a class="list-item" href="{{ $contacts['faq'] ?? '#' }}">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-help-circle"></use></svg>
                                    <span>{{ __('fixcity::segnalazione.contact.faq.label') }}</span>
                                </a></li>
                                <li><a class="list-item" href="{{ $contacts['assistenza'] ?? '#' }}" data-element="contacts">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-mail"></use></svg>
                                    <span>{{ __('fixcity::segnalazione.contact.assistance.label') }}</span>
                                </a></li>
                                <li><a class="list-item" href="{{ $contacts['phone_url'] ?? '#' }}">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-hearing"></use></svg>
                                    <span>{{ __('fixcity::segnalazione.contact.phone.label', ['phone' => trim((string) ($contacts['phone'] ?? '05 0505'))]) }}</span>
                                </a></li>
                                <li><a class="list-item" href="{{ $contacts['appointment'] ?? '#' }}" data-element="appointment-booking">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true"><use href="{{ $sprite }}#it-calendar"></use></svg>
                                    <span>{{ __('fixcity::segnalazione.contact.appointment.label') }}</span>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
