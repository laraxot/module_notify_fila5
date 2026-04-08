# Block Implementation Guide

> **TailwindCSS + Alpine.js + Multilingual Patterns**

## 🎯 Purpose

This guide defines the **correct patterns** for implementing blade blocks in the Sixteen theme.
It prevents common mistakes: Bootstrap Italia usage, hardcoded language strings, inconsistent architecture.

---

## 🚫 CRITICAL RULES (NEVER VIOLATE)

### 1. NO Bootstrap Italia

**Bootstrap Italia is NOT used in this project.** The entire purpose is to replace Bootstrap with TailwindCSS + Alpine.js.

```blade
{{-- ❌ WRONG: Bootstrap classes —}}
<div class="row">
    <div class="col-12 col-lg-6">
        <button class="btn btn-primary">Click</button>
    </div>
</div>

{{-- ✅ CORRECT: TailwindCSS utility classes —}}
<div class="max-w-2xl mx-auto px-4">
    <button class="inline-flex items-center px-4 py-2 bg-primary-500 text-white rounded-md hover:bg-primary-600">
        Click
    </button>
</div>
```

**Bootstrap classes to NEVER use:**
- Layout: `row`, `col-*`, `container`, `d-flex`, `d-none`, `justify-content-*`
- Components: `card`, `btn`, `btn-*`, `form-check`, `form-control`, `modal`, `navbar`
- Utilities: `visually-hidden`, `text-wrap`, `border-light`, `shadow-sm`, `bg-primary` (Bootstrap variant)
- JS: `data-bs-toggle`, `data-bs-target`

### 2. NO Hardcoded Language Strings

**The site is multilingual.** All text must come from translation files.

```blade
{{-- ❌ WRONG: Hardcoded Italian —}}
<h2>Quanto sono chiare le informazioni?</h2>
<button>Invia</button>
<p>Grazie per il tuo feedback!</p>

{{-- ✅ CORRECT: Translation helper —}}
@php
    $ns = 'fixcity::rating';
@endphp
<h2>{{ __($ns . '.title') }}</h2>
<button>{{ __($ns . '.buttons.submit') }}</button>
<p>{{ __($ns . '.thank_you') }}</p>
```

### 3. Translation Namespace Pattern

**Format:** `namespace::context.collection.element.type`

```
fixcity::rating.title
fixcity::rating.star.legend
fixcity::rating.positive.options.1
fixcity::rating.buttons.submit
fixcity::segnalazione.heading.title.label
```

**Translation files location:**
- `laravel/Modules/Fixcity/lang/it/rating.php`
- `laravel/Modules/Fixcity/lang/en/rating.php`

---

## ✅ CORRECT PATTERNS

### Block Structure

```blade
{{--
    Block Name - Short description
    Usage: <x-pub_theme::components.blocks.feedback.rating :data="$blockData" />
    Tech: TailwindCSS + Alpine.js (NO Bootstrap)
    Multilingual: ALL text from translations
--}}
@props(['data' => []])

@php
    $ns = 'fixcity::blockname';
    $title = $data['title'] ?? __($ns . '.title');
@endphp

<div x-data="{ /* Alpine state */ }">
    {{-- Block content with Tailwind classes --}}
</div>
```

### Alpine.js Patterns

**Star Rating:**
```blade
<div x-data="{ rating: 0, hover: 0 }">
    @for ($star = 5; $star >= 1; $star--)
    <input type="radio" id="star{{ $star }}" x-model="rating" class="sr-only">
    <label for="star{{ $star }}"
           :class="(hover >= {{ $star }} || rating >= {{ $star }}) ? 'text-yellow-400' : 'text-gray-300'"
           @click="rating = {{ $star }}"
           @mouseenter="hover = {{ $star }}"
           @mouseleave="hover = 0">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">...</svg>
    </label>
    @endfor
</div>
```

**Multi-step Wizard:**
```blade
<div x-data="{ step: 1 }">
    <div x-show="step === 1" x-transition>Step 1</div>
    <div x-show="step === 2" x-cloak x-transition>Step 2</div>
    <button @click="step = 2">Next</button>
</div>
```

**Accordion:**
```blade
<div x-data="{ activeIndex: null }">
    @foreach($items as $index => $item)
    <button @click="activeIndex === {{ $index }} ? activeIndex = null : activeIndex = {{ $index }}"
            :aria-expanded="activeIndex === {{ $index }}">
        {{ $item['question'] }}
    </button>
    <div x-show="activeIndex === {{ $index }}" x-cloak>
        {{ $item['answer'] }}
    </div>
    @endforeach
</div>
```

