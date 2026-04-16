import { LitElement, css, html, unsafeCSS } from 'lit';
import L from 'leaflet';
import 'leaflet.markercluster';
import 'leaflet.heat';
import leafletCss from 'leaflet/dist/leaflet.css?inline';
import markerClusterCss from 'leaflet.markercluster/dist/MarkerCluster.css?inline';
import markerClusterDefaultCss from 'leaflet.markercluster/dist/MarkerCluster.Default.css?inline';

delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
    iconRetinaUrl: new URL('leaflet/dist/images/marker-icon-2x.png', import.meta.url).href,
    iconUrl: new URL('leaflet/dist/images/marker-icon.png', import.meta.url).href,
    shadowUrl: new URL('leaflet/dist/images/marker-shadow.png', import.meta.url).href,
});

const CATEGORY_PALETTE = {
    beekeeper: '#d97706',
    farm: '#15803d',
    market: '#c2410c',
    vending_machine: '#0891b2',
    zone: '#0f766e',
    unknown: '#475569',
};

class GeoMapFeatureStore {
    constructor(dataset) {
        this.dataset = isFeatureCollection(dataset) ? dataset : { type: 'FeatureCollection', features: [] };
        this.features = this.dataset.features.filter((feature) => isFeature(feature));
        this.pointFeatures = this.features.filter((feature) => feature.geometry.type === 'Point');
        this.zoneFeatures = this.features.filter((feature) => ['Polygon', 'MultiPolygon'].includes(feature.geometry.type));
        this.featureIndex = new Map(this.features.map((feature) => [readFeatureId(feature), feature]));
        this.categories = Array.from(
            new Set(this.pointFeatures.map((feature) => readCategory(feature)).filter((category) => category !== '')),
        ).sort((left, right) => left.localeCompare(right));
    }

    getStats() {
        return {
            total: this.features.length,
            points: this.pointFeatures.length,
            zones: this.zoneFeatures.length,
            categories: this.categories.length,
        };
    }

    getFilteredPointFeatures(activeCategories) {
        if (!(activeCategories instanceof Set) || activeCategories.size === 0) {
            return this.pointFeatures;
        }

        return this.pointFeatures.filter((feature) => activeCategories.has(readCategory(feature)));
    }

    getBounds() {
        const bounds = L.latLngBounds([]);

        this.pointFeatures.forEach((feature) => {
            const latLng = pointToLatLng(feature);

            if (latLng !== null) {
                bounds.extend(latLng);
            }
        });

        this.zoneFeatures.forEach((feature) => {
            const layer = L.geoJSON(feature);
            const layerBounds = layer.getBounds();

            if (layerBounds.isValid()) {
                bounds.extend(layerBounds);
            }
        });

        return bounds;
    }

    getInitialCenter() {
        const bounds = this.getBounds();

        if (bounds.isValid()) {
            return bounds.getCenter();
        }

        return L.latLng(45.4642, 9.19);
    }
}

