<?php

declare(strict_types=1);

/** @var \Modules\Geo\Filament\Widgets\GeoMapWidget $this */
$widgetId = 'geo-map-widget-'.spl_object_id($this);
?>

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-4">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <h3 class="text-base font-semibold text-gray-950 dark:text-white">Geo Map Widget</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Dataset GeoJSON statico lato client, una sola lettura iniziale, LOD progressivo e layer combinabili.
                    </p>
                </div>

                <div class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-xs text-gray-600 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                    <div>Feature: {{ $this->getDatasetStats()['total'] }}</div>
                    <div>Punti: {{ $this->getDatasetStats()['points'] }} · Zone: {{ $this->getDatasetStats()['zones'] }}</div>
                    <div>LOD: {{ $this->getMapConfig()['aggregateZoom'] }} / {{ $this->getMapConfig()['detailZoom'] }}</div>
                </div>
            </div>

            <geo-map-widget
                id="{{ $widgetId }}"
                class="block"
                data-config='@json($this->getMapConfig())'
                data-dataset='@json($this->getDataset())'
            ></geo-map-widget>
        </div>
    </x-filament::section>

    @once
        <script type="module" src="{{ asset('modules/geo/geo-map-widget.js') }}"></script>
    @endonce
</x-filament-widgets::widget>
