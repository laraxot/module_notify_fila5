<?php

declare(strict_types=1);
?>
<x-filament::page>
    <x-filament::card>
        <div class="space-y-6">
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('notify::mail.template.preview.subject') }}
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ $this->record->subject }}
                </p>
            </div>

            <div class="space-y-4">
                <div>
                    <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ __('notify::mail.template.preview.html_version') }}
                    </h4>
                    <div class="mt-2 prose dark:prose-invert max-w-none">
                        {!! $this->record->body_html !!}