class GeoMapLayerManager {
    constructor({ map, config, onFeatureSelect, popupRenderer }) {
        this.map = map;
        this.config = config;
        this.onFeatureSelect = onFeatureSelect;
        this.popupRenderer = popupRenderer;

        this.baseLayers = {
            street: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors',
                maxZoom: 19,
            }),
            satellite: L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri',
                maxZoom: 19,
            }),
        };

        this.clusterGroup = L.markerClusterGroup({
            spiderfyOnMaxZoom: true,
            showCoverageOnHover: true,
            removeOutsideVisibleBounds: true,
            chunkedLoading: true,
            maxClusterRadius: (zoom) => (zoom < this.getAggregateZoom() ? 72 : 48),
            iconCreateFunction: (cluster) => this.createClusterIcon(cluster),
        });

        this.pointLayer = L.layerGroup();
        this.zoneLayer = L.geoJSON([], {
            style: () => ({
                color: '#0f766e',
                weight: 2,
                fillColor: '#14b8a6',
                fillOpacity: 0.16,
            }),
            onEachFeature: (feature, layer) => {
                layer.bindPopup(this.popupRenderer(feature));
                layer.on('click', () => this.onFeatureSelect(feature));
            },
        });

        this.heatLayer = L.heatLayer([], {
            radius: 28,
            blur: 20,
            maxZoom: this.getDetailZoom() + 1,
        });
    }

    boot(baseLayerKey) {
        this.baseLayers[baseLayerKey]?.addTo(this.map);
    }

    setBaseLayer(baseLayerKey) {
        Object.entries(this.baseLayers).forEach(([key, layer]) => {
            if (key === baseLayerKey) {
                if (!this.map.hasLayer(layer)) {
                    layer.addTo(this.map);
                }

                return;
            }

            if (this.map.hasLayer(layer)) {
                this.map.removeLayer(layer);
            }
        });
    }

    render({ filteredPoints, zoneFeatures, activeLayers, lodMode }) {
        const markers = filteredPoints
            .map((feature) => this.createMarker(feature))
            .filter((marker) => marker !== null);

        this.clusterGroup.clearLayers();
        this.clusterGroup.addLayers(markers);

        this.pointLayer.clearLayers();
        markers.forEach((marker) => {
            this.pointLayer.addLayer(marker);
        });

        this.zoneLayer.clearLayers();
        this.zoneLayer.addData(zoneFeatures);

        this.heatLayer.setLatLngs(
            filteredPoints
                .map((feature) => pointToLatLng(feature))
                .filter((latLng) => latLng !== null)
                .map((latLng) => [latLng.lat, latLng.lng, 0.6]),
        );

        this.syncOverlayVisibility(activeLayers, lodMode);
    }

    syncOverlayVisibility(activeLayers, lodMode) {
        const showClusters = activeLayers.has('clusters') && lodMode !== 'detail';
        const showPoints = activeLayers.has('points') && lodMode !== 'cluster';
        const showHeatmap = activeLayers.has('heatmap');
        const showZones = activeLayers.has('zones');

        this.syncLayer(this.clusterGroup, showClusters);
        this.syncLayer(this.pointLayer, showPoints);
        this.syncLayer(this.heatLayer, showHeatmap);
        this.syncLayer(this.zoneLayer, showZones);
    }

    createMarker(feature) {
        const latLng = pointToLatLng(feature);

        if (latLng === null) {
            return null;
        }

        const category = readCategory(feature);
        const marker = L.marker(latLng, {
            title: readFeatureLabel(feature),
            icon: createCategoryIcon(category),
        });

        marker.feature = feature;
        marker.bindPopup(this.popupRenderer(feature));
        marker.on('click', () => this.onFeatureSelect(feature));

        return marker;
    }

    createClusterIcon(cluster) {
        const childMarkers = cluster.getAllChildMarkers();
        const counts = new Map();

        childMarkers.forEach((marker) => {
            const category = readCategory(marker.feature);
            counts.set(category, (counts.get(category) ?? 0) + 1);
        });

        const lodMode = this.map.getZoom() < this.getAggregateZoom() ? 'cluster' : 'aggregate';
        const breakdown = Array.from(counts.entries())
            .sort(([left], [right]) => left.localeCompare(right))
            .map(([category, count]) => `${shortCategoryLabel(category)} ${count}`)
            .join(' · ');

        const detail = lodMode === 'aggregate'
            ? `<div class="cluster-breakdown">${breakdown}</div>`
            : '<div class="cluster-breakdown">Overview</div>';

        return L.divIcon({
            className: 'geo-map-cluster-shell',
            html: `
                <div class="geo-map-cluster">
                    <strong>${childMarkers.length}</strong>
                    ${detail}
                </div>
            `,
            iconSize: [64, 64],
        });
    }

    syncLayer(layer, shouldBeVisible) {
        const isVisible = this.map.hasLayer(layer);

        if (shouldBeVisible && !isVisible) {
            layer.addTo(this.map);
        }

        if (!shouldBeVisible && isVisible) {
            this.map.removeLayer(layer);
        }
    }

    getAggregateZoom() {
        return this.config.aggregateZoom ?? 8;
    }

    getDetailZoom() {
        return this.config.detailZoom ?? 12;
    }
}

class GeoMapWidgetElement extends LitElement {
    static properties = {
        activeBaseLayer: { state: true },
        activeCategories: { state: true },
        activeLayers: { state: true },
        lodLabel: { state: true },
        selectedFeatureId: { state: true },
        statusText: { state: true },
    };

