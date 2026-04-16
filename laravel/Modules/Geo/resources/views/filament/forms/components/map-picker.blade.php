<?php

declare(strict_types=1);

/** @var \Modules\Geo\Filament\Forms\Components\MapPicker $field */
$latitudeStatePath = $field->getLatitudeStatePath();
$longitudeStatePath = $field->getLongitudeStatePath();
$latitudeHasServerError = $errors->has($latitudeStatePath);
$longitudeHasServerError = $errors->has($longitudeStatePath);
?>

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div
        x-data="geoMapPickerField({
            latitude: $wire.entangle(@js($latitudeStatePath)).live,
            longitude: $wire.entangle(@js($longitudeStatePath)).live,
            geolocateWhenEmpty: @js($field->shouldGeolocateWhenEmpty()),
            reverseGeocoding: @js($field->shouldReverseGeocode()),
            zoom: @js($field->getZoom()),
            latitudeStatePath: @js($latitudeStatePath),
            longitudeStatePath: @js($longitudeStatePath),
            hasServerErrors: @js($latitudeHasServerError || $longitudeHasServerError),
        })"
        x-init="init()"
        class="space-y-4"
    >
        <geo-map-picker
            x-ref="map"
            class="block"
            x-on:coords-changed="handleCoordsChanged($event)"
        ></geo-map-picker>

        <div class="grid gap-4 md:grid-cols-2">
            <label class="space-y-1">
                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">Latitude</span>
                <input
                    type="number"
                    step="0.000001"
                    inputmode="decimal"
                    x-model.live="latitude"
                    class="block w-full rounded-lg border bg-white px-3 py-2 text-sm shadow-sm outline-none transition dark:bg-gray-900"
                    :class="inputClass(latitudeValid)"
                >
                @error($latitudeStatePath)
                    <span class="text-xs text-danger-600 dark:text-danger-400">{{ $message }}</span>
                @enderror
            </label>

            <label class="space-y-1">
                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">Longitude</span>
                <input
                    type="number"
                    step="0.000001"
                    inputmode="decimal"
                    x-model.live="longitude"
                    class="block w-full rounded-lg border bg-white px-3 py-2 text-sm shadow-sm outline-none transition dark:bg-gray-900"
                    :class="inputClass(longitudeValid)"
                >
                @error($longitudeStatePath)
                    <span class="text-xs text-danger-600 dark:text-danger-400">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div class="rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm dark:border-gray-800 dark:bg-gray-900/50">
            <div class="flex items-center gap-2">
                <span class="inline-flex h-2.5 w-2.5 rounded-full" :class="statusDotClass()"></span>
                <span class="font-medium text-gray-900 dark:text-gray-100" x-text="statusLabel"></span>
            </div>

            <template x-if="formattedAddress">
                <p class="mt-2 text-gray-600 dark:text-gray-300" x-text="formattedAddress"></p>
            </template>
        </div>
    </div>
</x-dynamic-component>

