@php
    use Illuminate\Support\Str;
    $statePath = $getStatePath();
    $prefixPath = Str::beforeLast((string) $statePath, '.');
    $latPath = $prefixPath.'.'.$field->getLatitudeField();
    $lngPath = $prefixPath.'.'.$field->getLongitudeField();
    $lw = $field->getLivewire();
    /** @var array<string, mixed>|null $root */
    $root = $lw->data ?? null;
    $scopeKey = Str::after($prefixPath, 'data.');
    $initialLat = $root !== null ? data_get($root, $scopeKey.'.'.$field->getLatitudeField()) : null;
    $initialLng = $root !== null ? data_get($root, $scopeKey.'.'.$field->getLongitudeField()) : null;
    $mapId = 'leaflet-marker-map-'.$getId();
    $btnId = 'btn-geo-locate-'.$getId();
    $defaultLat = $field->getDefaultLatitude();
    $defaultLng = $field->getDefaultLongitude();
    $defaultZoom = $field->getDefaultZoom();
    $height = $field->getMapHeight();
@endphp

@once
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""
    />
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""
    ></script>
    <style>
        .leaflet-marker-map-canvas .leaflet-container {
            font-family: inherit;
            border-radius: 0.25rem;
        }
    </style>
@endonce

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div class="leaflet-marker-map-input space-y-3">
        <div class="d-flex flex-wrap gap-2 align-items-center">
            <button
                type="button"
                class="btn btn-sm btn-outline-primary"
                id="{{ $btnId }}"
            >
                {{ __('geo::address.fields.use_my_location.label') }}
            </button>
            <span class="text-muted small">{{ __('geo::leaflet_map.hint.interaction') }}</span>
        </div>

        <div
            wire:ignore
            id="{{ $mapId }}"
            class="rounded border border-light w-100 leaflet-marker-map-canvas"
            style="min-height: {{ $height }}; z-index: 1;"
        ></div>

        @error($latPath)
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        @error($lngPath)
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <script>
        (function () {
            function round6(n) {
                return Math.round(Number(n) * 1e6) / 1e6;
            }

            function setCoords(wire, latPath, lngPath, lat, lng) {
                var la = round6(lat);
                var ln = round6(lng);
                if (typeof wire.set === 'function') {
                    wire.set(latPath, la);
                    wire.set(lngPath, ln);
                } else if (typeof wire.$set === 'function') {
                    wire.$set(latPath, la);
                    wire.$set(lngPath, ln);
                }
            }

            function boot() {
                var L = window.L;
                if (!L) {
                    return;
                }
                var el = document.getElementById(@json($mapId));
                if (!el || el.getAttribute('data-geo-leaflet-ready') === '1') {
                    return;
                }
                el.setAttribute('data-geo-leaflet-ready', '1');

                var wire = @this;
                var latPath = @json($latPath);
                var lngPath = @json($lngPath);
                var defaultLat = @json($defaultLat);
                var defaultLng = @json($defaultLng);
                var defaultZoom = @json($defaultZoom);
                var initialLat = @json($initialLat);
                var initialLng = @json($initialLng);

                var lat = parseFloat(initialLat);
                var lng = parseFloat(initialLng);
                if (!Number.isFinite(lat) || !Number.isFinite(lng)) {
                    lat = defaultLat;
                    lng = defaultLng;
                    setCoords(wire, latPath, lngPath, lat, lng);
                }

                var map = L.map(el).setView([lat, lng], defaultZoom);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    maxZoom: 19,
                }).addTo(map);

                var marker = L.marker([lat, lng], { draggable: true }).addTo(map);

                marker.on('dragend', function (e) {
                    var p = e.target.getLatLng();
                    setCoords(wire, latPath, lngPath, p.lat, p.lng);
                });

                map.on('click', function (e) {
                    marker.setLatLng(e.latlng);
                    setCoords(wire, latPath, lngPath, e.latlng.lat, e.latlng.lng);
                });

                var btn = document.getElementById(@json($btnId));
                if (btn && navigator.geolocation) {
                    btn.addEventListener('click', function () {
                        navigator.geolocation.getCurrentPosition(
                            function (pos) {
                                var ll = [pos.coords.latitude, pos.coords.longitude];
                                map.setView(ll, Math.max(map.getZoom(), 15));
                                marker.setLatLng(ll);
                                setCoords(wire, latPath, lngPath, ll[0], ll[1]);
                            },
                            function () {
                                alert(@json(__('geo::address.geolocation.error')));
                            },
                            { enableHighAccuracy: true, timeout: 15000, maximumAge: 0 }
                        );
                    });
                } else if (btn) {
                    btn.disabled = true;
                    btn.classList.add('opacity-50');
                }

                setTimeout(function () {
                    map.invalidateSize();
                }, 400);
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', boot);
            } else {
                boot();
            }

            document.addEventListener('livewire:navigated', boot);
        })();
    </script>
</x-dynamic-component>