    static styles = css`
        ${unsafeCSS(leafletCss)}
        ${unsafeCSS(markerClusterCss)}
        ${unsafeCSS(markerClusterDefaultCss)}

        :host {
            display: block;
            color: #0f172a;
            --geo-border: rgba(148, 163, 184, 0.35);
            --geo-surface: rgba(255, 255, 255, 0.96);
            --geo-muted: #475569;
        }

        .geo-map-widget {
            display: grid;
            gap: 1rem;
        }

        .toolbar {
            display: grid;
            gap: 0.75rem;
            padding: 1rem;
            border: 1px solid var(--geo-border);
            border-radius: 1rem;
            background:
                radial-gradient(circle at top left, rgba(20, 184, 166, 0.14), transparent 24%),
                linear-gradient(180deg, rgba(248, 250, 252, 0.98), rgba(255, 255, 255, 0.95));
        }

        .toolbar-group {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            align-items: center;
        }

        .label {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--geo-muted);
        }

        button {
            border: 1px solid rgba(148, 163, 184, 0.45);
            border-radius: 999px;
            background: white;
            color: #0f172a;
            padding: 0.45rem 0.8rem;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 120ms ease, color 120ms ease, border-color 120ms ease;
        }

        button.is-active {
            background: #0f172a;
            border-color: #0f172a;
            color: white;
        }

        .layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 1rem;
        }

        @media (min-width: 1024px) {
            .layout {
                grid-template-columns: minmax(0, 1.8fr) minmax(18rem, 0.82fr);
            }
        }

        .map-shell {
            overflow: hidden;
            border: 1px solid var(--geo-border);
            border-radius: 1rem;
            background: white;
        }

        .map-canvas {
            min-height: 36rem;
        }

        .sidebar {
            display: grid;
            gap: 0.75rem;
            align-content: start;
        }

        .sidebar-card {
            border-radius: 1rem;
            background: var(--geo-surface);
            border: 1px solid var(--geo-border);
            padding: 1rem;
        }

        .sidebar-title {
            font-size: 0.76rem;
            color: var(--geo-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .sidebar-value {
            margin-top: 0.35rem;
            font-size: 1rem;
            line-height: 1.35;
            color: #0f172a;
        }

        .sidebar-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.65rem;
        }

        .stat {
            border-radius: 0.8rem;
            border: 1px solid rgba(226, 232, 240, 1);
            background: white;
            padding: 0.8rem;
        }

        .stat-label {
            display: block;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--geo-muted);
        }

        .stat-value {
            display: block;
            margin-top: 0.2rem;
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
        }

        .legend {
            display: grid;
            gap: 0.45rem;
        }

        .legend-row {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            font-size: 0.875rem;
        }

        .legend-swatch {
            width: 0.9rem;
            height: 0.9rem;
            border-radius: 999px;
            border: 2px solid white;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.16);
        }

        .geo-map-cluster {
            display: grid;
            place-items: center;
            min-width: 4rem;
            min-height: 4rem;
            padding: 0.5rem 0.7rem;
            border-radius: 999px;
            background: #0f172a;
            color: white;
            border: 3px solid rgba(255, 255, 255, 0.92);
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.24);
            text-align: center;
        }

        .cluster-breakdown {
            max-width: 9rem;
            font-size: 0.64rem;
            line-height: 1.2;
            opacity: 0.9;
        }

        .leaflet-container {
            font: 400 0.875rem/1.4 ui-sans-serif, sans-serif;
        }

        .leaflet-popup-content {
            margin: 0.8rem 0.9rem;
        }
    `;

    constructor() {
        super();
        this.activeBaseLayer = 'street';
        this.activeCategories = new Set();
        this.activeLayers = new Set(['clusters', 'points', 'heatmap', 'zones']);
        this.lodLabel = 'Loading';
        this.selectedFeatureId = null;
        this.statusText = 'Preparing dataset';
        this.config = {};
        this.store = new GeoMapFeatureStore({ type: 'FeatureCollection', features: [] });
        this.layerManager = null;
        this.map = null;
        this.resizeObserver = null;
    }

    connectedCallback() {
        super.connectedCallback();

        this.config = this.readJsonAttribute('data-config');
        this.store = new GeoMapFeatureStore(this.readJsonAttribute('data-dataset'));
        this.activeCategories = new Set(this.config.categories ?? this.store.categories);
    }

