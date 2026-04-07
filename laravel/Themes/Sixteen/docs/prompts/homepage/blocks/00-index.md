# Homepage Blocks Index

> Documentazione completa di ogni blocco HTML nella homepage Design Comuni
> Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html

---

## Blocchi Identificati

### 1. Header
- [01-header-slim.md](./01-header-slim.md) - Barra superiore (regione, lingua, accesso)
- [02-header-center.md](./02-header-center.md) - Logo comune + social
- [03-header-navbar.md](./03-header-navbar.md) - Navigazione principale con megamenu

### 2. Main Content
- [04-hero-section.md](./04-hero-section.md) - `#head-section` - Notizia in evidenza + immagine
- [05-governance-calendar.md](./05-governance-calendar.md) - `#calendario` -cards + calendario eventi
- [06-evidence-section.md](./06-evidence-section.md) - `.evidence-section` - Argomenti in evidenza + siti tematici
- [07-useful-links.md](./07-useful-links.md) - `.useful-links-section` - Ricerca rapida + link utili

### 3. Feedback
- [08-rating-feedback.md](./08-rating-feedback.md) - `.cmp-rating` - Valutazione stelle + feedback multi-step

### 4. Contacts
- [09-contacts-section.md](./09-contacts-section.md) - `.bg-grey-card` - Contatti comune + disservizi

### 5. Footer
- [10-footer.md](./10-footer.md) - Footer con link, contatti, Europa

---

## Struttura Completa Homepage

```
<body>
├── skiplink                    → Accessibilità (vai a contenuti/footer)
├── it-header-wrapper           → Header completo
│   ├── it-header-slim-wrapper  → 1. Barra superiore
│   ├── it-nav-wrapper          → 2. Navigazione
│   │   ├── it-header-center-wrapper  → Logo + Social
│   │   └── it-header-navbar-wrapper  → Menu navigazione
├── main                        → Contenuto principale
│   ├── section#head-section        → 3. Hero (notizia evidenza)
│   ├── section#calendario          → 4. Governance + Calendario
│   ├── section.evidence-section    → 5. Argomenti evidenza
│   ├── section.useful-links-section→ 6. Link utili + ricerca
│   └── div.cmp-rating              → 7. Feedback valutazione
├── div.bg-grey-card            → 8. Contatti
├── footer                      → 9. Footer
│   ├── Footer top (link utili)
│   ├── Footer middle (contatti)
│   └── Footer bottom (Europa, social)
└── search modal                → Modale ricerca globale
```

## 🔗 Link Bidirezionali

### Indici
- ← [Design Comuni Index](../../00-index.md)
- ← [Homepage Structural Analysis](../../HOMEPAGE_STRUCTURAL_ANALYSIS_FINAL.md)
- ← [Bashscripts HTML Compare](../../../../../bashscripts/html-compare/README.md)

### Documenti Correlati
- → [HTML_SIMILARITY_90_PERCENT_PLAN.md](../HTML_SIMILARITY_90_PERCENT_PLAN.md)
- → [HTML_SIMILARITY_90_PERCENT_SESSION.md](../HTML_SIMILARITY_90_PERCENT_SESSION.md)

---

**Ultimo Aggiornamento**: 2026-04-07  
**Blocchi Documentati**: 10  
**Stato**: ✅ Completi
