{{--
    Feedback Rating Block - Multi-Step Wizard
    Reference: design-comuni-pagine-statiche/sito/homepage.html #rating section
    Structure: Star rating → follow-up questions → thank you
    Tech: TailwindCSS + Alpine.js (NO Bootstrap)
    Multilingual: ALL text from translations, NO hardcoded strings
    Usage: <x-pub_theme::components.blocks.feedback.rating :data="$blockData" />
--}}
@props(['data' => []])

@php
    // Translation namespace
    $ns = 'fixcity::rating';

    // Helper: resolve translation key or fallback to value
    $t = function (?string $value, string $fallbackKey) use ($ns): string {
        if (empty($value)) {
            return __($ns . '.' . $fallbackKey);
        }
        // If value contains '::', treat as translation key
        if (str_contains($value, '::')) {
            return __($value);
        }
        return $value;
    };

    // Title & subtitle - from JSON or translations
    $titleRaw = $data['title'] ?? null;
    $title = $t(is_array($titleRaw) ? ($titleRaw[app()->getLocale()] ?? null) : $titleRaw, 'title');

    $subtitleRaw = $data['subtitle'] ?? null;
    $subtitle = $t(is_array($subtitleRaw) ? ($subtitleRaw[app()->getLocale()] ?? null) : $subtitleRaw, 'subtitle');

    // Star rating labels
    $starLegend = $t($data['star_legend'][app()->getLocale()] ?? null, 'star.legend');
    $starLabels = [];
    for ($i = 1; $i <= 5; $i++) {
        $key = 'star.labels.' . $i;
        $raw = $data['star_labels'][app()->getLocale()][$i] ?? null;
        $starLabels[$i] = $t($raw, $key);
    }

    // Positive feedback options
    $positiveQuestion = $t($data['positive_question'][app()->getLocale()] ?? null, 'positive.question');
    $positiveOptions = [];
    $posOptionsRaw = $data['positive_options'][app()->getLocale()] ?? [];
    if (is_array($posOptionsRaw) && count($posOptionsRaw) > 0) {
        foreach ($posOptionsRaw as $idx => $opt) {
            $positiveOptions[$idx] = $t($opt, 'positive.options.' . ($idx + 1));
        }
    } else {
        for ($i = 1; $i <= 5; $i++) {
            $positiveOptions[$i - 1] = __($ns . '.positive.options.' . $i);
        }
    }

    // Negative feedback options
    $negativeQuestion = $t($data['negative_question'][app()->getLocale()] ?? null, 'negative.question');
    $negativeOptions = [];
    $negOptionsRaw = $data['negative_options'][app()->getLocale()] ?? [];
    if (is_array($negOptionsRaw) && count($negOptionsRaw) > 0) {
        foreach ($negOptionsRaw as $idx => $opt) {
            $negativeOptions[$idx] = $t($opt, 'negative.options.' . ($idx + 1));
        }
    } else {
        for ($i = 1; $i <= 5; $i++) {
            $negativeOptions[$i - 1] = __($ns . '.negative.options.' . $i);
        }
    }

    // Text feedback
    $textQuestion = $t($data['text_question'][app()->getLocale()] ?? null, 'text.question');
    $textLabel = $t($data['text_label'][app()->getLocale()] ?? null, 'text.label');
    $textHelp = $t($data['text_help'][app()->getLocale()] ?? null, 'text.help');
    $textMaxlength = $data['text_maxlength'] ?? 200;

    // Buttons
    $btnBack = $t($data['btn_back'][app()->getLocale()] ?? null, 'buttons.back');
    $btnNext = $t($data['btn_next'][app()->getLocale()] ?? null, 'buttons.next');
    $btnSubmit = $t($data['btn_submit'][app()->getLocale()] ?? null, 'buttons.submit');
    $thankYouMsg = $t($data['thank_you'][app()->getLocale()] ?? null, 'thank_you');
@endphp

{{-- Rating Block Container --}}
<div
    id="rating"
    class="py-12 lg:py-20 bg-primary-500"
    x-data="{
        rating: 0,
        hover: 0,
        step: 1,
        selectedOption: null,
        textFeedback: '',
        feedbackType: '',
        submitted: false
    }"
    data-element="feedback"