    render() {
        const stats = this.config.stats ?? this.store.getStats();
        const selectedFeature = this.store.featureIndex.get(this.selectedFeatureId) ?? null;

        return html`
            <div class="geo-map-widget">
                <div class="toolbar">
                    <div class="toolbar-group">
                        <span class="label">Base map</span>
                        ${this.renderToggleButton('street', 'Street', this.activeBaseLayer === 'street', () => this.setBaseLayer('street'))}
                        ${this.renderToggleButton('satellite', 'Satellite', this.activeBaseLayer === 'satellite', () => this.setBaseLayer('satellite'))}
                    </div>

                    <div class="toolbar-group">
                        <span class="label">Layers</span>
                        ${this.renderLayerButton('clusters', 'Clusters')}
                        ${this.renderLayerButton('points', 'Points')}
                        ${this.renderLayerButton('heatmap', 'Heatmap')}
                        ${this.renderLayerButton('zones', 'Zones')}
                    </div>

                    <div class="toolbar-group">
                        <span class="label">Categories</span>
                        ${this.store.categories.map((category) => this.renderCategoryButton(category))}
                    </div>
                </div>

                <div class="layout">
                    <div class="map-shell">
                        <div id="map" class="map-canvas"></div>
                    </div>

                    <div class="sidebar">
                        <div class="sidebar-card">
                            <div class="sidebar-title">Runtime</div>
                            <div class="sidebar-value">${this.statusText}</div>
                        </div>

                        <div class="sidebar-card">
                            <div class="sidebar-title">Selected feature</div>
                            <div class="sidebar-value">${selectedFeature ? readFeatureLabel(selectedFeature) : 'None'}</div>
                        </div>

                        <div class="sidebar-card">
                            <div class="sidebar-title">Dataset</div>
                            <div class="sidebar-grid">
                                ${this.renderStat('Features', stats.total)}
                                ${this.renderStat('Points', stats.points)}
                                ${this.renderStat('Zones', stats.zones)}
                                ${this.renderStat('Categories', stats.categories)}
                            </div>
                        </div>

                        <div class="sidebar-card">
                            <div class="sidebar-title">LOD</div>
                            <div class="sidebar-value">${this.lodLabel}</div>
                        </div>

                        <div class="sidebar-card">
                            <div class="sidebar-title">Legend</div>
                            <div class="legend">
                                ${this.store.categories.map((category) => html`
                                    <div class="legend-row">
                                        <span class="legend-swatch" style=${`background:${CATEGORY_PALETTE[category] ?? CATEGORY_PALETTE.unknown}`}></span>
                                        <span>${category}</span>
                                    </div>
                                `)}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    firstUpdated() {
        this.initializeMap();
        this.renderDataLayers();
        this.observeResize();
    }

    disconnectedCallback() {
        this.resizeObserver?.disconnect();
        this.map?.remove();
        this.map = null;
        super.disconnectedCallback();
    }

    renderToggleButton(key, label, active, action) {
        return html`
            <button
                type="button"
                data-key=${key}
                class=${active ? 'is-active' : ''}
                @click=${action}
            >
                ${label}
            </button>
        `;
    }

    renderLayerButton(key, label) {
        return this.renderToggleButton(key, label, this.activeLayers.has(key), () => this.toggleLayer(key));
    }

    renderCategoryButton(category) {
        return this.renderToggleButton(category, category, this.activeCategories.has(category), () => this.toggleCategory(category));
    }

    renderStat(label, value) {
        return html`
            <div class="stat">
                <span class="stat-label">${label}</span>
                <span class="stat-value">${value}</span>
            </div>
        `;
    }

    readJsonAttribute(name) {
        const rawValue = this.getAttribute(name);

        if (!rawValue) {
            return {};
        }

        try {
            return JSON.parse(rawValue);
        } catch {
            return {};
        }
    }

    initializeMap() {
        const canvas = this.renderRoot.querySelector('#map');
        const center = this.store.getInitialCenter();

        this.map = L.map(canvas, {
            center,
            zoom: this.config.defaultZoom ?? 6,
            zoomControl: true,
        });

        this.layerManager = new GeoMapLayerManager({
            map: this.map,
            config: this.config,
            onFeatureSelect: (feature) => this.selectFeature(feature),
            popupRenderer: (feature) => renderPopupHtml(feature),
        });

        this.layerManager.boot(this.activeBaseLayer);

        const bounds = this.store.getBounds();

        if (bounds.isValid()) {
            this.map.fitBounds(bounds.pad(0.08), { maxZoom: this.config.detailZoom ?? 12 });
        }

        this.map.on('zoomend moveend', () => this.refreshLodState());
        this.map.on('popupopen', () => {
            this.statusText = `Popup open at zoom ${this.map.getZoom()}`;
        });
    }

    renderDataLayers() {
        if (!this.map || !this.layerManager) {
            return;
        }

        const filteredPoints = this.store.getFilteredPointFeatures(this.activeCategories);

        this.layerManager.render({
            filteredPoints,
            zoneFeatures: this.store.zoneFeatures,
            activeLayers: this.activeLayers,
            lodMode: this.getLodMode(),
        });

        this.refreshLodState();
        this.statusText = `Loaded ${filteredPoints.length} filtered points from static GeoJSON`;
    }

    selectFeature(feature) {
        this.selectedFeatureId = readFeatureId(feature);
        this.statusText = `Selected ${readFeatureLabel(feature)}`;

        this.dispatchEvent(new CustomEvent('geo-feature-selected', {
            bubbles: true,
            composed: true,
            detail: {
                feature,
            },
        }));
    }

    toggleLayer(layerKey) {
        if (this.activeLayers.has(layerKey)) {
            this.activeLayers.delete(layerKey);
        } else {
            this.activeLayers.add(layerKey);
        }

        this.activeLayers = new Set(this.activeLayers);
        this.renderDataLayers();
    }

    toggleCategory(category) {
        if (this.activeCategories.has(category)) {
            this.activeCategories.delete(category);
        } else {
            this.activeCategories.add(category);
        }

        this.activeCategories = new Set(this.activeCategories);
        this.renderDataLayers();
    }

    setBaseLayer(baseLayerKey) {
        if (!this.layerManager || this.activeBaseLayer === baseLayerKey) {
            return;
        }

        this.activeBaseLayer = baseLayerKey;
        this.layerManager.setBaseLayer(baseLayerKey);
    }

    refreshLodState() {
        if (!this.map) {
            this.lodLabel = 'Loading';

            return;
        }

        const lodMode = this.getLodMode();
        this.lodLabel = lodMode === 'cluster'
            ? 'Cluster overview'
            : lodMode === 'aggregate'
                ? 'Category aggregate'
                : 'Point detail';
    }

    getLodMode() {
        if (!this.map) {
            return 'cluster';
        }

        const zoom = this.map.getZoom();
        const aggregateZoom = this.config.aggregateZoom ?? 8;
        const detailZoom = this.config.detailZoom ?? 12;

        if (zoom < aggregateZoom) {
            return 'cluster';
        }

        if (zoom < detailZoom) {
            return 'aggregate';
        }

        return 'detail';
    }

    observeResize() {
        const host = this.renderRoot.querySelector('.map-shell');

        if (!(host instanceof HTMLElement)) {
            return;
        }

        this.resizeObserver = new ResizeObserver(() => {
            requestAnimationFrame(() => this.map?.invalidateSize());
        });

        this.resizeObserver.observe(host);
    }
}

function isFeatureCollection(value) {
    return Boolean(value) && value.type === 'FeatureCollection' && Array.isArray(value.features);
}

function isFeature(value) {
    return Boolean(value)
        && value.type === 'Feature'
        && value.geometry
        && typeof value.geometry.type === 'string'
        && Array.isArray(value.geometry.coordinates)
        && value.properties
        && typeof value.properties === 'object';
}

function pointToLatLng(feature) {
    if (feature.geometry.type !== 'Point') {
        return null;
    }

    const [lng, lat] = feature.geometry.coordinates;

    if (typeof lat !== 'number' || typeof lng !== 'number') {
        return null;
    }

    return L.latLng(lat, lng);
}

function readFeatureId(feature) {
    return String(feature.properties?.id ?? '');
}

function readFeatureLabel(feature) {
    return String(feature.properties?.name ?? feature.properties?.id ?? 'Feature');
}

function readCategory(feature) {
    return String(feature.properties?.category ?? 'unknown');
}

function shortCategoryLabel(category) {
    return category
        .split('_')
        .map((item) => item.charAt(0).toUpperCase())
        .join('')
        .slice(0, 2);
}

function createCategoryIcon(category) {
    const label = shortCategoryLabel(category);
    const color = CATEGORY_PALETTE[category] ?? CATEGORY_PALETTE.unknown;

    return L.divIcon({
        className: 'geo-map-marker-shell',
        html: `
            <span style="
                display:grid;
                place-items:center;
                width:2rem;
                height:2rem;
                border-radius:999px;
                background:${color};
                color:white;
                font:700 0.72rem/1 sans-serif;
                border:2px solid white;
                box-shadow:0 8px 24px rgba(15,23,42,.22);
            ">${label}</span>
        `,
        iconSize: [32, 32],
        iconAnchor: [16, 16],
        popupAnchor: [0, -16],
    });
}

function renderPopupHtml(feature) {
    const name = readFeatureLabel(feature);
    const description = String(feature.properties?.description ?? 'No description available');
    const category = readCategory(feature);
    const address = String(feature.properties?.address ?? 'Address unavailable');

    return `
        <div style="min-width:16rem;display:grid;gap:.35rem">
            <div style="font:700 1rem/1.2 sans-serif;color:#0f172a">${name}</div>
            <div style="font:600 .75rem/1 sans-serif;text-transform:uppercase;letter-spacing:.05em;color:#475569">${category}</div>
            <div style="font:.875rem/1.4 sans-serif;color:#1e293b">${description}</div>
            <div style="font:.8rem/1.4 sans-serif;color:#475569">${address}</div>
        </div>
    `;
}

if (!customElements.get('geo-map-widget')) {
    customElements.define('geo-map-widget', GeoMapWidgetElement);
}