@once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css">

    <script type="module">
        import { LitElement, css, html } from 'https://cdn.jsdelivr.net/npm/lit@3.2.1/index.js';

        const loadStyle = (href) => {
            if (document.querySelector(`link[data-geo-map-picker="${href}"]`)) {
                return;
            }

            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = href;
            link.dataset.geoMapPicker = href;
            document.head.append(link);
        };

        const loadScript = (src) => {
            if (window.L) {
                return Promise.resolve();
            }

            const existing = document.querySelector(`script[data-geo-map-picker="${src}"]`);

            if (existing) {
                return new Promise((resolve, reject) => {
                    existing.addEventListener('load', () => resolve(), { once: true });
                    existing.addEventListener('error', () => reject(new Error(`Unable to load ${src}`)), { once: true });
                });
            }

            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = src;
                script.dataset.geoMapPicker = src;
                script.onload = () => resolve();
                script.onerror = () => reject(new Error(`Unable to load ${src}`));
                document.head.append(script);
            });
        };

        const ensureLeaflet = () => {
            loadStyle('https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css');

            window.__geoMapPickerLeafletPromise ??= loadScript('https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js');

            return window.__geoMapPickerLeafletPromise;
        };

        class GeoMapPicker extends LitElement {
            static properties = {
                latitude: { type: Number },
                longitude: { type: Number },
                zoom: { type: Number },
                geolocateWhenEmpty: { type: Boolean, attribute: 'geolocate-when-empty' },
            };

            static styles = css`
                :host {
                    display: block;
                }

                .shell {
                    position: relative;
                    overflow: hidden;
                    border: 1px solid rgba(148, 163, 184, 0.35);
                    border-radius: 1rem;
                    background:
                        radial-gradient(circle at top left, rgba(14, 165, 233, 0.15), transparent 30%),
                        linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 250, 252, 0.94));
                }

                .toolbar {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    gap: 0.75rem;
                    padding: 0.75rem 0.9rem;
                    border-bottom: 1px solid rgba(148, 163, 184, 0.2);
                    font: 600 0.75rem/1.2 system-ui, sans-serif;
                    letter-spacing: 0.04em;
                    text-transform: uppercase;
                    color: rgb(51 65 85);
                }

                .map {
                    min-height: 22rem;
                }

                button {
                    border: 0;
                    border-radius: 999px;
                    padding: 0.45rem 0.8rem;
                    background: rgb(15 23 42);
                    color: white;
                    cursor: pointer;
                    font: 600 0.75rem/1 system-ui, sans-serif;
                }

                :host(:fullscreen) .map {
                    min-height: calc(100vh - 3.5rem);
                }
            `;

            constructor() {
                super();
                this.latitude = null;
                this.longitude = null;
                this.zoom = 15;
                this.geolocateWhenEmpty = true;
                this.map = null;
                this.marker = null;
                this.currentBaseLayer = null;
                this.lastSignature = null;
            }

            render() {
                return html`
                    <div class="shell">
                        <div class="toolbar">
                            <span>Map Picker</span>
                            <button type="button" @click=${this.toggleFullscreen}>Fullscreen</button>
                        </div>
                        <div class="map" id="map"></div>
                    </div>
                `;
            }

            async firstUpdated() {
                await ensureLeaflet();
                this.initializeMap();
            }

            updated(changedProperties) {
                if (!this.map) {
                    return;
                }

                if (changedProperties.has('latitude') || changedProperties.has('longitude')) {
                    this.syncFromExternalState();
                }
            }

            async toggleFullscreen() {
                if (document.fullscreenElement === this) {
                    await document.exitFullscreen();
                } else {
                    await this.requestFullscreen();
                }

                window.setTimeout(() => this.invalidateMapSize(), 180);
            }

            initializeMap() {
                const center = this.hasCoordinates()
                    ? [this.latitude, this.longitude]
                    : [41.9028, 12.4964];

                const street = window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors',
                    maxZoom: 19,
                });

                const satellite = window.L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri',
                    maxZoom: 19,
                });

                this.currentBaseLayer = street;

                this.map = window.L.map(this.renderRoot.querySelector('#map'), {
                    center,
                    zoom: this.zoom,
                    layers: [street],
                });

                window.L.control.layers(
                    {
                        Street: street,
                        Satellite: satellite,
                    },
                    {},
                    { position: 'topright' },
                ).addTo(this.map);

                this.marker = window.L.marker(center, { draggable: true }).addTo(this.map);

                this.marker.on('dragend', () => {
                    const { lat, lng } = this.marker.getLatLng();
                    this.applyCoordinates(lat, lng, { source: 'marker', recenter: false });
                });

                this.map.on('click', (event) => {
                    this.applyCoordinates(event.latlng.lat, event.latlng.lng, { source: 'map-click', recenter: false });
                });

                document.addEventListener('fullscreenchange', () => {
                    if (document.fullscreenElement === this || document.fullscreenElement === null) {
                        window.setTimeout(() => this.invalidateMapSize(), 180);
                    }
                });

                this.invalidateMapSize();

                if (this.hasCoordinates()) {
                    this.applyCoordinates(this.latitude, this.longitude, { source: 'external', recenter: true, silent: true });
                    return;
                }

                if (this.geolocateWhenEmpty && navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        this.applyCoordinates(position.coords.latitude, position.coords.longitude, {
                            source: 'geolocation',
                            recenter: true,
                        });
                    });
                }
            }

            setCoordinates(latitude, longitude, options = {}) {
                this.applyCoordinates(latitude, longitude, {
                    source: 'external',
                    recenter: options.recenter ?? true,
                    silent: options.silent ?? true,
                });
            }

            syncFromExternalState() {
                if (!this.hasCoordinates()) {
                    return;
                }

                this.applyCoordinates(this.latitude, this.longitude, {
                    source: 'external',
                    recenter: false,
                    silent: true,
                });
            }

            applyCoordinates(latitude, longitude, options = {}) {
                const lat = this.normalizeCoordinate(latitude);
                const lng = this.normalizeCoordinate(longitude);

                if (lat === null || lng === null || !this.map || !this.marker) {
                    return;
                }

                const signature = `${lat.toFixed(6)}:${lng.toFixed(6)}`;

                if (signature === this.lastSignature) {
                    return;
                }

                this.lastSignature = signature;
                this.latitude = lat;
                this.longitude = lng;

                this.marker.setLatLng([lat, lng]);

                if (options.recenter ?? true) {
                    this.map.setView([lat, lng], this.map.getZoom(), { animate: true });
                }

                if (!(options.silent ?? false)) {
                    this.dispatchEvent(new CustomEvent('coords-changed', {
                        bubbles: true,
                        composed: true,
                        detail: {
                            latitude: lat,
                            longitude: lng,
                            source: options.source ?? 'external',
                        },
                    }));
                }
            }

            invalidateMapSize() {
                if (!this.map) {
                    return;
                }

                this.map.invalidateSize();
            }

            hasCoordinates() {
                return Number.isFinite(this.latitude) && Number.isFinite(this.longitude);
            }

            normalizeCoordinate(value) {
                if (value === null || value === undefined || value === '') {
                    return null;
                }

                const normalized = Number.parseFloat(value);

                return Number.isFinite(normalized) ? normalized : null;
            }
        }

        if (!window.customElements.get('geo-map-picker')) {
            window.customElements.define('geo-map-picker', GeoMapPicker);
        }

        document.addEventListener('alpine:init', () => {
            window.Alpine.data('geoMapPickerField', (config) => ({
                latitude: config.latitude,
                longitude: config.longitude,
                geolocateWhenEmpty: config.geolocateWhenEmpty,
                reverseGeocoding: config.reverseGeocoding,
                zoom: config.zoom,
                latitudeStatePath: config.latitudeStatePath,
                longitudeStatePath: config.longitudeStatePath,
                formattedAddress: '',
                statusLabel: 'Waiting for coordinates',
                hasServerErrors: config.hasServerErrors,
                reverseGeocodeTimer: null,

                init() {
                    this.syncToMap(true);

                    this.$watch('latitude', () => {
                        this.updateStatus();
                        this.syncToMap();
                        this.scheduleReverseGeocoding();
                    });

                    this.$watch('longitude', () => {
                        this.updateStatus();
                        this.syncToMap();
                        this.scheduleReverseGeocoding();
                    });

                    this.updateStatus();
                    this.scheduleReverseGeocoding();
                },

                handleCoordsChanged(event) {
                    const nextLatitude = this.normalize(event.detail.latitude);
                    const nextLongitude = this.normalize(event.detail.longitude);

                    if (nextLatitude !== null) {
                        this.latitude = nextLatitude;
                    }

                    if (nextLongitude !== null) {
                        this.longitude = nextLongitude;
                    }
                },

                syncToMap(recenter = false) {
                    if (!this.$refs.map) {
                        return;
                    }

                    this.$refs.map.zoom = this.zoom;
                    this.$refs.map.geolocateWhenEmpty = this.geolocateWhenEmpty;
                    this.$refs.map.setCoordinates(this.latitude, this.longitude, { recenter, silent: true });
                },

                scheduleReverseGeocoding() {
                    if (!this.reverseGeocoding || !this.coordinatesAreValid()) {
                        this.formattedAddress = '';
                        return;
                    }

                    window.clearTimeout(this.reverseGeocodeTimer);

                    this.reverseGeocodeTimer = window.setTimeout(async () => {
                        const url = new URL('https://nominatim.openstreetmap.org/reverse');
                        url.searchParams.set('format', 'jsonv2');
                        url.searchParams.set('lat', this.latitude);
                        url.searchParams.set('lon', this.longitude);
                        url.searchParams.set('zoom', '18');
                        url.searchParams.set('addressdetails', '1');

                        try {
                            const response = await fetch(url, {
                                headers: {
                                    Accept: 'application/json',
                                },
                            });

                            if (!response.ok) {
                                return;
                            }

                            const payload = await response.json();
                            this.formattedAddress = payload.display_name ?? '';
                        } catch (_error) {
                            this.formattedAddress = '';
                        }
                    }, 400);
                },

                coordinatesAreValid() {
                    return this.latitudeValid && this.longitudeValid;
                },

                normalize(value) {
                    if (value === null || value === undefined || value === '') {
                        return null;
                    }

                    const normalized = Number.parseFloat(value);

                    return Number.isFinite(normalized) ? Number.parseFloat(normalized.toFixed(6)) : null;
                },

                get latitudeValid() {
                    return this.latitude !== null && this.latitude >= -90 && this.latitude <= 90;
                },

                get longitudeValid() {
                    return this.longitude !== null && this.longitude >= -180 && this.longitude <= 180;
                },

                updateStatus() {
                    if (this.hasServerErrors) {
                        this.statusLabel = 'Validation error from server';

                        return;
                    }

                    if (this.coordinatesAreValid()) {
                        this.statusLabel = 'Coordinates synced';

                        return;
                    }

                    if (this.latitude === null && this.longitude === null) {
                        this.statusLabel = 'Waiting for geolocation or manual input';

                        return;
                    }

                    this.statusLabel = 'Invalid coordinates';
                },

                inputClass(isValid) {
                    return {
                        'border-success-500 focus:border-success-500 focus:ring-success-500': isValid && !this.hasServerErrors,
                        'border-danger-500 focus:border-danger-500 focus:ring-danger-500': !isValid || this.hasServerErrors,
                        'border-gray-300 focus:border-primary-500 focus:ring-primary-500': !this.coordinatesAreValid() && !this.hasServerErrors,
                    };
                },

                statusDotClass() {
                    if (this.hasServerErrors || !this.coordinatesAreValid()) {
                        return 'bg-danger-500';
                    }

                    return 'bg-success-500';
                },
            }));
        });
    </script>
@endonce