>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            {{-- Header --}}
            <div class="px-6 py-5 sm:px-8 border-b border-gray-100">
                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900" data-element="feedback-title">
                    {{ $title }}
                </h2>
            </div>

            {{-- Body --}}
            <div class="px-6 py-6 sm:px-8">
                {{-- Step 1: Star Rating --}}
                <div x-show="step === 1" x-transition>
                    <fieldset>
                        <legend class="sr-only">{{ $starLegend }}</legend>
                        <div class="flex flex-row-reverse justify-end gap-1" role="radiogroup" aria-label="{{ $starLegend }}">
                            {{-- Stars rendered 5→1 for CSS hover effect --}}
                            @for ($star = 5; $star >= 1; $star--)
                            <input
                                type="radio"
                                id="star{{ $star }}"
                                name="rating"
                                value="{{ $star }}"
                                x-model="rating"
                                class="sr-only"
                            >
                            <label
                                for="star{{ $star }}"
                                class="cursor-pointer p-1 transition-colors duration-150"
                                :class="(hover >= {{ $star }} || rating >= {{ $star }}) ? 'text-yellow-400' : 'text-gray-300'"
                                @click="rating = {{ $star }}; feedbackType = {{ $star }} >= 4 ? 'positive' : 'negative'; step = 2"
                                @mouseenter="hover = {{ $star }}"
                                @mouseleave="hover = 0"
                                :aria-checked="rating === {{ $star }}"
                                role="radio"
                                data-element="feedback-rate-{{ $star }}"
                            >
                                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M12 1.7L9.5 9.2H1.6L8 13.9l-2.4 7.6 6.4-4.7 6.4 4.7-2.4-7.6 6.4-4.7h-7.9L12 1.7z"/>
                                </svg>
                                <span class="sr-only">{{ $starLabels[$star] }}</span>
                            </label>
                            @endfor
                        </div>
                    </fieldset>
                </div>

                {{-- Step 2: Follow-up Questions --}}
                <div x-show="step === 2" x-cloak x-transition>
                    <p class="text-base text-gray-600 mb-6">{{ $subtitle }}</p>

                    {{-- Positive feedback --}}
                    <fieldset x-show="feedbackType === 'positive'" x-cloak data-element="feedback-rating-positive">
                        <legend class="text-lg font-semibold text-gray-900 mb-4">{{ $positiveQuestion }}</legend>
                        <div class="space-y-3">
                            @foreach($positiveOptions as $index => $option)
                            <div class="flex items-start">
                                <input
                                    type="radio"
                                    id="pos-{{ $index }}"
                                    name="positiveFeedback"
                                    value="{{ $index }}"
                                    x-model="selectedOption"
                                    class="mt-1 h-4 w-4 border-gray-300 text-primary-500 focus:ring-primary-500"
                                >
                                <label for="pos-{{ $index }}" class="ml-3 text-base text-gray-700 cursor-pointer" data-element="feedback-rating-answer">
                                    {{ $option }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </fieldset>

                    {{-- Negative feedback --}}
                    <fieldset x-show="feedbackType === 'negative'" x-cloak data-element="feedback-rating-negative">
                        <legend class="text-lg font-semibold text-gray-900 mb-4">{{ $negativeQuestion }}</legend>
                        <div class="space-y-3">
                            @foreach($negativeOptions as $index => $option)
                            <div class="flex items-start">
                                <input
                                    type="radio"
                                    id="neg-{{ $index }}"
                                    name="negativeFeedback"
                                    value="{{ $index }}"
                                    x-model="selectedOption"
                                    class="mt-1 h-4 w-4 border-gray-300 text-primary-500 focus:ring-primary-500"
                                >
                                <label for="neg-{{ $index }}" class="ml-3 text-base text-gray-700 cursor-pointer" data-element="feedback-rating-answer">
                                    {{ $option }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </fieldset>

                    {{-- Text feedback (optional) --}}
                    <div class="mt-6">
                        <label for="feedback-text" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $textQuestion }}
                        </label>
                        <textarea
                            id="feedback-text"
                            x-model="textFeedback"
                            maxlength="{{ $textMaxlength }}"
                            rows="3"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                            data-element="feedback-input-text"
                            aria-describedby="text-help"
                        ></textarea>
                        <p id="text-help" class="mt-1 text-sm text-gray-500">
                            {{ $textHelp }} (<span x-text="textFeedback.length"></span>/{{ $textMaxlength }})
                        </p>
                    </div>

                    {{-- Navigation buttons --}}
                    <div class="mt-6 flex gap-4">
                        <button
                            type="button"
                            @click="step = 1; selectedOption = null"
                            class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            {{ $btnBack }}
                        </button>
                        <button
                            type="button"
                            @click="submitted = true; step = 3"
                            class="inline-flex items-center justify-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            {{ $btnSubmit }}
                        </button>
                    </div>
                </div>

                {{-- Step 3: Thank You --}}
                <div x-show="step === 3" x-cloak x-transition class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="mt-4 text-lg text-gray-700">{{ $thankYouMsg }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