**Dismissible Alert:**
```blade
<div x-data="{ show: true }"
     x-show="show"
     x-transition:leave="transition ease-in duration-200">
    <button @click="show = false">Close</button>
    {{ $message }}
</div>
```

### TailwindCSS Layout Patterns

**Centered Container:**
```blade
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    {{ $content }}
</div>
```

**Card:**
```blade
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="px-6 py-5 sm:px-8 border-b border-gray-100">
        <h2 class="text-2xl font-semibold text-gray-900">{{ $title }}</h2>
    </div>
    <div class="px-6 py-6 sm:px-8">
        {{ $content }}
    </div>
</div>
```

**Button Primary:**
```blade
<button class="inline-flex items-center justify-center px-6 py-2 border border-transparent
               text-sm font-medium rounded-md shadow-sm text-white
               bg-primary-500 hover:bg-primary-600
               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
    {{ $label }}
</button>
```

**Button Secondary/Outline:**
```blade
<button class="inline-flex items-center justify-center px-4 py-2 border border-gray-300
               shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white
               hover:bg-gray-50
               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
    {{ $label }}
</button>
```

**Radio Group:**
```blade
<div class="space-y-3">
    @foreach($options as $index => $option)
    <div class="flex items-start">
        <input type="radio" id="opt-{{ $index }}"
               class="mt-1 h-4 w-4 border-gray-300 text-primary-500 focus:ring-primary-500">
        <label for="opt-{{ $index }}" class="ml-3 text-base text-gray-700 cursor-pointer">
            {{ $option }}
        </label>
    </div>
    @endforeach
</div>
```

**Text Input:**
```blade
<label for="input-id" class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
<textarea id="input-id"
          class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"
          rows="3"></textarea>
<p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
```

### Icon Patterns

**Filament Icons (PREFERRED):**
```blade
<x-filament::icon icon="heroicon-o-check-circle" class="h-6 w-6 text-green-500" />
<x-filament::icon icon="heroicon-o-x-mark" class="h-4 w-4" />
```

**Dynamic Icons:**
```blade
<x-dynamic-component :component="$iconComponent" class="h-5 w-5" />
```

---

## 📐 Rating Block Example (REFERENCE IMPLEMENTATION)

See: `resources/views/components/blocks/feedback/rating.blade.php`

**Key patterns demonstrated:**
1. Translation helper function `$t()`
2. Star rating with Alpine.js interactivity
3. Multi-step wizard (step 1 → 2 → 3)
4. Positive/negative feedback branching
5. TailwindCSS layout (NO Bootstrap)
6. Full accessibility (sr-only, role, aria-*)

---

## 🔄 Multi-Agent Collaboration Rules

1. **Study existing code first** - Check `docs/` indexes, read working blocks
2. **Don't override other agents' work** - Check git log for recent changes
3. **Small, focused commits** - One block at a time
4. **Document everything** - Update this guide, add to indexes
5. **Cross-reference** - Link to related docs (min 3 bidirectional links)

---

## 📚 Related Documentation

- [Blocks Implementation Status](./BLOCKS_IMPLEMENTATION.md)
- [Design Comuni Block Analysis](./design-comuni/BLOCK_ANALYSIS.md)
- [Layout Architecture](./architecture/layout-architecture.md)
- [Alpine.js Components](./ALPINE-JS-COMPONENTS.md)
- [Translation Management](../../Modules/Lang/docs/translation-guide.md)

---

## ✅ Block Checklist

```markdown
## Before Creating
- [ ] Studied existing working blocks (accordion, alert, card)
- [ ] Checked translation namespace doesn't conflict
- [ ] Reviewed this guide for correct patterns

## Implementation
- [ ] @props(['data' => []]) defined
- [ ] Translation namespace set ($ns = 'fixcity::blockname')
- [ ] ALL text uses __() helper
- [ ] TailwindCSS classes only (NO Bootstrap)
- [ ] Alpine.js for interactivity (x-data, @click, x-show)
- [ ] Accessibility: sr-only, aria-*, role attributes
- [ ] Responsive: sm:, md:, lg: breakpoints

## Translations
- [ ] Created lang/it/blockname.php
- [ ] Created lang/en/blockname.php
- [ ] All keys follow namespace::context.element.type pattern
- [ ] No hardcoded strings in blade

## Documentation
- [ ] Added comment block at top of blade
- [ ] Updated BLOCKS_IMPLEMENTATION.md
- [ ] Linked to this guide
- [ ] Added to docs index

## Quality
- [ ] Tested in browser (all languages)
- [ ] No PHPStan errors
- [ ] Pint formatted
```

---

**Version:** 1.0
**Last Updated:** 2026-04-08
**Status:** ✅ Active reference
