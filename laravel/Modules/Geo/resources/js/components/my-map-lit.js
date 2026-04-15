import { LitElement, html, css } from 'lit';
import L from 'leaflet';

export class MyMap extends LitElement {
    static properties = {
        lat: { type: Number },
        lng: { type: Number },
        zoom: { type: Number },
        markerTitle: { type: String, attribute: 'marker-title' },
    };

    static styles = css`
        :host {
            display: block;
        }

        .map {
            width: 100%;
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
        }
    `;

    constructor() {
        super();
        this.lat = 45.6669;   // esempio: Treviso/Mogliano area
        this.lng = 12.2423;
        this.zoom = 10;
        this.markerTitle = 'My Map';
        this._map = null;
    }

    render() {
        return html`<div id="map" class="map"></div>`;
    }

    firstUpdated() {
        const mapEl = this.renderRoot.querySelector('#map');

        this._map = L.map(mapEl).setView([this.lat, this.lng], this.zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors',
        }).addTo(this._map);

        L.marker([this.lat, this.lng])
            .addTo(this._map)
            .bindPopup(this.markerTitle);
    }

    disconnectedCallback() {
        if (this._map) {
            this._map.remove();
            this._map = null;
        }
        super.disconnectedCallback();
    }
}

customElements.define('my-map', MyMap);
