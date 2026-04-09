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

{{-- Single root element required by Livewire --}}
<div class="ticket-wizard-root">

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

                        {{-- Luogo del disservizio --}}
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big p-lg-4">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.fields.address.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.fields.address.placeholder') }}</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="form-group bg-white p-3 mb-0 mt-3">
                                        <label class="label-input d-none mb-2" for="address">{{ __('fixcity::segnalazione.fields.address.label') }} *</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" wire:model="address" placeholder="{{ $placeholders['address'] ?? __('fixcity::segnalazione.create.address.placeholder') }}" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="link-wrapper mt-3">
                                            <a class="list-item active icon-left" href="#">
                                                <span class="list-item-title-icon-wrapper">
                                                    <svg class="icon icon-sm icon-primary mb-1" aria-hidden="true"><use href="{{ $sprite }}#it-map-marker"></use></svg>
                                                    <span class="list-item-title t-primary">{{ __('fixcity::segnalazione.fields.use_my_location.label') }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tipo di disservizio --}}
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big p-lg-4">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.fields.type.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.fields.type.description') }}</p>
                                </div>
                                <div class="card-body p-0">
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
                                </div>
                            </div>
                        </div>

                        {{-- Titolo e Dettagli --}}
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big p-lg-4">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.fields.title.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.fields.title.description') }}</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="text-area-wrapper p-3 px-lg-4 pt-lg-5 pb-lg-0 bg-white">
                                        <div class="form-group cmp-input mb-0">
                                            <label class="cmp-input__label" for="title">{{ __('fixcity::segnalazione.fields.title.label') }}*</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model="title" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="cmp-text-area m-0 p-3 px-lg-4 pt-lg-5 pb-lg-4 bg-white">
                                        <div class="form-group">
                                            <label for="details" class="d-block">{{ __('fixcity::segnalazione.fields.details.label') }}**</label>
                                            <textarea class="text-area @error('details') is-invalid @enderror" id="details" wire:model="details" rows="2" required maxlength="200"></textarea>
                                            <span class="label">{{ __('fixcity::segnalazione.fields.details.char_limit') }}</span>
                                            @error('details')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Upload Immagini --}}
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big p-lg-4">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.fields.images.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.fields.images.description') }}</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="btn-wrapper px-3 pt-2 pb-3 px-lg-4 pb-lg-4 pt-lg-0 bg-white">
                                        <label class="title-xsmall-bold u-grey-dark pb-2 ms-2">{{ __('fixcity::segnalazione.fields.images.label') }}</label>
                                        @if(count($images) > 0)
                                            @foreach($images as $index => $imagePath)
                                                <div class="upload-wrapper d-flex justify-content-between align-items-center">
                                                    <img src="{{ asset('storage/'.$imagePath) }}" alt="" class="img">
                                                    <span class="t-primary fw-bold w-100 ms-2">{{ basename($imagePath) }}</span>
                                                    <a href="#" wire:click.prevent="removeImage({{ $index }})" aria-label="elimina immagine caricata">
                                                        <svg class="icon icon-primary icon-sm mb-1">
                                                            <use href="{{ $sprite }}#it-close"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endforeach
                                            <hr>
                                        @endif
                                        <input type="file" id="imageUpload" x-ref="imageUpload" multiple accept="image/*" class="d-none" wire:change="handleImageUpload($event.target.files)">
                                        <button type="button" aria-label="{{ __('fixcity::segnalazione.fields.images.upload_label') }}" class="btn btn-primary w-100 fw-bold" @click="$refs.imageUpload.click()">
                                            <span class="rounded-icon">
                                                <svg class="icon icon-white icon-sm" aria-hidden="true">
                                                    <use href="{{ $sprite }}#it-upload"></use>
                                                </svg>
                                            </span>
                                            <span class="">{{ __('fixcity::segnalazione.fields.images.upload_button') }}</span>
                                        </button>
                                        <p class="title-xsmall u-grey-dark pt-10 mb-0">{{ __('fixcity::segnalazione.fields.images.help_text') }}</p>
                                        @error('images.*')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Autore della segnalazione --}}
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.heading.report_author.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.heading.report_author.description') }}</p>
                                </div>
                                <div class="card-body p-0">
                                    @if($userName || $userFiscalCode)
                                        <div class="cmp-info-button-card mt-3">
                                            <div class="card p-3 p-lg-4">
                                                <div class="card-body p-0">
                                                    <h3 class="big-title mb-0">{{ $userName ?: __('fixcity::segnalazione.fields.name.placeholder') }}</h3>
                                                    <p class="card-info">{{ __('fixcity::segnalazione.fields.fiscal_code.label') }} <br> <span>{{ $userFiscalCode ?: '—' }}</span></p>
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="heading-collapse-contacts">
                                                            <button class="collapsed accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-contacts" aria-expanded="false" aria-controls="collapse-contacts">
                                                                <span class="d-flex align-items-center">
                                                                {{ __('fixcity::segnalazione.actions.show_all.label') }}
                                                                    <svg class="icon icon-primary icon-sm">
                                                                        <use href="{{ $sprite }}#it-expand"></use>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div id="collapse-contacts" class="accordion-collapse collapse" role="region">
                                                            <div class="accordion-body p-0">
                                                                <div class="cmp-info-summary bg-white has-border">
                                                                    <div class="card">
                                                                        <div class="card-header border-bottom border-light p-0 mb-0 d-flex justify-content-between">
                                                                            <h4 class="title-large-semi-bold mb-3">{{ __('fixcity::segnalazione.heading.contacts.label') }}</h4>
                                                                        </div>
                                                                        <div class="card-body p-0">
                                                                            @if($userPhone)
                                                                                <div class="single-line-info border-light">
                                                                                    <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.phone.label') }}</div>
                                                                                    <div class="border-light"><p class="data-text">{{ $userPhone }}</p></div>
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
                                            </div>
                                        </div>
                                    @else
                                        <div class="cmp-info-button-card mt-3">
                                            <div class="card p-3 p-lg-4">
                                                <div class="card-body p-0">
                                                    <div class="form-group bg-white p-3 mb-3">
                                                        <label class="label-input mb-2" for="userName">{{ __('fixcity::segnalazione.fields.name.label') }}</label>
                                                        <input type="text" class="form-control" id="userName" wire:model="userName" placeholder="{{ __('fixcity::segnalazione.fields.name.placeholder') }}">
                                                    </div>
                                                    <div class="form-group bg-white p-3 mb-3">
                                                        <label class="label-input mb-2" for="userFiscalCode">{{ __('fixcity::segnalazione.fields.fiscal_code.label') }}</label>
                                                        <input type="text" class="form-control" id="userFiscalCode" wire:model="userFiscalCode" placeholder="{{ __('fixcity::segnalazione.fields.fiscal_code.placeholder') }}" maxlength="16">
                                                    </div>
                                                    <div class="form-group bg-white p-3 mb-0">
                                                        <label class="label-input mb-2" for="userPhone">{{ __('fixcity::segnalazione.fields.phone.label') }}</label>
                                                        <input type="tel" class="form-control" id="userPhone" wire:model="userPhone" placeholder="{{ __('fixcity::segnalazione.fields.phone.placeholder') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
                                                @if(count($images) > 0)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.images.label') }}</div>
                                                        <div class="border-light">
                                                            <div class="d-flex gap-2 flex-wrap">
                                                                @foreach($images as $imagePath)
                                                                    <img src="{{ asset('storage/'.$imagePath) }}" alt="" style="width:64px;height:64px;object-fit:cover;border-radius:4px;">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($email)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.email.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $email }}</p></div>
                                                    </div>
                                                @endif
                                                @if($userName)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.name.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $userName }}</p></div>
                                                    </div>
                                                @endif
                                                @if($userPhone)
                                                    <div class="single-line-info border-light">
                                                        <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.phone.label') }}</div>
                                                        <div class="border-light"><p class="data-text">{{ $userPhone }}</p></div>
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
</div>{{-- /.ticket-wizard-root --}}
