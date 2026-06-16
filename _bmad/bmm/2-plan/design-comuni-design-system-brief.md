---
title: "Product Brief - Design Comuni Design System"
description: "Replicare le pagine statiche di Design Comuni in un design system riutilizzabile per FixCity"
date: "2026-04-01"
stepsCompleted: [1]
inputDocuments:
  - "/var/www/_bases/base_fixcity_fila5/_bmad/bmm/2-plan/design-comuni-census.md"
  - "/var/www/_bases/base_fixcity_fila5/_bmad/bmm/2-plan/design-comuni-replication-brief.md"
  - "/var/www/_bases/base_fixcity_fila5/_bmad/threads/homepage-html-parity.md"
---

# Product Brief: Design Comuni Design System

> **Stato:** Bozza - In fase di definizione
> **Data:** 2026-04-01

---

## 🎯 Obiettivo del Progetto

**Replicare l'HTML delle 70+ pagine statiche di Design Comuni mantenendo HTML IDENTICO ma usando:**

- ❌ ~~Bootstrap Italia CSS/JS~~ → **NON USATO**
- ✅ Tailwind CSS con `@apply`
- ✅ Alpine.js (NO Bootstrap JS)
- ✅ Flowbite components

**Pattern di conversione:**
```css
/* Bootstrap Italia */
.it-header-wrapper { background: #0066cc; }

/* Tailwind @apply */
.it-header-wrapper {
    @apply bg-primary-600 text-white;
}
```

### 1.2 Problema da Risolvere

Il sito FixCity attualmente non ha una corrispondenza visiva con il design system Design Comuni. L'obiettivo è ottenere HTML identico (esclusi script) tra le pagine locali e le pagine reference di Design Comuni.

### 1.3 Vision Statement

> "Trasformare le 70+ pagine statiche di Design Comuni in un design system componentizzato, riutilizzabile e manutenibile, costruito su Laravel Folio + Volt + Tailwind CSS."

---

## 2. Goals

| # | Goal | Metrica di Successo |
|---|------|-------------------|
| G1 | Replicare HTML delle pagine Design Comuni | HTML dentro `<body>` identico (esclusi script) |
| G2 | Creare blocchi/components riutilizzabili | 16+ componenti universali |
| G3 | Sistema di theming con Tailwind | 100% Tailwind @apply (no Bootstrap) |
| G4 | Documentazione completa | Docs aggiornati con indici bidirezionali |
| G5 | Build system funzionante | `npm run build && npm run copy` senza errori |

---

## 3. Scope

### 3.1 In Scope

- [ ] Analisi e censimento delle 70+ pagine Design Comuni
- [ ] Identificazione blocchi/components comuni (16+ identificati nel census)
- [ ] Replica HTML (body tag esclusi script)
- [ ] Implementazione Tailwind CSS con @apply
- [ ] Creazione componenti Blade riutilizzabili
- [ ] Documentazione in moduli e temi con link bidirezionali

### 3.2 Out of Scope

- JavaScript interattività (Alpine.js base, niente Bootstrap JS)
- Backend/logica applicativa
- Database/modelli
- API endpoints

### 3.3 Focus: HTML First

**Priorità corrente:** Replicare l'HTML delle pagine. Una volta ottenuta parità HTML, si passerà a CSS/JS.

---

## 4. Users

### 4.1 Utenti Primari

| Utente | Bisogno | Pain Point |
|--------|---------|------------|
| Sviluppatori Frontend | Componenti riutilizzabili | Mancanza di blocchi standard |
| Designer | Design system coerente | Inconsistenza tra pagine |
| Content Manager | Pagine predefinite | Nessun template |

### 4.2 Utenti Secondari

- Amministratori del sito
- Cittadini che usano i servizi comunali

---

## 5. Metrics

### 5.1 KPI Tecnici

| KPI | Target |
|-----|--------|
| Pagine replicate (HTML identico) | 38+ pagine |
| Componenti riutilizzabili | 16+ componenti |
| Copertura CSS Tailwind | >80% classi Bootstrap convertite |
| PHPStan | Level 10 pass |
| Docs aggiornati | 100% moduli/temi |

### 5.2 KPI Operativi

| KPI | Target |
|-----|--------|
| Build theme | < 60 secondi |
| Nuova pagina aggiunta | < 30 minuti |

---

## 6. Scope Detail - Componenti Identificati

### 6.1 Componenti Alta Priorità (Foundation)

| # | Componente | Descrizione | Pagine Uso |
|---|------------|-------------|------------|
| 1 | Header Comune | Varianti: slim, center, nav | Tutte |
| 2 | Footer Comune | Colonne configurabili | Tutte |
| 3 | Breadcrumb | Generazione automatica | Tutte |
| 4 | Hero Section | Con/senza immagine, con/senza CTA | 20+ |

### 6.2 Componenti Alta Priorità (Listing)

| # | Componente | Descrizione | Pagine Uso |
|---|------------|-------------|------------|
| 5 | Card Component | Con/senza immagine, icona, badge | 30+ |
| 6 | Link List | Liste navigabili | 15+ |
| 7 | Argomenti Grid | Card con icona, griglia responsive | 10+ |

### 6.3 Componenti Media Priorità (Content)

