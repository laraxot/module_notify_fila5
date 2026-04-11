@props(['data' => []])

@php
    $title = $data['title'] ?? __('fixcity::segnalazione.page.title.label');
    $sprite = '/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg';
    $currentStep = $data['current_step'] ?? 2;
    $totalSteps = $data['total_steps'] ?? 3;
    $steps = $data['steps'] ?? [
        __('fixcity::segnalazione.steps.privacy.label'),
        __('fixcity::segnalazione.steps.data.label'),
        __('fixcity::segnalazione.steps.summary.label'),
    ];
    $sections = $data['sections'] ?? [];
    $placeholders = $data['placeholders'] ?? [
        'search_place' => __('fixcity::segnalazione.fields.place.placeholder'),
        'inefficiency_type' => __('fixcity::segnalazione.fields.inefficiency_type.placeholder'),
        'title' => __('fixcity::segnalazione.fields.title.placeholder'),
        'details' => __('fixcity::segnalazione.create.details.placeholder'),
    ];
    $inefficiencyTypes = $data['inefficiency_types'] ?? [
        __('fixcity::segnalazione.inefficiency_types.property_damage'),
        __('fixcity::segnalazione.inefficiency_types.maintenance'),
        __('fixcity::segnalazione.inefficiency_types.urban_decorum'),
    ];
    $contacts = is_array($data['contacts'] ?? null) ? $data['contacts'] : [];
    $phoneLabel = trim((string) ($contacts['phone'] ?? '05 0505'));
    $phoneHref = (string) ($contacts['phone_url'] ?? '#');
    $locale = app()->getLocale();
    $prevUrl = (string) ($data['prev_url'] ?? url($locale.'/tests/segnalazione-01-privacy'));
    $nextUrl = (string) ($data['next_url'] ?? url($locale.'/tests/segnalazione-03-riepilogo'));
@endphp

