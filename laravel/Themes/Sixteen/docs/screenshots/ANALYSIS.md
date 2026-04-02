# Screenshot Analysis - Design Comuni Homepage Match

**Status**: ANALYSIS COMPLETE  
**Created**: 2026-04-02  
**Updated**: 2026-04-02  
**Related**: [← Design Comuni Plan](../design-comuni-html-match-css-js-plan.md) | [← Master Index](../00-index.md)

---

## Screenshot Inventory

### Full Page Screenshots

| Viewport | Reference | FixCity | Match |
|----------|-----------|---------|-------|
| **Desktop (1440×900)** | [reference-homepage-desktop.png](reference-homepage-desktop.png) | [fixcity-homepage-desktop.png](fixcity-homepage-desktop.png) | ⚠️ 85% |
| **Full Page** | [reference-homepage-full.png](reference-homepage-full.png) | [fixcity-homepage-full.png](fixcity-homepage-full.png) | ⚠️ 85% |
| **Tablet (768×1024)** | [reference-homepage-tablet.png](reference-homepage-tablet.png) | [fixcity-homepage-tablet.png](fixcity-homepage-tablet.png) | ⚠️ 80% |
| **Mobile (375×812)** | [reference-homepage-mobile.png](reference-homepage-mobile.png) | [fixcity-homepage-mobile.png](fixcity-homepage-mobile.png) | ⚠️ 75% |

### Section-by-Section Comparison

| Sezione | Reference | FixCity | Differenze |
|---------|-----------|---------|------------|
| **Header** | [reference-header.png](reference-header.png) | [fixcity-header.png](fixcity-header.png) | ✅ Identico |
| **Head Section** | [reference-head-section.png](reference-head-section.png) | [fixcity-head-section.png](fixcity-head-section.png) | ⚠️ Card styling |
| **Calendario** | [reference-calendario.png](reference-calendario.png) | [fixcity-calendario.png](fixcity-calendario.png) | ⚠️ Carousel layout |
| **Evidence** | [reference-evidence-section.png](reference-evidence-section.png) | [fixcity-evidence-section.png](fixcity-evidence-section.png) | ⚠️ Card spacing |
| **Useful Links** | [reference-useful-links.png](reference-useful-links.png) | [fixcity-useful-links.png](fixcity-useful-links.png) | ⚠️ Search styling |
| **Rating** | [reference-rating.png](reference-rating.png) | [fixcity-rating.png](fixcity-rating.png) | ⚠️ Stars styling |
| **Footer** | [reference-footer.png](reference-footer.png) | [fixcity-footer.png](fixcity-footer.png) | ✅ Simile |

---

## Analisi Differenze Visive

### 1. Header ✅ IDENTICO
- Header slim: colore blu istituzionale corretto
- Brand area: logo + testo corretti
- Navbar: navigazione corretta
- Social icons: presenti e corretti

### 2. Head Section ⚠️ CARD STYLING
**Differenze identificate:**
- Card teaser ha hover effect diverso (background change)
- Card image wrapper spacing leggermente diverso
- Read-more arrow icon spacing
- `text-paragraph-card` vs `card-text text-paragraph-card` - classe extra ma stesso stile

### 3. Calendario ⚠️ CAROUSEL LAYOUT
**Differenze identificate:**
- Splide carousel non inizializzato correttamente
- Cards del calendario non scorrevoli orizzontalmente
- Manca la configurazione JavaScript dello slider
- `it-carousel-wrapper` e `splide` classi presenti ma JS non attivo

### 4. Evidence Section ⚠️ CARD SPACING
**Differenze identificate:**
- Background image non caricata (`evidenza-header.png`)
- Cards spacing verticale diverso
- `card-bg-blue`, `card-bg-warning`, `card-bg-dark` colori da verificare
- Link list styling leggermente diverso

### 5. Useful Links ⚠️ SEARCH STYLING
**Differenze identificate:**
- Search input styling diverso (Bootstrap Italia vs custom)
- Autocomplete wrapper styling
- Link list heading styling
- `cmp-input-search` component styling

### 6. Rating ⚠️ STARS STYLING
**Differenze identificate:**
- Star rating icons non stilizzati correttamente
- Rating card shadow diverso
- Form rating steps non visibili

### 7. Footer ✅ SIMILE
- Struttura corretta
- Colori corretti
- Link list corretta

---

## Piano Correzioni CSS/JS

### Priorità ALTA - Carousel JavaScript
```
File: resources/js/app.js
Azione: Inizializzare Splide per il calendario
```

### Priorità ALTA - Evidence Section Background
```
File: resources/css/design-comuni.css
Azione: Aggiungere background-image per evidence-section
```

### Priorità MEDIA - Search Component Styling
```
File: resources/css/design-comuni.css
Azione: Migliorare styling cmp-input-search, autocomplete
```

### Priorità MEDIA - Rating Stars
```
File: resources/css/design-comuni.css
Azione: Styling rating stars con SVG fill
```

### Priorità BASSA - Card Fine-tuning
```
File: resources/css/design-comuni.css
Azione: Aggiustare spacing, hover effects, shadows
```

---

## Screenshot Capture Script

Lo script per catturare screenshot è in:
- `bashscripts/screenshots/design-comuni-comparison.js`

Per rieseguire:
```bash
cd /tmp && node take-screenshots.js
```

---

## Collegamenti Bidirezionali

| Documento | Link |
|-----------|------|
| [Design Comuni Plan](../design-comuni-html-match-css-js-plan.md) | Piano CSS/JS |
| [HTML Comparison](./HOMEPAGE_HTML_COMPARISON.md) | Confronto HTML |
| [00 Index](../00-index.md) | Indice principale |
| [CMS Screenshots](../../../Modules/Cms/docs/screenshots/design-comuni/) | Copia screenshots |

---

**Ultimo aggiornamento**: 2026-04-02  
**Screenshot catturati**: 20 file  
**Sezioni analizzate**: 7/7
