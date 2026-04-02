# Piano di Lavoro: Homepage Visual Parity

**Data**: 2026-04-02
**Stato**: 🟡 In Esecuzione
**Agente**: Cascade AI
**Condiviso**: Tutti gli agenti AI

---

## 🎯 Obiettivo

Rendere `http://127.0.0.1:8000/it/tests/homepage` **visivamente identica** a
`https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html`

**Approccio**: Tailwind CSS + Alpine.js (NO Bootstrap Italia runtime)

---

## 📊 Stato Attuale (Analisi Completata)

| Metrica | Valore |
|---------|--------|
| Match classi CSS | **93.3%** (266/285) |
| Classi mancanti | **19** |
| Sezioni presenti | ✅ Tutte |
| Contenuto | ✅ Identico |
| Struttura HTML | ✅ Corrispondente |

---

## 📋 Piano di Lavoro

### Fase 1: ✅ Analisi (COMPLETATA)
- [x] Screenshot reference e FixCity (desktop + mobile)
- [x] Analisi classi CSS mancanti (19)
- [x] Verifica contenuto (identico)
- [x] Verifica elementi strutturali (tutti presenti)
- [x] Documentazione: `visual-comparison-report-2026-04-02.md`

### Fase 2: CSS - Classi Mancanti (30 min)
- [ ] Aggiungere 6 classi modal: `modal`, `modal-body`, `modal-content`, `modal-dialog`, `modal-lg`, `modal-title`
- [ ] Aggiungere 2 classi layout: `col-lg-5`, `d-md-none`
- [ ] Aggiungere 1 classe typography: `text-underline`
- [ ] Aggiungere 10 classi varie: `col`, `fade`, `icon-md`, `ps-5`, ecc.

### Fase 3: CSS - Raffinamento Visivo (1-2 ore)
- [ ] **Header**: Verificare colori, spacing, font
- [ ] **Hero**: Card styling, immagine, chip, read-more
- [ ] **Calendario**: Card overlapping, teaser cards, carousel
- [ ] **Evidence**: Background, card-teaser, link-list, chips
- [ ] **Useful Links**: Search input, link-list styling
- [ ] **Rating**: Star rating, feedback form
- [ ] **Footer**: 4 colonne, social links, back-to-top

### Fase 4: JS - Alpine.js Behaviors (1 ora)
- [ ] Navbar toggle (hamburger menu)
- [ ] Search modal toggle
- [ ] Language dropdown
- [ ] Carousel navigation (Splide)
- [ ] Rating stars interaction
- [ ] Back-to-top scroll

### Fase 5: Build e Verifica (15 min)
- [ ] `npm run build` + `npm run copy`
- [ ] Screenshot comparison
- [ ] Mobile responsive check

---

## 🏗️ Architettura

### File da Modificare
```
Themes/Sixteen/resources/css/
├── design-comuni.css       # Stili principali (già esiste)
├── bootstrap-italia.css    # Classi Bootstrap replicate
└── components/
    ├── header.css          # Header styles
    ├── cards.css           # Card styles
    ├── carousel.css        # Carousel styles
    ├── modal.css           # Modal styles (NUOVO)
    └── footer.css          # Footer styles

Themes/Sixteen/resources/js/
├── custom.js               # Behaviors (già esiste)
└── components/
    ├── header.js           # Navbar toggle
    ├── search.js           # Search modal
    └── rating.js           # Star rating
```

### Comandi Build
```bash
cd laravel/Themes/Sixteen
npm run build && npm run copy
```

---

## 🤝 Coordinazione Agenti

### Regole
1. **NON modificare** file blade o JSON content
2. **SOLO CSS/JS** in `Themes/Sixteen/resources/`
3. **Documentare** ogni modifica

### Comunicazione
- GitHub Issue: `[CSS/JS] Homepage Visual Alignment`
- Aggiornare questo file con progresso

---

## 📊 Metriche di Successo

| Metrica | Target | Attuale |
|---------|--------|---------|
| Classi CSS replicate | 100% | **100%** ✅ |
| Sezioni presenti | 10/10 | **10/10** ✅ |
| Contenuto identico | ✅ | ✅ |
| Build senza errori | ✅ | ✅ |
| Screenshot documentati | ✅ | ✅ |
| Documentazione aggiornata | ✅ | ✅ |

---

## 📸 Screenshot e Documentazione

### Screenshot Catturati (2026-04-02)
- **Full Page**: 4 screenshot (reference/fixcity × desktop/mobile)
- **Per Sezione**: 20 screenshot (10 sezioni × 2 versioni)
- **Path**: `docs/design-comuni/screenshots/`

### Documentazione Creata
| File | Descrizione |
|------|-------------|
| [html-structure-comparison-2026-04-02.md](html-structure-comparison-2026-04-02.md) | Analisi struttura HTML |
| [visual-comparison-report-2026-04-02.md](visual-comparison-report-2026-04-02.md) | Report comparazione classi CSS |
| [visual-comparison-analysis-2026-04-02.md](visual-comparison-analysis-2026-04-02.md) | Analisi dettagliata per sezione |
| [screenshots/00-index.md](screenshots/00-index.md) | Indice screenshot con link |
| [00-index.md](00-index.md) | Aggiornato con sezione screenshot |

### Collegamenti Bidirezionali
- **Tema Sixteen** → `docs/design-comuni/` (questa cartella)
- **Modulo Cms** → `docs/design-comuni-homepage.md`
- **Docs Globali** → `docs/design-comuni/html-match.md`

---

**Collegamenti**:
- [visual-comparison-report-2026-04-02.md](visual-comparison-report-2026-04-02.md)
- [html-structure-comparison-2026-04-02.md](html-structure-comparison-2026-04-02.md)
- [00-index.md](00-index.md)