<div class="container" id="main-container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="cmp-breadcrumbs" role="navigation">
                <nav class="breadcrumb-container" aria-label="{{ __('fixcity::segnalazione.breadcrumb.container.label') }}">
                    <ol class="breadcrumb p-0" data-element="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ __('fixcity::segnalazione.breadcrumb.home.label') }}</a><span class="separator">/</span></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('fixcity::segnalazione.breadcrumb.services.label') }}</a><span class="separator">/</span></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="cmp-heading pb-3 pb-lg-4">
                <h1 class="title-xxxlarge">{{ $title }}</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="steppers">
                <div class="steppers-header">
                    <ul>
                        @foreach($steps as $index => $step)
                            <li class="{{ $index + 1 === $currentStep ? 'active' : ($index + 1 < $currentStep ? 'confirmed' : '') }}">
                                {{ $step }}
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
            <p class="title-xsmall d-lg-none my-5">{{ __('fixcity::segnalazione.fields.required.note.label') }}</p>
            {{-- Indice sezioni su mobile (sidebar desktop è nascosta) --}}
            <nav class="cmp-page-index-mobile d-lg-none" aria-label="{{ __('fixcity::segnalazione.heading.required_info.label') }}" data-element="page-index-mobile">
                <ul class="cmp-page-index-mobile__list">
                    <li><a href="#report-place">{{ __('fixcity::segnalazione.fields.place.label') }}</a></li>
                    <li><a href="#report-info">{{ __('fixcity::segnalazione.fields.inefficiency.label') }}</a></li>
                    <li><a href="#report-author">{{ __('fixcity::segnalazione.heading.author.label') }}</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row" x-data="{ accordionOpen: true, parentsOpen: false }">
        <div class="col-12 col-lg-3 d-lg-block mb-4 d-none">
            <div class="cmp-navscroll sticky-top" aria-labelledby="accordion-title-one">
                <nav class="navbar it-navscroll-wrapper navbar-expand-lg" data-bs-navscroll="" aria-label="{{ __('fixcity::segnalazione.heading.required_info.label') }}">
                    <div class="navbar-custom" id="navbarNavProgress">
                        <div class="menu-wrapper">
                            <div class="link-list-wrapper">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <span class="accordion-header" id="accordion-title-one">
                                            <button class="accordion-button pb-10 px-3" type="button" @click="accordionOpen = !accordionOpen" aria-expanded="true" aria-controls="collapse-one">
                                                {{ __('fixcity::segnalazione.heading.required_info.label') }}
                                                <svg class="icon icon-xs right">
                                                    <use href="{{ $sprite }}#it-expand"></use>
                                                </svg>
                                            </button>
                                        </span>
                                        <div class="progress">
                                            <div class="progress-bar it-navscroll-progressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div id="collapse-one" class="accordion-collapse collapse show" role="region" aria-labelledby="accordion-title-one" x-show="accordionOpen" x-cloak>
                                            <div class="accordion-body">
                                                <ul class="link-list" data-element="page-index">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#report-place">
                                                            <span>{{ __('fixcity::segnalazione.fields.place.label') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#report-info">
                                                            <span>{{ __('fixcity::segnalazione.fields.inefficiency.label') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#report-author">
                                                            <span>{{ __('fixcity::segnalazione.heading.author.label') }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-12 col-lg-8 offset-lg-1">
            <div class="steppers-content" aria-live="polite">
                <div class="it-page-sections-container">
                    <section class="it-page-section" id="report-place">
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big p-lg-4">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.fields.place.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.fields.place.help.label') }}</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="cmp-input-autocomplete">
                                        <div class="form-group bg-white p-3 mb-0 mt-3">
                                            <label class="label-input active d-none mb-2" for="autocomplete-regioni">{{ $placeholders['search_place'] }}</label>
                                            <input type="search" class="autocomplete" placeholder="{{ $placeholders['search_place'] }}" id="autocomplete-regioni" name="autocomplete-regioni" required>
                                            <div class="link-wrapper mt-3">
                                                <a class="list-item active icon-left" href="#">
                                                    <span class="list-item-title-icon-wrapper">
                                                        <svg class="icon icon-sm icon-primary mb-1" aria-hidden="true">
                                                            <use href="{{ $sprite }}#it-map-marker"></use>
                                                        </svg>
                                                        <span class="list-item-title t-primary">{{ __('fixcity::segnalazione.actions.use_my_location.label') }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="it-page-section" id="report-info">
                        <div class="cmp-card mb-40">
                            <div class="card has-bkg-grey shadow-sm p-big">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-3 icon-required">{{ __('fixcity::segnalazione.fields.inefficiency.label') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="select-wrapper p-md-3 p-lg-4 pb-lg-0 select-partials">
                                        <label for="inefficiency" class="visually-hidden">{{ $placeholders['inefficiency_type'] }}</label>
                                        <select id="inefficiency" class="u-grey-dark" required>
                                            <option selected="selected" value="">{{ $placeholders['inefficiency_type'] }}</option>
                                            @foreach($inefficiencyTypes as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-area-wrapper p-3 px-lg-4 pt-lg-5 pb-lg-0 bg-white">
                                        <div class="form-group cmp-input mb-0">
                                            <label class="cmp-input__label" for="title">{{ $placeholders['title'] }}</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                    </div>
                                    <div class="cmp-text-area m-0 p-3 px-lg-4 pt-lg-5 pb-lg-4 bg-white">
                                        <div class="form-group">
                                            <label for="details" class="d-block">{{ $placeholders['details'] }}</label>
                                            <textarea class="text-area" id="details" rows="2" required></textarea>
                                            <span class="label">{{ __('fixcity::segnalazione.fields.details.max_chars.label') }}</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper px-3 pt-2 pb-3 px-lg-4 pb-lg-4 pt-lg-0 bg-white"
                                         x-data="{
                                             files: [],
                                             maxFiles: 5,
                                             maxSize: 5 * 1024 * 1024,
                                             addFiles(event) {
                                                 const newFiles = Array.from(event.target.files);
                                                 newFiles.forEach(file => {
                                                     if (this.files.length < this.maxFiles && file.size <= this.maxSize) {
                                                         this.files.push({
                                                             name: file.name,
                                                             size: file.size,
                                                             type: file.type,
                                                             preview: file.type.startsWith('image/') ? URL.createObjectURL(file) : null
                                                         });
                                                     }
                                                 });
                                                 event.target.value = '';
                                             },
                                             removeFile(index) {
                                                 if (this.files[index]?.preview) {
                                                     URL.revokeObjectURL(this.files[index].preview);
                                                 }
                                                 this.files.splice(index, 1);
                                             },
                                             formatSize(bytes) {
                                                 if (bytes < 1024) return bytes + ' B';
                                                 if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
                                                 return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
                                             }
                                         }">
                                        <label class="title-xsmall-bold u-grey-dark pb-2 ms-2">{{ __('fixcity::segnalazione.fields.images.label') }}</label>

                                        {{-- Static placeholder when no files uploaded (matches reference) --}}
                                        <template x-if="files.length === 0">
                                            <div class="upload-wrapper d-flex justify-content-between align-items-center">
                                                <img src="/themes/Sixteen/design-comuni/assets/images/img-disservizio-thumbnail.png" alt="" class="img">
                                                <span class="t-primary fw-bold w-100 ms-2">img-disservizio-thumbnail.png</span>
                                                <a href="#" class="align-self-center" aria-label="{{ __('fixcity::segnalazione.actions.delete_image.aria.label') }}">
                                                    <svg class="icon icon-primary icon-sm mb-1">
                                                        <use href="{{ $sprite }}#it-close"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </template>
                                        <hr>

                                        {{-- Uploaded files preview list --}}
                                        <template x-for="(file, index) in files" :key="index">
                                            <div>
                                                <div class="upload-wrapper d-flex justify-content-between align-items-center">
                                                    <template x-if="file.preview">
                                                        <img :src="file.preview" alt="" class="img" style="width:48px;height:48px;object-fit:cover;border-radius:4px;">
                                                    </template>
                                                    <template x-if="!file.preview">
                                                        <svg class="icon icon-primary" style="width:48px;height:48px;flex-shrink:0;" aria-hidden="true">
                                                            <use href="{{ $sprite }}#it-file"></use>
                                                        </svg>
                                                    </template>
                                                    <span class="t-primary fw-bold w-100 ms-2" x-text="file.name"></span>
                                                    <a href="#" class="align-self-center" :aria-label="'elimina file ' + file.name"
                                                       @click.prevent="removeFile(index)">
                                                        <svg class="icon icon-primary icon-sm mb-1" aria-hidden="true">
                                                            <use href="{{ $sprite }}#it-close"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <hr>
                                            </div>
                                        </template>

                                        {{-- Hidden file input --}}
                                        <input type="file" id="file-upload-attachments" name="attachments[]" multiple
                                               accept="image/jpeg,image/png,image/gif,image/webp"
                                               class="d-none" @change="addFiles($event)">

                                        {{-- Upload button triggers hidden input --}}
                                        <button type="button"
                                                aria-label="{{ __('fixcity::segnalazione.actions.upload.aria.label') }}"
                                                class="btn btn-primary w-100 fw-bold"
                                                @click="document.getElementById('file-upload-attachments').click()">
                                            <span class="rounded-icon">
                                                <svg class="icon icon-white icon-sm" aria-hidden="true">
                                                    <use href="{{ $sprite }}#it-upload"></use>
                                                </svg>
                                            </span>
                                            <span>{{ __('fixcity::segnalazione.actions.upload.label') }}</span>
                                        </button>
                                        <p class="title-xsmall u-grey-dark pt-10 mb-0">{{ __('fixcity::segnalazione.fields.images.help.label') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="it-page-section" id="report-author">
                        <div class="cmp-card">
                            <div class="card has-bkg-grey shadow-sm">
                                <div class="card-header border-0 p-0 mb-lg-20 m-0">
                                    <div class="d-flex">
                                        <h2 class="title-xxlarge mb-1">{{ __('fixcity::segnalazione.heading.author.label') }}</h2>
                                    </div>
                                    <p class="subtitle-small mb-0">{{ __('fixcity::segnalazione.heading.about_you.label') }}</p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="cmp-info-button-card mt-3">
                                        <div class="card p-3 p-lg-4">
                                            <div class="card-body p-0">
                                                @if(!empty($data['user']))
                                                    <h3 class="big-title mb-0">{{ $data['user']['name'] ?? '' }}</h3>
                                                    <p class="card-info">{{ __('fixcity::segnalazione.fields.fiscal_code.label') }} <br> <span>{{ $data['user']['cf'] ?? '' }}</span></p>
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="heading-collapse-parents">
                                                            <button class="collapsed accordion-button" type="button" @click="parentsOpen = !parentsOpen" aria-expanded="false" aria-controls="collapse-parents">
                                                                <span class="d-flex align-items-center">
                                                                    {{ __('fixcity::segnalazione.actions.show_all.label') }}
                                                                    <svg class="icon icon-primary icon-sm">
                                                                        <use href="{{ $sprite }}#it-expand"></use>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div id="collapse-parents" class="accordion-collapse collapse" role="region" x-show="parentsOpen" x-cloak>
                                                            <div class="accordion-body p-0">
                                                                <div class="cmp-info-summary bg-white has-border">
                                                                    <div class="card">
                                                                        <div class="card-header border-bottom border-light p-0 mb-0 d-flex justify-content-between d-flex justify-content-end">
                                                                            <h4 class="title-large-semi-bold mb-3">{{ __('fixcity::segnalazione.heading.contacts.label') }}</h4>
                                                                        </div>
                                                                        <div class="card-body p-0">
                                                                            @if(!empty($data['user']['phone']))
                                                                                <div class="single-line-info border-light">
                                                                                    <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.phone.label') }}</div>
                                                                                    <div class="border-light">
                                                                                        <p class="data-text">{{ $data['user']['phone'] }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if(!empty($data['user']['email']))
                                                                                <div class="single-line-info border-light">
                                                                                    <div class="text-paragraph-small">{{ __('fixcity::segnalazione.fields.email.label') }}</div>
                                                                                    <div class="border-light">
                                                                                        <p class="data-text">{{ $data['user']['email'] }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-muted">{{ __('fixcity::segnalazione.messages.login_required.label') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer p-0 d-none"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="cmp-nav-steps" x-data="{ showSaveAlert: false }">
                    <nav class="steppers-nav" aria-label="{{ __('fixcity::segnalazione.wizard.nav_steps.label') }}">
                        <a href="{{ $prevUrl }}" class="btn btn-sm steppers-btn-prev p-0">
                            <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                <use href="{{ $sprite }}#it-chevron-left"></use>
                            </svg>
                            <span class="text-button-sm t-primary">{{ __('fixcity::segnalazione.actions.back.label') }}</span>
                        </a>
                        <button type="button"
                                class="btn btn-outline-primary bg-white btn-sm steppers-btn-save d-none d-lg-block saveBtn"
                                @click="showSaveAlert = true; setTimeout(() => showSaveAlert = false, 4000)">
                            <span class="text-button-sm t-primary">{{ __('fixcity::segnalazione.actions.save.label') }}</span>
                        </button>
                        <button type="button"
                                class="btn btn-outline-primary bg-white btn-sm steppers-btn-save d-block d-lg-none saveBtn center"
                                @click="showSaveAlert = true; setTimeout(() => showSaveAlert = false, 4000)">
                            <span class="text-button-sm t-primary">{{ __('fixcity::segnalazione.actions.save_short.label') }}</span>
                        </button>
                        <a href="{{ $nextUrl }}" class="btn btn-primary btn-sm steppers-btn-confirm">
                            <span class="text-button-sm">{{ __('fixcity::segnalazione.actions.next.label') }}</span>
                            <svg class="icon icon-white icon-sm" aria-hidden="true">
                                <use href="{{ $sprite }}#it-chevron-right"></use>
                            </svg>
                        </a>
                    </nav>
                    <div id="alert-message"
                         class="alert alert-success cmp-disclaimer rounded"
                         role="alert"
                         x-show="showSaveAlert"
                         x-cloak
                         x-transition>
                        <span class="d-inline-block text-uppercase cmp-disclaimer__message">{{ __('fixcity::segnalazione.alert.save_success.label') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey-card shadow-contacts">
    <div class="container">
        <div class="row d-flex justify-content-center p-contacts">
            <div class="col-12 col-lg-5">
                <div class="cmp-contacts">
                    <div class="card w-100">
                        <div class="card-body">
                            <h2 class="title-medium-2-semi-bold">{{ __('fixcity::segnalazione.contact.heading.label') }}</h2>
                            <ul class="contact-list p-0">
                                <li><a class="list-item" href="{{ $contacts['faq'] ?? '#' }}">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                        <use href="{{ $sprite }}#it-help-circle"></use>
                                    </svg><span>{{ __('fixcity::segnalazione.contact.faq.label') }}</span></a></li>
                                <li><a class="list-item" href="{{ $contacts['assistenza'] ?? '#' }}" data-element="contacts">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                        <use href="{{ $sprite }}#it-mail"></use>
                                    </svg><span>{{ __('fixcity::segnalazione.contact.assistance.label') }}</span></a></li>
                                <li><a class="list-item" href="{{ $phoneHref }}">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                        <use href="{{ $sprite }}#it-hearing"></use>
                                    </svg><span>{{ __('fixcity::segnalazione.contact.phone.label', ['phone' => $phoneLabel]) }}</span></a></li>
                                <li><a class="list-item" href="{{ $contacts['appointment'] ?? '#' }}" data-element="appointment-booking">
                                    <svg class="icon icon-primary icon-sm" aria-hidden="true">
                                        <use href="{{ $sprite }}#it-calendar"></use>
                                    </svg><span>{{ __('fixcity::segnalazione.contact.appointment.label') }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>