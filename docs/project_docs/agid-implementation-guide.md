---
title: "🚀 AGID Implementation Guide - Practical Developer Guide"
type: guide
tags: [agid, implementation, guide]
created: 2026-07-14
updated: 2026-07-14
qmd: "agid-implementation-guide 🚀 agid implementation guide - practical developer guide"
<<<<<<< HEAD
<<<<<<< HEAD
issues: ["https://github.com/provtv/<repo progetto>/issues/124"]
discussions: ["https://github.com/provtv/<repo progetto>/discussions/1"]
=======
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
>>>>>>> laraxot/dev
=======
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
>>>>>>> laraxot/dev
related:
  - "./2025-excellence-achievement.md"
  - "./architecture.md"
  - "./complete-refactoring-analysis.md"
  - "./documentation-status.md"
  - "./final-implementation-report-.md"
  - "./final-implementation-report-1.md"
  - "./final-implementation-report.md"
  - "./final-refactoring-report.md"
---

# 🚀 AGID Implementation Guide - Practical Developer Guide

**Date**: 2025-10-02  
**Target**: Developers implementing AGID-compliant features  
**Difficulty**: Intermediate  
**Estimated Time**: Follow step-by-step tutorials

---

## 📚 Table of Contents

1. [Multi-Step Form Wizard](#multi-step-form-wizard)
2. [Accordion Component](#accordion-component)
3. [FAQ System](#faq-system)
4. [Search Functionality](#search-functionality)
5. [SEO Enhancement](#seo-enhancement)

---

## 1. Multi-Step Form Wizard

### 🎯 Objective
Transform the single-page ticket creation form into a 4-step AGID-compliant wizard.

### 📦 Components Created
- `<x-ui::stepper>`
- `<x-ui::stepper-step>`
- Translations: `ui::stepper.*`

### 💻 Implementation

#### Step 1: Update Ticket Creation Form

<<<<<<< HEAD
<<<<<<< HEAD
**File**: `Modules/<nome progetto>/resources/views/tickets/create.blade.php`
=======
**File**: `Modules/Fixcity/resources/views/tickets/create.blade.php`
>>>>>>> laraxot/dev
=======
**File**: `Modules/Fixcity/resources/views/tickets/create.blade.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/resources/views/tickets/create.blade.php`

```blade
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.create.title') }}
=======
            {{ __('fixcity::ticket.create.title') }}
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::ticket.create.title') }}
>>>>>>> laraxot/dev
            {{ __('laraxot::ticket.create.title') }}
        </h1>
        
        <form 
            action="{{ route('tickets.store') }}" 
            method="POST"
            enctype="multipart/form-data"
            x-data="ticketWizard()"
            @submit.prevent="submitForm"
        >
            @csrf
            
            <x-ui::stepper
                :total-steps="4"
                :steps="[
                    1 => __('laraxot::ticket.create.step_privacy'),
                    2 => __('laraxot::ticket.create.step_data'),
                    3 => __('laraxot::ticket.create.step_summary'),
                    4 => __('laraxot::ticket.create.step_confirmation'),
                ]"
            >
                {{-- Step 1: Privacy Consent --}}
                <x-ui::stepper-step 
                    :number="1" 
<<<<<<< HEAD
<<<<<<< HEAD
                    :title="__('<nome progetto>::ticket.create.privacy_title')"
                >
                    @include('<nome progetto>::tickets.steps.privacy')
=======
                    :title="__('fixcity::ticket.create.privacy_title')"
                >
                    @include('fixcity::tickets.steps.privacy')
>>>>>>> laraxot/dev
=======
                    :title="__('fixcity::ticket.create.privacy_title')"
                >
                    @include('fixcity::tickets.steps.privacy')
>>>>>>> laraxot/dev
                </x-ui::stepper-step>
                
                {{-- Step 2: Data Entry --}}
                <x-ui::stepper-step 
                    :number="2" 
<<<<<<< HEAD
<<<<<<< HEAD
                    :title="__('<nome progetto>::ticket.create.data_title')"
                >
                    @include('<nome progetto>::tickets.steps.data')
=======
                    :title="__('fixcity::ticket.create.data_title')"
                >
                    @include('fixcity::tickets.steps.data')
>>>>>>> laraxot/dev
=======
                    :title="__('fixcity::ticket.create.data_title')"
                >
                    @include('fixcity::tickets.steps.data')
>>>>>>> laraxot/dev
                </x-ui::stepper-step>
                
                {{-- Step 3: Summary --}}
                <x-ui::stepper-step 
                    :number="3" 
<<<<<<< HEAD
<<<<<<< HEAD
                    :title="__('<nome progetto>::ticket.create.summary_title')"
                >
                    @include('<nome progetto>::tickets.steps.summary')
=======
                    :title="__('fixcity::ticket.create.summary_title')"
                >
                    @include('fixcity::tickets.steps.summary')
>>>>>>> laraxot/dev
=======
                    :title="__('fixcity::ticket.create.summary_title')"
                >
                    @include('fixcity::tickets.steps.summary')
>>>>>>> laraxot/dev
                </x-ui::stepper-step>
                
                {{-- Step 4: Confirmation --}}
                <x-ui::stepper-step 
                    :number="4" 
<<<<<<< HEAD
<<<<<<< HEAD
                    :title="__('<nome progetto>::ticket.create.confirmation_title')"
                >
                    @include('<nome progetto>::tickets.steps.confirmation')
=======
                    :title="__('fixcity::ticket.create.confirmation_title')"
                >
                    @include('fixcity::tickets.steps.confirmation')
>>>>>>> laraxot/dev
=======
                    :title="__('fixcity::ticket.create.confirmation_title')"
                >
                    @include('fixcity::tickets.steps.confirmation')
>>>>>>> laraxot/dev
                </x-ui::stepper-step>
            </x-ui::stepper>
        </form>
    </div>
    
    @push('scripts')
    <script>
        function ticketWizard() {
            return {
                formData: {
                    privacy_consent: false,
                    category_id: '',
                    title: '',
                    description: '',
                    latitude: null,
                    longitude: null,
                    address: '',
                    photos: [],
                    name: '{{ auth()->user()->name ?? "" }}',
                    email: '{{ auth()->user()->email ?? "" }}',
                    phone: '',
                },
                
                submitForm() {
                    // Validate all steps
                    if (!this.validateAllSteps()) {
<<<<<<< HEAD
<<<<<<< HEAD
                        alert('{{ __("<nome progetto>::ticket.create.validation_error") }}');
=======
                        alert('{{ __("fixcity::ticket.create.validation_error") }}');
>>>>>>> laraxot/dev
=======
                        alert('{{ __("fixcity::ticket.create.validation_error") }}');
>>>>>>> laraxot/dev
                        alert('{{ __("laraxot::ticket.create.validation_error") }}');
                        return;
                    }
                    
                    // Submit form
                    this.$el.submit();
                },
                
                validateAllSteps() {
                    return this.formData.privacy_consent &&
                           this.formData.category_id &&
                           this.formData.title &&
                           this.formData.description;
                }
            }
        }
    </script>
    @endpush
</x-app-layout>
```

#### Step 2: Create Step Partials

<<<<<<< HEAD
<<<<<<< HEAD
**File**: `Modules/<nome progetto>/resources/views/tickets/steps/privacy.blade.php`
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/privacy.blade.php`
>>>>>>> laraxot/dev
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/privacy.blade.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/resources/views/tickets/steps/privacy.blade.php`

```blade
<div class="privacy-step">
    <div class="alert alert-info mb-4">
        <h3 class="alert-heading">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.privacy.heading') }}
        </h3>
        <p>{{ __('<nome progetto>::ticket.privacy.intro') }}</p>
=======
            {{ __('fixcity::ticket.privacy.heading') }}
        </h3>
        <p>{{ __('fixcity::ticket.privacy.intro') }}</p>
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::ticket.privacy.heading') }}
        </h3>
        <p>{{ __('fixcity::ticket.privacy.intro') }}</p>
>>>>>>> laraxot/dev
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.privacy.policy_title') }}
            </h4>
            
            <div class="privacy-policy-text" style="max-height: 300px; overflow-y: auto;">
                {!! __('<nome progetto>::ticket.privacy.policy_content') !!}
=======
=======
>>>>>>> laraxot/dev
                {{ __('fixcity::ticket.privacy.policy_title') }}
            </h4>
            
            <div class="privacy-policy-text" style="max-height: 300px; overflow-y: auto;">
                {!! __('fixcity::ticket.privacy.policy_content') !!}
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
            </div>
        </div>
    </div>
    
    <div class="form-check">
        <input 
            type="checkbox" 
            class="form-check-input" 
            id="privacy_consent"
            x-model="formData.privacy_consent"
            required
        >
        <label class="form-check-label" for="privacy_consent">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.privacy.consent_label') }}
=======
            {{ __('fixcity::ticket.privacy.consent_label') }}
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::ticket.privacy.consent_label') }}
>>>>>>> laraxot/dev
            {{ __('laraxot::ticket.privacy.consent_label') }}
            <span class="text-danger">*</span>
        </label>
    </div>
    
    <p class="text-muted small mt-2">
<<<<<<< HEAD
<<<<<<< HEAD
        {{ __('<nome progetto>::ticket.privacy.required_info') }}
=======
        {{ __('fixcity::ticket.privacy.required_info') }}
>>>>>>> laraxot/dev
=======
        {{ __('fixcity::ticket.privacy.required_info') }}
>>>>>>> laraxot/dev
        {{ __('laraxot::ticket.privacy.required_info') }}
    </p>
</div>
```

<<<<<<< HEAD
<<<<<<< HEAD
**File**: `Modules/<nome progetto>/resources/views/tickets/steps/data.blade.php`
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/data.blade.php`
>>>>>>> laraxot/dev
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/data.blade.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/resources/views/tickets/steps/data.blade.php`

```blade
<div class="data-step">
    {{-- Category Selection --}}
    <fieldset class="mb-4">
        <legend class="h5">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.fields.category.label') }}
=======
            {{ __('fixcity::ticket.fields.category.label') }}
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::ticket.fields.category.label') }}
>>>>>>> laraxot/dev
            {{ __('laraxot::ticket.fields.category.label') }}
            <span class="text-danger">*</span>
        </legend>
        
        <select 
            name="category_id" 
            id="category_id"
            class="form-select"
            x-model="formData.category_id"
            required
        >
<<<<<<< HEAD
<<<<<<< HEAD
            <option value="">{{ __('<nome progetto>::ticket.fields.category.placeholder') }}</option>
            @foreach(\Modules\<nome progetto>\Enums\TicketTypeEnum::cases() as $type)
=======
            <option value="">{{ __('fixcity::ticket.fields.category.placeholder') }}</option>
            @foreach(\Modules\Fixcity\Enums\TicketTypeEnum::cases() as $type)
>>>>>>> laraxot/dev
=======
            <option value="">{{ __('fixcity::ticket.fields.category.placeholder') }}</option>
            @foreach(\Modules\Fixcity\Enums\TicketTypeEnum::cases() as $type)
>>>>>>> laraxot/dev
            <option value="">{{ __('laraxot::ticket.fields.category.placeholder') }}</option>
            @foreach(\Modules\App\Enums\TicketTypeEnum::cases() as $type)
                <option value="{{ $type->value }}">{{ $type->label() }}</option>
            @endforeach
        </select>
    </fieldset>
    
    {{-- Location --}}
    <fieldset class="mb-4">
        <legend class="h5">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.fields.location.label') }}
            <span class="text-danger">*</span>
        </legend>
        <p class="text-muted small">
            {{ __('<nome progetto>::ticket.fields.location.help') }}
        </p>
        
        <x-<nome progetto>::map-picker
            <span class="text-danger">*</span>
        </legend>
        <p class="text-muted small">
            {{ __('<nome progetto>::ticket.fields.location.help') }}
        </p>
        
        <x-<nome progetto>::map-picker
=======
=======
>>>>>>> laraxot/dev
            {{ __('fixcity::ticket.fields.location.label') }}
            <span class="text-danger">*</span>
        </legend>
        <p class="text-muted small">
            {{ __('fixcity::ticket.fields.location.help') }}
        </p>
        
        <x-fixcity::map-picker
            <span class="text-danger">*</span>
        </legend>
        <p class="text-muted small">
            {{ __('fixcity::ticket.fields.location.help') }}
        </p>
        
        <x-fixcity::map-picker
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
            name="location"
            :center="[41.9028, 12.4964]"
            :zoom="13"
            x-model:latitude="formData.latitude"
            x-model:longitude="formData.longitude"
            x-model:address="formData.address"
        />
        
        <input type="hidden" name="latitude" x-model="formData.latitude">
        <input type="hidden" name="longitude" x-model="formData.longitude">
        <input type="hidden" name="address" x-model="formData.address">
    </fieldset>
    
    {{-- Issue Details --}}
    <fieldset class="mb-4">
        <legend class="h5">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.fields.details.label') }}
=======
            {{ __('fixcity::ticket.fields.details.label') }}
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::ticket.fields.details.label') }}
>>>>>>> laraxot/dev
            {{ __('laraxot::ticket.fields.details.label') }}
        </legend>
        
        <div class="mb-3">
            <label for="title" class="form-label">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.fields.title.label') }}
=======
                {{ __('fixcity::ticket.fields.title.label') }}
>>>>>>> laraxot/dev
=======
                {{ __('fixcity::ticket.fields.title.label') }}
>>>>>>> laraxot/dev
                {{ __('laraxot::ticket.fields.title.label') }}
                <span class="text-danger">*</span>
            </label>
            <input 
                type="text" 
                class="form-control" 
                id="title"
                name="title"
                x-model="formData.title"
<<<<<<< HEAD
<<<<<<< HEAD
                :placeholder="__('<nome progetto>::ticket.fields.title.placeholder')"
=======
                :placeholder="__('fixcity::ticket.fields.title.placeholder')"
>>>>>>> laraxot/dev
=======
                :placeholder="__('fixcity::ticket.fields.title.placeholder')"
>>>>>>> laraxot/dev
                :placeholder="__('laraxot::ticket.fields.title.placeholder')"
                required
                maxlength="255"
            >
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.fields.description.label') }}
=======
                {{ __('fixcity::ticket.fields.description.label') }}
>>>>>>> laraxot/dev
=======
                {{ __('fixcity::ticket.fields.description.label') }}
>>>>>>> laraxot/dev
                {{ __('laraxot::ticket.fields.description.label') }}
                <span class="text-danger">*</span>
            </label>
            <textarea 
                class="form-control" 
                id="description"
                name="description"
                rows="5"
                x-model="formData.description"
<<<<<<< HEAD
<<<<<<< HEAD
                :placeholder="__('<nome progetto>::ticket.fields.description.placeholder')"
                required
            ></textarea>
            <div class="form-text">
                {{ __('<nome progetto>::ticket.fields.description.help') }}
=======
=======
>>>>>>> laraxot/dev
                :placeholder="__('fixcity::ticket.fields.description.placeholder')"
                required
            ></textarea>
            <div class="form-text">
                {{ __('fixcity::ticket.fields.description.help') }}
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
            </div>
        </div>
        
        <div class="mb-3">
            <label for="photos" class="form-label">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.fields.photos.label') }}
=======
                {{ __('fixcity::ticket.fields.photos.label') }}
>>>>>>> laraxot/dev
=======
                {{ __('fixcity::ticket.fields.photos.label') }}
>>>>>>> laraxot/dev
                {{ __('laraxot::ticket.fields.photos.label') }}
            </label>
            <input 
                type="file" 
                class="form-control" 
                id="photos"
                name="photos[]"
                multiple
                accept="image/*"
                @change="formData.photos = Array.from($event.target.files)"
            >
            <div class="form-text">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.fields.photos.help') }}
=======
                {{ __('fixcity::ticket.fields.photos.help') }}
>>>>>>> laraxot/dev
=======
                {{ __('fixcity::ticket.fields.photos.help') }}
>>>>>>> laraxot/dev
                {{ __('laraxot::ticket.fields.photos.help') }}
            </div>
        </div>
    </fieldset>
    
    {{-- Reporter Information --}}
    <fieldset class="mb-4">
        <legend class="h5">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::ticket.fields.reporter.label') }}
=======
            {{ __('fixcity::ticket.fields.reporter.label') }}
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::ticket.fields.reporter.label') }}
>>>>>>> laraxot/dev
            {{ __('laraxot::ticket.fields.reporter.label') }}
        </legend>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">
<<<<<<< HEAD
<<<<<<< HEAD
                    {{ __('<nome progetto>::ticket.fields.name.label') }}
=======
                    {{ __('fixcity::ticket.fields.name.label') }}
>>>>>>> laraxot/dev
=======
                    {{ __('fixcity::ticket.fields.name.label') }}
>>>>>>> laraxot/dev
                    {{ __('laraxot::ticket.fields.name.label') }}
                    <span class="text-danger">*</span>
                </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    name="name"
                    x-model="formData.name"
                    required
                >
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">
<<<<<<< HEAD
<<<<<<< HEAD
                    {{ __('<nome progetto>::ticket.fields.email.label') }}
=======
                    {{ __('fixcity::ticket.fields.email.label') }}
>>>>>>> laraxot/dev
=======
                    {{ __('fixcity::ticket.fields.email.label') }}
>>>>>>> laraxot/dev
                    {{ __('laraxot::ticket.fields.email.label') }}
                    <span class="text-danger">*</span>
                </label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email"
                    name="email"
                    x-model="formData.email"
                    required
                >
            </div>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.fields.phone.label') }}
=======
                {{ __('fixcity::ticket.fields.phone.label') }}
>>>>>>> laraxot/dev
=======
                {{ __('fixcity::ticket.fields.phone.label') }}
>>>>>>> laraxot/dev
                {{ __('laraxot::ticket.fields.phone.label') }}
            </label>
            <input 
                type="tel" 
                class="form-control" 
                id="phone"
                name="phone"
                x-model="formData.phone"
            >
            <div class="form-text">
<<<<<<< HEAD
<<<<<<< HEAD
                {{ __('<nome progetto>::ticket.fields.phone.help') }}
=======
                {{ __('fixcity::ticket.fields.phone.help') }}
>>>>>>> laraxot/dev
=======
                {{ __('fixcity::ticket.fields.phone.help') }}
>>>>>>> laraxot/dev
                {{ __('laraxot::ticket.fields.phone.help') }}
            </div>
        </div>
    </fieldset>
</div>
```

<<<<<<< HEAD
<<<<<<< HEAD
**File**: `Modules/<nome progetto>/resources/views/tickets/steps/summary.blade.php`
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/summary.blade.php`
>>>>>>> laraxot/dev
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/summary.blade.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/resources/views/tickets/steps/summary.blade.php`

```blade
<div class="summary-step">
    <div class="alert alert-warning">
<<<<<<< HEAD
<<<<<<< HEAD
        <strong>{{ __('<nome progetto>::ticket.summary.review_heading') }}</strong>
        <p>{{ __('<nome progetto>::ticket.summary.review_text') }}</p>
    </div>
    
    <dl class="row">
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.category.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.category_id"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.title.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.title"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.description.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.description"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.location.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.address || 'N/A'"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.photos.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.photos.length + ' {{ __("<nome progetto>::ticket.summary.photos_count") }}'"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.name.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.name"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.email.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.email"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.phone.label') }}</dt>
    </div>
    
    <dl class="row">
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.category.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.category_id"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.title.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.title"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.description.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.description"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.location.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.address || 'N/A'"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.photos.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.photos.length + ' {{ __("<nome progetto>::ticket.summary.photos_count") }}'"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.name.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.name"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.email.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.email"></dd>
        
        <dt class="col-sm-3">{{ __('<nome progetto>::ticket.fields.phone.label') }}</dt>
=======
=======
>>>>>>> laraxot/dev
        <strong>{{ __('fixcity::ticket.summary.review_heading') }}</strong>
        <p>{{ __('fixcity::ticket.summary.review_text') }}</p>
    </div>
    
    <dl class="row">
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.category.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.category_id"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.title.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.title"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.description.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.description"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.location.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.address || 'N/A'"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.photos.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.photos.length + ' {{ __("fixcity::ticket.summary.photos_count") }}'"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.name.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.name"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.email.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.email"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.phone.label') }}</dt>
    </div>
    
    <dl class="row">
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.category.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.category_id"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.title.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.title"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.description.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.description"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.location.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.address || 'N/A'"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.photos.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.photos.length + ' {{ __("fixcity::ticket.summary.photos_count") }}'"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.name.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.name"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.email.label') }}</dt>
        <dd class="col-sm-9" x-text="formData.email"></dd>
        
        <dt class="col-sm-3">{{ __('fixcity::ticket.fields.phone.label') }}</dt>
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        <dd class="col-sm-9" x-text="formData.phone || 'N/A'"></dd>
    </dl>
    
    <div class="alert alert-info mt-4">
        <svg class="icon icon-info" aria-hidden="true">
            <use href="#it-info-circle"></use>
        </svg>
<<<<<<< HEAD
<<<<<<< HEAD
        <strong>{{ __('<nome progetto>::ticket.summary.notification_heading') }}</strong>
        <p>{{ __('<nome progetto>::ticket.summary.notification_text', ['email' => '']) }}</p>
=======
        <strong>{{ __('fixcity::ticket.summary.notification_heading') }}</strong>
        <p>{{ __('fixcity::ticket.summary.notification_text', ['email' => '']) }}</p>
>>>>>>> laraxot/dev
=======
        <strong>{{ __('fixcity::ticket.summary.notification_heading') }}</strong>
        <p>{{ __('fixcity::ticket.summary.notification_text', ['email' => '']) }}</p>
>>>>>>> laraxot/dev
        <strong>{{ __('laraxot::ticket.summary.notification_heading') }}</strong>
        <p>{{ __('laraxot::ticket.summary.notification_text', ['email' => '']) }}</p>
    </div>
</div>
```

<<<<<<< HEAD
<<<<<<< HEAD
**File**: `Modules/<nome progetto>/resources/views/tickets/steps/confirmation.blade.php`
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/confirmation.blade.php`
>>>>>>> laraxot/dev
=======
**File**: `Modules/Fixcity/resources/views/tickets/steps/confirmation.blade.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/resources/views/tickets/steps/confirmation.blade.php`

```blade
<div class="confirmation-step text-center">
    <div class="icon-success mb-4">
        <svg class="icon icon-xl icon-success" aria-hidden="true">
            <use href="#it-check-circle"></use>
        </svg>
    </div>
    
<<<<<<< HEAD
<<<<<<< HEAD
    <h2 class="mb-3">{{ __('<nome progetto>::ticket.confirmation.success_heading') }}</h2>
    
    <p class="lead text-muted">
        {{ __('<nome progetto>::ticket.confirmation.success_text') }}
=======
=======
>>>>>>> laraxot/dev
    <h2 class="mb-3">{{ __('fixcity::ticket.confirmation.success_heading') }}</h2>
    
    <p class="lead text-muted">
        {{ __('fixcity::ticket.confirmation.success_text') }}
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    </p>
    
    <div class="alert alert-success my-4">
        <p class="mb-0">
<<<<<<< HEAD
<<<<<<< HEAD
            <strong>{{ __('<nome progetto>::ticket.confirmation.next_steps_heading') }}</strong>
        </p>
        <ol class="text-start mt-3">
            <li>{{ __('<nome progetto>::ticket.confirmation.step_1') }}</li>
            <li>{{ __('<nome progetto>::ticket.confirmation.step_2') }}</li>
            <li>{{ __('<nome progetto>::ticket.confirmation.step_3') }}</li>
=======
=======
>>>>>>> laraxot/dev
            <strong>{{ __('fixcity::ticket.confirmation.next_steps_heading') }}</strong>
        </p>
        <ol class="text-start mt-3">
            <li>{{ __('fixcity::ticket.confirmation.step_1') }}</li>
            <li>{{ __('fixcity::ticket.confirmation.step_2') }}</li>
            <li>{{ __('fixcity::ticket.confirmation.step_3') }}</li>
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        </ol>
    </div>
</div>
```

### ✅ Testing Checklist

- [ ] All 4 steps render correctly
- [ ] Progress indicator updates
- [ ] Navigation buttons work (Next/Previous)
- [ ] Form validation works per step
- [ ] Summary displays all entered data
- [ ] Form submits successfully
- [ ] Keyboard navigation works (Tab, Enter)
- [ ] Screen reader announces step changes
- [ ] Mobile responsive
- [ ] Works without JavaScript (graceful degradation)

---

## 2. Accordion Component

### 🎯 Objective
Create FAQ pages with AGID-compliant accordion UI.

### 💻 Implementation

<<<<<<< HEAD
<<<<<<< HEAD
**File**: `Modules/<nome progetto>/resources/views/faq/index.blade.php`
=======
**File**: `Modules/Fixcity/resources/views/faq/index.blade.php`
>>>>>>> laraxot/dev
=======
**File**: `Modules/Fixcity/resources/views/faq/index.blade.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/resources/views/faq/index.blade.php`

```blade
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::faq.title') }}
        </h1>
        <p class="text-lg text-gray-600 mb-8">
            {{ __('<nome progetto>::faq.subtitle') }}
=======
=======
>>>>>>> laraxot/dev
            {{ __('fixcity::faq.title') }}
        </h1>
        <p class="text-lg text-gray-600 mb-8">
            {{ __('fixcity::faq.subtitle') }}
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
        </p>
        
        {{-- Search FAQ --}}
        <div class="mb-6">
            <div class="relative">
                <input 
                    type="search" 
                    class="form-control"
<<<<<<< HEAD
<<<<<<< HEAD
                    placeholder="{{ __('<nome progetto>::faq.search_placeholder') }}"
=======
                    placeholder="{{ __('fixcity::faq.search_placeholder') }}"
>>>>>>> laraxot/dev
=======
                    placeholder="{{ __('fixcity::faq.search_placeholder') }}"
>>>>>>> laraxot/dev
                    placeholder="{{ __('laraxot::faq.search_placeholder') }}"
                    x-data
                    x-on:input.debounce.300ms="searchFaq($event.target.value)"
                >
                <svg class="icon icon-sm position-absolute top-50 end-0 translate-middle-y me-3" aria-hidden="true">
                    <use href="#it-search"></use>
                </svg>
            </div>
        </div>
        
        @foreach($faqsByCategory as $categoryName => $faqs)
            <section class="mb-6">
                <h2 class="h4 mb-3">{{ $categoryName }}</h2>
                
                <x-ui::accordion id="faq-{{ Str::slug($categoryName) }}">
                    @foreach($faqs as $index => $faq)
                        <x-ui::accordion-item
                            :title="$faq->question"
                            :id="'faq-' . $faq->id"
                            :parent-id="'faq-' . Str::slug($categoryName)"
                            :open="$index === 0"
                        >
                            <div class="faq-answer">
                                {!! $faq->answer !!}
                            </div>
                            
                            @if($faq->related_links)
                                <div class="related-links mt-3">
<<<<<<< HEAD
<<<<<<< HEAD
                                    <strong>{{ __('<nome progetto>::faq.related_links') }}:</strong>
=======
                                    <strong>{{ __('fixcity::faq.related_links') }}:</strong>
>>>>>>> laraxot/dev
=======
                                    <strong>{{ __('fixcity::faq.related_links') }}:</strong>
>>>>>>> laraxot/dev
                                    <strong>{{ __('laraxot::faq.related_links') }}:</strong>
                                    <ul>
                                        @foreach($faq->related_links as $link)
                                            <li>
                                                <a href="{{ $link['url'] }}">
                                                    {{ $link['text'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </x-ui::accordion-item>
                    @endforeach
                </x-ui::accordion>
            </section>
        @endforeach
        
        {{-- Still need help? --}}
        <div class="card bg-light mt-8">
            <div class="card-body text-center">
                <h3 class="card-title">
<<<<<<< HEAD
<<<<<<< HEAD
                    {{ __('<nome progetto>::faq.need_help_title') }}
                </h3>
                <p class="card-text">
                    {{ __('<nome progetto>::faq.need_help_text') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    {{ __('<nome progetto>::faq.contact_button') }}
                </h3>
                <p class="card-text">
                    {{ __('<nome progetto>::faq.need_help_text') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    {{ __('<nome progetto>::faq.contact_button') }}
=======
=======
>>>>>>> laraxot/dev
                    {{ __('fixcity::faq.need_help_title') }}
                </h3>
                <p class="card-text">
                    {{ __('fixcity::faq.need_help_text') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    {{ __('fixcity::faq.contact_button') }}
                </h3>
                <p class="card-text">
                    {{ __('fixcity::faq.need_help_text') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    {{ __('fixcity::faq.contact_button') }}
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
```

<<<<<<< HEAD
<<<<<<< HEAD
**Model**: `Modules/<nome progetto>/app/Models/Faq.php`
=======
**Model**: `Modules/Fixcity/app/Models/Faq.php`
>>>>>>> laraxot/dev
=======
**Model**: `Modules/Fixcity/app/Models/Faq.php`
>>>>>>> laraxot/dev
**Model**: `Modules/App/app/Models/Faq.php`

```php
<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\<nome progetto>\Models;
=======
namespace Modules\Fixcity\Models;
>>>>>>> laraxot/dev
=======
namespace Modules\Fixcity\Models;
>>>>>>> laraxot/dev
namespace Modules\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $fillable = [
        'category_id',
        'question',
        'answer',
        'related_links',
        'order',
        'is_published',
    ];
    
    protected $casts = [
        'related_links' => 'array',
        'is_published' => 'boolean',
    ];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }
    
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
```

**Migration**:
```bash
<<<<<<< HEAD
<<<<<<< HEAD
php artisan make:migration create_faqs_table --path=Modules/<nome progetto>/database/Migrations
=======
php artisan make:migration create_faqs_table --path=Modules/Fixcity/database/Migrations
>>>>>>> laraxot/dev
=======
php artisan make:migration create_faqs_table --path=Modules/Fixcity/database/Migrations
>>>>>>> laraxot/dev
php artisan make:migration create_faqs_table --path=Modules/App/database/Migrations
```

```php
Schema::create('faqs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id')->constrained('faq_categories')->onDelete('cascade');
    $table->string('question');
    $table->text('answer');
    $table->json('related_links')->nullable();
    $table->integer('order')->default(0);
    $table->boolean('is_published')->default(true);
    $table->timestamps();
});
```

---

## 3. Search Functionality

### 🎯 Objective
Implement full-text search with Laravel Scout.

### 📦 Installation

```bash
composer require laravel/scout
composer require meilisearch/meilisearch-php
```

**Config**: `config/scout.php`
```php
'driver' => env('SCOUT_DRIVER', 'meilisearch'),
```

**Environment**: `.env`
```
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://localhost:7700
MEILISEARCH_KEY=your-master-key
```

### 💻 Implementation

<<<<<<< HEAD
<<<<<<< HEAD
**Model**: `Modules/<nome progetto>/app/Models/Ticket.php`
=======
**Model**: `Modules/Fixcity/app/Models/Ticket.php`
>>>>>>> laraxot/dev
=======
**Model**: `Modules/Fixcity/app/Models/Ticket.php`
>>>>>>> laraxot/dev
**Model**: `Modules/App/app/Models/Ticket.php`

```php
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use Searchable;
    
    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'tracking_code' => $this->tracking_code,
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'status' => $this->status->value,
            'type' => $this->type->value,
            'created_at' => $this->created_at->timestamp,
        ];
    }
    
    /**
     * Get the index name for the model.
     */
    public function searchableAs(): string
    {
        return 'tickets_index';
    }
}
```

<<<<<<< HEAD
<<<<<<< HEAD
**Controller**: `Modules/<nome progetto>/app/Http/Controllers/SearchController.php`
=======
**Controller**: `Modules/Fixcity/app/Http/Controllers/SearchController.php`
>>>>>>> laraxot/dev
=======
**Controller**: `Modules/Fixcity/app/Http/Controllers/SearchController.php`
>>>>>>> laraxot/dev
**Controller**: `Modules/App/app/Http/Controllers/SearchController.php`

```php
<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\<nome progetto>\Http\Controllers;

use Illuminate\Http\Request;
use Modules\<nome progetto>\Models\Ticket;
=======
=======
>>>>>>> laraxot/dev
namespace Modules\Fixcity\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Fixcity\Models\Ticket;
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev

class SearchController
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        if (empty($query)) {
<<<<<<< HEAD
<<<<<<< HEAD
            return view('<nome progetto>::search.index', [
=======
            return view('fixcity::search.index', [
>>>>>>> laraxot/dev
=======
            return view('fixcity::search.index', [
>>>>>>> laraxot/dev
            return view('laraxot::search.index', [
                'query' => '',
                'results' => collect(),
                'total' => 0,
            ]);
        }
        
        $results = Ticket::search($query)
            ->query(fn ($builder) => $builder->with(['owner', 'responsible']))
            ->paginate(20);
        
<<<<<<< HEAD
<<<<<<< HEAD
        return view('<nome progetto>::search.index', [
=======
        return view('fixcity::search.index', [
>>>>>>> laraxot/dev
=======
        return view('fixcity::search.index', [
>>>>>>> laraxot/dev
        return view('laraxot::search.index', [
            'query' => $query,
            'results' => $results,
            'total' => $results->total(),
        ]);
    }
}
```

**Route**:
```php
Route::get('/search', [SearchController::class, 'index'])->name('search');
```

<<<<<<< HEAD
<<<<<<< HEAD
**View**: `Modules/<nome progetto>/resources/views/search/index.blade.php`
=======
**View**: `Modules/Fixcity/resources/views/search/index.blade.php`
>>>>>>> laraxot/dev
=======
**View**: `Modules/Fixcity/resources/views/search/index.blade.php`
>>>>>>> laraxot/dev
**View**: `Modules/App/resources/views/search/index.blade.php`

```blade
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">
<<<<<<< HEAD
<<<<<<< HEAD
            {{ __('<nome progetto>::search.title') }}
=======
            {{ __('fixcity::search.title') }}
>>>>>>> laraxot/dev
=======
            {{ __('fixcity::search.title') }}
>>>>>>> laraxot/dev
            {{ __('laraxot::search.title') }}
        </h1>
        
        {{-- Search Form --}}
        <form action="{{ route('search') }}" method="GET" class="mb-6">
            <div class="input-group">
                <input 
                    type="search" 
                    name="q" 
                    class="form-control form-control-lg"
                    value="{{ $query }}"
<<<<<<< HEAD
<<<<<<< HEAD
                    placeholder="{{ __('<nome progetto>::search.placeholder') }}"
=======
                    placeholder="{{ __('fixcity::search.placeholder') }}"
>>>>>>> laraxot/dev
=======
                    placeholder="{{ __('fixcity::search.placeholder') }}"
>>>>>>> laraxot/dev
                    placeholder="{{ __('laraxot::search.placeholder') }}"
                    autofocus
                >
                <button type="submit" class="btn btn-primary">
                    <svg class="icon icon-white" aria-hidden="true">
                        <use href="#it-search"></use>
                    </svg>
<<<<<<< HEAD
<<<<<<< HEAD
                    {{ __('<nome progetto>::search.button') }}
=======
                    {{ __('fixcity::search.button') }}
>>>>>>> laraxot/dev
=======
                    {{ __('fixcity::search.button') }}
>>>>>>> laraxot/dev
                    {{ __('laraxot::search.button') }}
                </button>
            </div>
        </form>
        
        @if($query)
            <div class="search-results">
                <p class="text-muted mb-4">
<<<<<<< HEAD
<<<<<<< HEAD
                    {{ trans_choice('<nome progetto>::search.results_count', $total, ['count' => $total, 'query' => $query]) }}
=======
                    {{ trans_choice('fixcity::search.results_count', $total, ['count' => $total, 'query' => $query]) }}
>>>>>>> laraxot/dev
=======
                    {{ trans_choice('fixcity::search.results_count', $total, ['count' => $total, 'query' => $query]) }}
>>>>>>> laraxot/dev
                    {{ trans_choice('laraxot::search.results_count', $total, ['count' => $total, 'query' => $query]) }}
                </p>
                
                @if($results->isEmpty())
                    <div class="alert alert-info">
                        <h3 class="alert-heading">
<<<<<<< HEAD
<<<<<<< HEAD
                            {{ __('<nome progetto>::search.no_results_heading') }}
                        </h3>
                        <p>{{ __('<nome progetto>::search.no_results_text') }}</p>
                        <ul>
                            <li>{{ __('<nome progetto>::search.tip_1') }}</li>
                            <li>{{ __('<nome progetto>::search.tip_2') }}</li>
                            <li>{{ __('<nome progetto>::search.tip_3') }}</li>
                        </h3>
                        <p>{{ __('<nome progetto>::search.no_results_text') }}</p>
                        <ul>
                            <li>{{ __('<nome progetto>::search.tip_1') }}</li>
                            <li>{{ __('<nome progetto>::search.tip_2') }}</li>
                            <li>{{ __('<nome progetto>::search.tip_3') }}</li>
=======
=======
>>>>>>> laraxot/dev
                            {{ __('fixcity::search.no_results_heading') }}
                        </h3>
                        <p>{{ __('fixcity::search.no_results_text') }}</p>
                        <ul>
                            <li>{{ __('fixcity::search.tip_1') }}</li>
                            <li>{{ __('fixcity::search.tip_2') }}</li>
                            <li>{{ __('fixcity::search.tip_3') }}</li>
                        </h3>
                        <p>{{ __('fixcity::search.no_results_text') }}</p>
                        <ul>
                            <li>{{ __('fixcity::search.tip_1') }}</li>
                            <li>{{ __('fixcity::search.tip_2') }}</li>
                            <li>{{ __('fixcity::search.tip_3') }}</li>
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
                        </ul>
                    </div>
                @else
                    <div class="results-list">
                        @foreach($results as $ticket)
                            <article class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="{{ route('tickets.show', $ticket) }}">
                                            {{ $ticket->title }}
                                        </a>
                                    </h3>
                                    <p class="card-text">
                                        {{ Str::limit($ticket->description, 200) }}
                                    </p>
                                    <div class="meta text-muted small">
                                        <span class="badge bg-{{ $ticket->status->getColor() }}">
                                            {{ $ticket->status->label() }}
                                        </span>
                                        <span class="ms-2">
                                            {{ $ticket->created_at->diffForHumans() }}
                                        </span>
                                        <span class="ms-2">
                                            📍 {{ $ticket->address }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    
                    {{ $results->links() }}
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
```

**Index tickets**:
```bash
<<<<<<< HEAD
<<<<<<< HEAD
php artisan scout:import "Modules\\<nome progetto>\\Models\\Ticket"
=======
php artisan scout:import "Modules\\Fixcity\\Models\\Ticket"
>>>>>>> laraxot/dev
=======
php artisan scout:import "Modules\\Fixcity\\Models\\Ticket"
>>>>>>> laraxot/dev
php artisan scout:import "Modules\\App\\Models\\Ticket"
```

---

## ✅ Final Checklist

### Components Created
- [x] Stepper component
- [x] Stepper-step component
- [x] Accordion component
- [x] Accordion-item component
- [x] Translations (IT/EN)

### Documentation Created
- [x] AGID Compliance Summary (Themes/Sixteen)
- [x] AGID Compliance (Modules/Cms)
- [x] Implementation Guide (this file)

### Features Implemented
- [x] Multi-step form structure
- [x] Accordion UI component
- [ ] FAQ system (model + migration needed)
- [ ] Search functionality (Scout integration needed)
- [ ] SEO enhancements (migrations needed)

### Next Steps
1. Create migrations for FAQs
2. Install and configure Laravel Scout
3. Create Filament resources for FAQ management
4. Add SEO fields to existing models
5. Implement remaining AGID templates

---

**Estimated Total Time**: 40-60 hours for full AGID compliance  
**Priority Order**: Multi-step form → FAQ → Search → SEO → Optional features

**Maintainer**: Development Team