| # | Componente | Descrizione | Pagine Uso |
|---|------------|-------------|------------|
| 8 | Page Section | Container per contenuti | 40+ |
| 9 | Callout | Varianti: info, warning, success, error | 10+ |
| 10 | File Upload | Drag & drop, progress indicator | 5+ |

### 6.4 Componenti Media Priorità (Forms)

| # | Componente | Descrizione | Pagine Uso |
|---|------------|-------------|------------|
| 11 | Form Step Wizard | Step indicator, navigazione | 20+ |
| 12 | Form Fields | Input, select, datepicker, file | 25+ |
| 13 | Search Bar | Con filtro, autocomplete | 5+ |

### 6.5 Componenti Bassa Priorità (Specialized)

| # | Componente | Descrizione | Pagine Uso |
|---|------------|-------------|------------|
| 14 | Map Component | Visualizzazione segnalazioni | 2+ |
| 15 | Timeline | Eventi cronologici | 2+ |
| 16 | Area Personale Card | Stato richieste, notifiche | 5+ |

---

## 7. Flussi di Servizio da Implementare

| # | Flusso | Step | Stato |
|---|--------|------|-------|
| 1 | Prenotazione Appuntamento | 8 step | ⏳ Pending |
| 2 | Segnalazione Disservizio | 4 step + dettaglio | ⏳ Pending |
| 3 | Richiesta Assistenza | 2 step | ⏳ Pending |
| 4 | Iscrizione Graduatoria | 9 page | ⏳ Pending |
| 5 | Permessi e Autorizzazioni | 7 page | ⏳ Pending |
| 6 | Pagamento (pagoPA + F24) | 10+ page | ⏳ Pending |

---

## 8. Pagine Prioritarie (Prime 5)

| # | Pagina Design Comuni | URL Locale Target | Priorità |
|---|---------------------|-------------------|----------|
| 1 | homepage.html | /it/tests/homepage | 🔴 Alta |
| 2 | argomenti.html | /it/tests/argomenti | 🔴 Alta |
| 3 | appuntamento-06-conferma.html | /it/tests/appuntamento-06-conferma | 🔴 Alta |
| 4 | amministrazione.html | /it/tests/amministrazione | 🟡 Media |
| 5 | documenti-dati.html | /it/tests/documenti-dati | 🟡 Media |

---

## 9. Architettura Tecnica

### 9.1 Stack

| Layer | Tecnologia |
|-------|------------|
| Routing | Laravel Folio + Volt |
| Styling | Tailwind CSS con @apply |
| JS | Alpine.js (no Bootstrap JS) |
| Build | Vite (theme-scoped) |
| Content | JSON + Blade components |

### 9.2 Struttura Template

```
ONE [slug].blade.php per TUTTE le pagine
├── pages/tests/[slug].blade.php  ← Dynamic route
├── components/blocks/            ← Universal blocks
└── config/.../content/pages/     ← JSON content
```

### 9.3 Namespace

```
pub_theme::components.blocks.<type>.<blade>
```

---

## 10. Roadmap

### Fase 1: Foundation (Sprint 1-2)
- [ ] Header/Footer universali
- [ ] Breadcrumb automatico
- [ ] Hero section componenti
- [ ] Setup build Vite

### Fase 2: Components (Sprint 3-4)
- [ ] Card componenti (4 varianti)
- [ ] Link List componenti
- [ ] Argomenti Grid
- [ ] Page Section

### Fase 3: Forms (Sprint 5-6)
- [ ] Form Wizard
- [ ] Form Fields
- [ ] Search Bar

### Fase 4: Specialized (Sprint 7-8)
- [ ] Map Component
- [ ] Timeline
- [ ] Area Personale

### Fase 5: Flussi (Sprint 9-10)
- [ ] Appuntamento (8 step)
- [ ] Segnalazione (4 step)
- [ ] Assistenza (2 step)
- [ ] Graduatoria (9 page)
- [ ] Permessi (7 page)
- [ ] Pagamento (10+ page)

---

## 11. Risks

| Rischio | Probabilità | Impatto | Mitigazione |
|---------|-------------|---------|-------------|
| Complessità HTML Design Comuni | Alta | Alto | Partire da Homepage, test incrementali |
| Build Vite manifest error | Media | Alto | npm run build && npm run copy |
| Docs non aggiornati | Media | Medio | Link bidirezionali automatici |
| Componenti non riutilizzabili | Media | Alto | Test con almeno 3 pagine |

---

## 12. Success Criteria

Il progetto è considerato **COMPLETO** quando:

1. ✅ HTML dentro `<body>` (esclusi script) di ogni pagina locale è **IDENTICO** alla pagina Design Comuni reference
2. ✅ Almeno **16 componenti riutilizzabili** creati e testati
3. ✅ Docs aggiornati in moduli e temi con **indici bidirezionali**
4. ✅ Build funziona: `npm run build && npm run copy`
5. ✅ PHPStan Level 10 pass

---

## See Also

- [Design Comuni Census](../design-comuni-census.md)
- [Design Comuni Replication Brief](../design-comuni-replication-brief.md)
- [HTML Parity Thread](../threads/homepage-html-parity.md)

---

*Documento generato con BMAD-METHOD*