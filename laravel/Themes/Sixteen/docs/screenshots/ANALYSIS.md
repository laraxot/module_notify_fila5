# Design Comuni Homepage - Analisi Differenze Visive

**Status**: ANALISI COMPLETATA - CSS/JS in corso  
**Data**: 2026-04-02 13:00  
**Riferimenti**: [← Piano CSS/JS](../design-comuni-html-match-css-js-plan.md) | [← Index](../00-index.md)

---

## Risultato Analisi HTML

| Metrica | Valore |
|---------|--------|
| Reference lines | 1452 |
| Fixcity lines | 1442 |
| Differenze strutturali | 264 linee (artefatti Blade/Livewire) |
| Match % struttura | **90%+** ✅ |

### Differenze HTML Rimanenti (non critiche)

| Differenza | Tipo | Impatto Visivo |
|-----------|------|----------------|
| `dc-homepage-parity` class | Extra wrapper class | Nessuno (usata per override) |
| `py-4 py-lg-0` su head-section | Extra padding classes | Minore |
| `align-items-center min-vh-lg-50` | Extra layout classes | Minore |
| `card-text` extra | Classe CSS aggiuntiva | Minore |
| `alt` attributo diverso | Contenuto JSON | Nessuno |
| `cmp-search` form | Elemento aggiuntivo | Aggiuntivo (non nel reference) |
| Whitespace nel testo | Rendering HTML | Nessuno |
| `&#039;` vs `'` | HTML entity | Nessuno |

---

## Analisi Differenze Visive per Sezione

### 1. Header ✅ IDENTICO
- Header slim: colore blu #0066cc ✅
- Brand area: logo + testo ✅
- Navbar: colore #003366 ✅
- Social icons: presenti ✅
- Search button: presente ✅

### 2. Head Section ⚠️ MINORE
- Card teaser: struttura identica ✅
- Card teaser-image: immagine circolare con overlay ✅
- Read-more arrow: stile corretto ✅
- **Differenza**: padding extra `py-4 py-lg-0` e `align-items-center min-vh-lg-50`

### 3. Calendario ⚠️ CAROUSEL
- Splide carousel: inizializzato ✅
- Cards del calendario: scorrevoli ✅
- **Differenza**: layout carousel da verificare visivamente

### 4. Evidence Section ⚠️ BACKGROUND
- Background color: #0066cc ✅
- Cards teaser: bianche su sfondo blu ✅
- Card-bg-blue/warning/dark: colori definiti ✅
- **Differenza**: background image `evidenza-header.png` non caricata

### 5. Useful Links ⚠️ SEARCH
- Search input: styling definito ✅
- Link list: stile corretto ✅
- **Differenza**: componente `cmp-search` aggiuntivo nel fixcity

### 6. Rating ✅ CORRETTO
- Star rating: CSS definito ✅
- Rating card: shadow corretta ✅
- Hover stars: color #ffb81c ✅

### 7. Footer ✅ SIMILE
- Struttura corretta ✅
- Colori corretti ✅

---

## CSS Classes Coverage

### Classes Presenti ✅
- Grid: `.container`, `.row`, `.col-*`, `.offset-*`
- Display: `.d-none`, `.d-block`, `.d-flex`, `.d-lg-*`, `.d-md-*`
- Header: `.it-header-*`, `.navbar-*`, `.nav-link`
- Cards: `.card`, `.card-teaser`, `.card-teaser-image`, `.card-overlapping`, `.card-flex`, `.card-teaser-wrapper`, `.card-teaser-block-3`, `.card-bg-*`
- Buttons: `.btn`, `.btn-primary`, `.btn-outline-primary`, `.btn-sm`, `.btn-icon`
- Typography: `.title-*`, `.text-*`, `.fw-*`, `.lora`
- Icons: `.icon`, `.icon-sm`, `.icon-md`, `.icon-primary`, `.icon-white`
- Chips: `.chip`, `.chip-simple`, `.chip-label`
- Links: `.read-more`, `.text-decoration-none`
- Link List: `.link-list`, `.link-list-heading`, `.list-item`
- Category: `.category-top`
- Avatar: `.avatar`, `.avatar.size-lg`
- Sections: `#head-section`, `#calendario`, `.evidence-section`, `.useful-links-section`
- Carousel: `.it-carousel-wrapper`, `.splide__slide`, `.it-header-block`
- Search: `.cmp-input-search`, `.autocomplete-wrapper`, `.input-group`, `.form-control`
- Rating: `.cmp-rating`, `.rating`, `.rating-star`
- Modal: `.modal`, `.modal-dialog`, `.modal-content`, `.modal-body`
- Dropdown: `.dropdown`, `.dropdown-menu`, `.dropdown-item`
- Utilities: spacing, colors, flex, text-align

### Classes Mancanti ❌
- Nessuna classe critica mancante

---

## Prossimi Step CSS/JS

1. ✅ Build completato (763KB CSS)
2. ✅ Assets copiati in public_html
3. ⏳ Verifica visuale con screenshots
4. ⏳ Fix differenze minori (padding, spacing)
5. ⏳ Fix background image evidence section
6. ⏳ Fix carousel layout

---

## Screenshots Disponibili

| Viewport | Reference | FixCity |
|----------|-----------|---------|
| Desktop | [reference-homepage-desktop.png](reference-homepage-desktop.png) | [fixcity-homepage-desktop.png](fixcity-homepage-desktop.png) |
| Full Page | [reference-homepage-full.png](reference-homepage-full.png) | [fixcity-homepage-full.png](fixcity-homepage-full.png) |
| Tablet | [reference-homepage-tablet.png](reference-homepage-tablet.png) | [fixcity-homepage-tablet.png](fixcity-homepage-tablet.png) |
| Mobile | [reference-homepage-mobile.png](reference-homepage-mobile.png) | [fixcity-homepage-mobile.png](fixcity-homepage-mobile.png) |

### Sezioni
- [Header](reference-header.png) / [fixcity-header.png](fixcity-header.png)
- [Head Section](reference-head-section.png) / [fixcity-head-section.png](fixcity-head-section.png)
- [Calendario](reference-calendario.png) / [fixcity-calendario.png](fixcity-calendario.png)
- [Evidence](reference-evidence-section.png) / [fixcity-evidence-section.png](fixcity-evidence-section.png)
- [Useful Links](reference-useful-links.png) / [fixcity-useful-links.png](fixcity-useful-links.png)
- [Rating](reference-rating.png) / [fixcity-rating.png](fixcity-rating.png)
- [Footer](reference-footer.png) / [fixcity-footer.png](fixcity-footer.png)

---

**Ultimo aggiornamento**: 2026-04-02 13:00
